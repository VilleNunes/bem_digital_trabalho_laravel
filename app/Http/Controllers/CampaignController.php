<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Address;
use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    /**
     * Exibe a lista de campanhas.
     */
    public function index()
    {
        $campaigns = Campaign::query()
            ->where('institution_id', currentInstitutionId())
            ->name(request()->name)
            ->date(request()->beginning, request()->termination)
            ->active(request()->active)
            ->paginate(10);

        return view('backend.campaign.index', compact('campaigns'));
    }

    /**
     * Exibe o formulário de criação de campanha.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.campaign.create', compact('categories'));
    }

    /**
     * Salva uma nova campanha.
     */
    public function store(StoreCampaignRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $addressData = $data['address'] ?? null;
            $agendas = json_decode($request->agenda, true);
            $titlePoint = $data['title_point'] ?? 'Ponto de Coleta';

            unset($data['address'], $data['agenda'], $data['photos'], $data['title_point']);

            // Cria a campanha vinculada à instituição do usuário
            $campaign = Auth::user()->institution->campaigns()->create($data);

            // Cria o ponto de coleta e endereço
            $collectionPoint = $campaign->collectionPoints()->create([
                'title' => $titlePoint,
                'address_id' => Address::create($addressData)->id
            ]);

            // Cria os horários de funcionamento
            foreach ($agendas as $agenda) {
                $collectionPoint->schedules()->create([
                    'dia' => $agenda['dia'],
                    'abertura' => $agenda['fechado'] ? null : ($agenda['abertura'] ?? null),
                    'fechamento' => $agenda['fechado'] ? null : ($agenda['fechamento'] ?? null)
                ]);
            }

            DB::commit();
            return to_route('campaign.index')->with('success', 'Campanha criada com sucesso!');
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            return back()->with('error', 'Erro ao criar campanha.');
        }
    }

    /**
     * Exibe o formulário de edição de uma campanha.
     */
    public function edit(Campaign $campaign)
    {
        $categories = Category::all();
        $ponto = $campaign->collectionPoints()->first();
        $agendas = $ponto ? $ponto->schedules()->orderBy('dia', 'asc')->get()->toArray() : [];

        return view('backend.campaign.create', compact('campaign', 'categories', 'ponto', 'agendas'));
    }

    /**
     * Atualiza uma campanha existente.
     */
    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $addressData = $data['address'];
            $agendas = json_decode($request->agenda, true);
            $titlePoint = $data['title_point'] ?? 'Ponto de Coleta';

            unset($data['address'], $data['agenda'], $data['photos'], $data['title_point']);

            $campaign->update($data);

            $collectionPoint = $campaign->collectionPoints()->first();
            $collectionPoint->address()->update($addressData);
            $collectionPoint->update(['title' => $titlePoint]);

            foreach ($agendas as $agenda) {
                $schedule = $collectionPoint->schedules()->where('dia', $agenda['dia'])->first();

                if ($schedule) {
                    $schedule->update([
                        'abertura' => $agenda['fechado'] ? null : ($agenda['abertura'] ?? null),
                        'fechamento' => $agenda['fechado'] ? null : ($agenda['fechamento'] ?? null),
                    ]);
                } else {
                    $collectionPoint->schedules()->create([
                        'dia' => $agenda['dia'],
                        'abertura' => $agenda['fechado'] ? null : ($agenda['abertura'] ?? null),
                        'fechamento' => $agenda['fechado'] ? null : ($agenda['fechamento'] ?? null),
                    ]);
                }
            }

            DB::commit();
            return to_route('dashboard')->with('success', 'Campanha atualizada com sucesso!');
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            return back()->with('error', 'Erro ao atualizar campanha.');
        }
    }

    /**
     * Exibe o formulário para upload de fotos.
     */
    public function photoUpload(Campaign $campaign)
    {
        return view('backend.campaign.photo-create', compact('campaign'));
    }

    /**
     * Atualiza as imagens de uma campanha.
     */
    public function updateImages(Request $request, Campaign $campaign)
    {
        $request->validate([
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB máx
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store("campaigns/{$campaign->id}", 'public');
                $campaign->photos()->create([
                    'filename' => "/storage/{$path}",
                ]);
            }
        }

        return back()->with('success', 'Imagens atualizadas com sucesso!');
    }

    /**
     * Exclui uma imagem específica.
     */
    public function deleteImage(Campaign $campaign, $photoId)
    {
        $image = $campaign->photos()->findOrFail($photoId);

        if ($image->filename) {
            $path = str_replace('/storage/', '', $image->filename);
            Storage::disk('public')->delete($path);
        }

        $image->delete();
        return response()->noContent();
    }

    /**
     * Ativa ou desativa uma campanha.
     */
    public function active(Campaign $campaign)
    {
        $totalPhotos = $campaign->photos()->count();
        $totalPoints = $campaign->collectionPoints()->count();

        if ($totalPoints == 0) {
            return back()->with('error', 'Para ativar a campanha precisa ter pelo menos um ponto cadastrado.');
        }

        if ($totalPhotos == 0) {
            return back()->with('error', 'Para ativar a campanha precisa ter pelo menos uma foto vinculada.');
        }

        $campaign->is_active = !$campaign->is_active;
        $campaign->save();

        return back()->with('success', 'Status da campanha atualizado com sucesso!');
    }

    /**
     * Mostra campanhas públicas (frontend).
     */
    public function showFrontend()
    {
        $campaigns = Campaign::where('is_active', true)->latest()->get();
        return view('frontend.layouts.partials.campaignsViews', compact('campaigns'));
    }

    /**
     * Mostra página pública de uma campanha.
     */
    public function showPublic($id)
    {
        $campaign = Campaign::with(['institution', 'category'])
            ->where('is_active', true)
            ->findOrFail($id);

        return view('frontend.campaign.show', compact('campaign'));
    }
}
