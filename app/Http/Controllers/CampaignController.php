<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Address;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\CollectionPoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::query()->with('category')->paginate(10);
        return view('backend.campaign.index',['campaigns'=>$campaigns]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.campaign.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCampaignRequest $request)
    {
 
        try {
            DB::beginTransaction();

            $data = $request->validated();
   
            $address_data = $data['address'] ?? null;
            $agendas = json_decode(request()->agenda, true);
            $title_point = $data['title_point'] ?? 'Ponto de Coleta';

            unset($data['address'], $data['agenda'], $data['photos'], $data['title_point']);

            $campaign = Auth::user()->institution->campaigns()->create($data);

            $collectionPoint = $campaign->collectionPoints()->create([
                'title' => $title_point,
                'address_id' => Address::create($address_data)->id
            ]);
        
    
            foreach ($agendas as $agenda) {
                $collectionPoint->schedules()->create([
                    'dia' => $agenda['dia'],
                    'abertura' => $agenda['fechado'] ? null : ($agenda['abertura'] ?: null),
                    'fechamento' => $agenda['fechado'] ? null : ($agenda['fechamento'] ?: null)
                ]);
            }

            DB::commit();

            return to_route( 'dashboard');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        $categories = Category::query()->get();
        $ponto = $campaign->collectionPoints()->first();
        $agendas = $ponto->schedules()->orderBy('dia','asc')->get()->toArray();
        return view('backend.campaign.create',['campaign'=>$campaign,'categories'=>$categories,'ponto'=>$ponto,'agendas'=>$agendas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCampaignRequest $request, Campaign $campaign)
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
   
            $address_data = $data['address'];
            $agendas = json_decode(request()->agenda, true);
            $title_point = $data['title_point'] ?? 'Ponto de Coleta';

            unset($data['address'], $data['agenda'], $data['photos'], $data['title_point']);

            $campaign->update($data);


            $collectionPoint =  $campaign->collectionPoints()->first();
            $collectionPoint->address()->update($address_data);

            $collectionPoint->update([
                'title' => $title_point
            ]);
        
    
            foreach ($agendas as $agenda) {
                $schedule = $collectionPoint->schedules()->where('dia', $agenda['dia'])->first();
                if ($schedule) {
                    $schedule->update([
                        'dia' => $agenda['dia'],
                        'abertura' => $agenda['fechado'] ? null : ($agenda['abertura'] ?: null),
                        'fechamento' => $agenda['fechado'] ? null : ($agenda['fechamento'] ?: null)
                    ]);
                } else {
                    $collectionPoint->schedules()->create([
                        'dia' => $agenda['dia'],
                        'abertura' => $agenda['fechado'] ? null : ($agenda['abertura'] ?: null),
                        'fechamento' => $agenda['fechado'] ? null : ($agenda['fechamento'] ?: null)
                    ]);
                }
            }

            DB::commit();

            return to_route( 'dashboard');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
