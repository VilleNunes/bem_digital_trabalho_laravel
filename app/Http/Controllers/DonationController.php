<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $role = optional($user->rule)->name;
        $institutionId = currentInstitutionId();

        if ($role === 'admin') {
            $donationsQuery = Donation::with(['user.rule', 'campaign.institution'])
                ->when($institutionId, fn ($query, $id) => $query->whereHas(
                    'campaign',
                    fn ($campaignQuery) => $campaignQuery->where('institution_id', $id)
                ))
                ->latest();

            $donations = $donationsQuery->paginate();
            $statsQuery = Donation::query()
                ->when($institutionId, fn ($query, $id) => $query->whereHas(
                    'campaign',
                    fn ($campaignQuery) => $campaignQuery->where('institution_id', $id)
                ));

            $totalDonations = (clone $statsQuery)->count();
            $totalAmount = (float) (clone $statsQuery)->sum('amount');

            return view('backend.donations.index', compact('donations', 'role', 'totalDonations', 'totalAmount'));
        }

        if ($role === 'user') {
            $donationsQuery = Donation::with(['user.rule', 'campaign.institution'])
                ->where('user_id', $user->id)
                ->latest();

            $donations = $donationsQuery->paginate();
            $totalDonations = Donation::where('user_id', $user->id)->count();
            $totalAmount = (float) Donation::where('user_id', $user->id)->sum('amount');

            return view('backend.donations.index', compact('donations', 'role', 'totalDonations', 'totalAmount'));
        }

        abort(403, 'Acesso não autorizado.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $campaignId = request('campaign_id');
        $estoque = 0;

        if ($campaignId) {
            $campaign = Campaign::find($campaignId);
            if ($campaign) {
                $estoque = $this->calculateStock($campaign->id);
            }
        }

        $donors = User::with('rule')
            ->whereHas('rule', fn ($query) => $query->where('name', 'donor'))
            ->orderBy('name')
            ->get();

        $campaigns = Campaign::query()
            ->when(currentInstitutionId(), fn ($query, $institutionId) => $query->where('institution_id', $institutionId))
            ->orderBy('name')
            ->get();

        return view('backend.donations.create', compact('donors', 'campaigns', 'estoque', 'campaignId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DonationRequest $request)
    {
        $data = $request->validated();

        // Validação de doador apenas para entrada
        if ($data['type'] === 'entrada') {
            if (empty($data['user_id'])) {
                return back()
                    ->withErrors(['user_id' => 'Selecione um doador para doações de entrada.'])
                    ->withInput();
            }
            
            $donor = User::with('rule')->findOrFail($data['user_id']);

            if (optional($donor->rule)->name !== 'donor') {
                return back()
                    ->withErrors(['user_id' => 'Selecione um usuário do tipo doador.'])
                    ->withInput();
            }
        } else {
            // Para saída, não precisa de user_id
            $data['user_id'] = null;
        }

        // Validação de campanha
        $campaign = Campaign::query()
            ->when(currentInstitutionId(), fn ($query, $institutionId) => $query->where('institution_id', $institutionId))
            ->findOrFail($data['campaign_id']);

        // Validação de estoque para saída
        if ($data['type'] === 'saida') {
            $estoque = $this->calculateStock($campaign->id);
            $quantify = (int) ($data['quantify'] ?? 1);

            if ($quantify > $estoque) {
                return back()
                    ->withErrors(['quantify' => "Estoque insuficiente. Disponível: {$estoque} unidades."])
                    ->withInput();
            }
        } else {
            // Limpa recipient_name para entrada
            $data['recipient_name'] = null;
        }

        Donation::create($data);

        return redirect()->route('donations.index')
            ->with('status', 'Doação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {

        return view('backend.donations.show', [
            'donation' => $donation->load('user.rule', 'campaign.institution'),
            'role' => optional(Auth::user()->rule)->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donation $donation)
    {
        $donors = User::with('rule')
            ->whereHas('rule', fn ($query) => $query->where('name', 'donor'))
            ->orderBy('name')
            ->get();

        $campaigns = Campaign::query()
            ->when(currentInstitutionId(), fn ($query, $institutionId) => $query->where('institution_id', $institutionId))
            ->orderBy('name')
            ->get();

        // Calcula estoque para a campanha da doação
        $estoque = $this->calculateStock($donation->campaign_id);
        // Se estiver editando uma saída, adiciona a quantidade atual ao estoque
        if ($donation->isSaida()) {
            $estoque += $donation->quantify;
        }

        return view('backend.donations.edit', compact('donation', 'donors', 'campaigns', 'estoque'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DonationRequest $request, Donation $donation)
    {
        $data = $request->validated();

        // Validação de doador apenas para entrada
        if ($data['type'] === 'entrada') {
            if (empty($data['user_id'])) {
                // Se não foi informado, mantém o doador atual se existir
                $data['user_id'] = $donation->user_id ?? null;
            }
            
            if (!empty($data['user_id'])) {
                $donor = User::with('rule')->findOrFail($data['user_id']);

                if (optional($donor->rule)->name !== 'donor') {
                    return back()
                        ->withErrors(['user_id' => 'Selecione um usuário do tipo doador.'])
                        ->withInput();
                }
            }
        } else {
            // Para saída, não precisa de user_id
            $data['user_id'] = null;
        }

        // Validação de campanha
        $campaignId = $data['campaign_id'] ?? $donation->campaign_id;
        $campaign = Campaign::query()
            ->when(currentInstitutionId(), fn ($query, $institutionId) => $query->where('institution_id', $institutionId))
            ->findOrFail($campaignId);

        // Validação de estoque para saída
        if ($data['type'] === 'saida') {
            $quantify = (int) ($data['quantify'] ?? 1);
            $estoque = $this->calculateStock($campaignId);

            // Se estiver editando uma saída existente, adiciona a quantidade atual ao estoque
            if ($donation->isSaida() && $donation->campaign_id === $campaignId) {
                $estoque += $donation->quantify;
            }

            if ($quantify > $estoque) {
                return back()
                    ->withErrors(['quantify' => "Estoque insuficiente. Disponível: {$estoque} unidades."])
                    ->withInput();
            }
        } else {
            // Limpa recipient_name para entrada
            $data['recipient_name'] = null;
        }

        $donation->update($data);

        return redirect()->route('donations.index')->with('status', 'Doação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        $this->ensureAdmin();

        $donation->delete();

        return redirect()->route('donations.index')->with('status', 'Doação removida com sucesso!');
    }

    /**
     * Calcula o estoque disponível de uma campanha
     */
    private function calculateStock(int $campaignId): int
    {
        $entradas = Donation::byCampaign($campaignId)
            ->entradas()
            ->sum('quantify');

        $saidas = Donation::byCampaign($campaignId)
            ->saidas()
            ->sum('quantify');

        return max(0, (int) $entradas - (int) $saidas);
    }
}
