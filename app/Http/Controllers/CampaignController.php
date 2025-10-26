<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Address;
use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            $schedules_data = $data['horarios'] ?? [];
            $title_point = $data['title_point'] ?? 'Ponto de Coleta';

            unset($data['address'], $data['horarios'], $data['photos'], $data['title_point']);

            $campaign = Auth::user()->institution->campaigns()->create($data);

            $collectionPoint = $campaign->collectionPoints()->create([
                'name' => $title_point,
                'address_id' => Address::create($address_data)->id
            ]);

    
            foreach ($schedules_data as $dia => $horario) {
                $collectionPoint->schedules()->create([
                    'dia' => $dia,
                    'abertura' => $horario['abertura'] ?? null,
                    'fechamento' => $horario['fechamento'] ?? null,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
