<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
   public function index(Request $request)
{
    $campaings = Campaign::query()
        ->when(currentInstitutionId(), fn ($query, $institutionId) => $query->where('institution_id', $institutionId))
        ->orderBy('name')
        ->get();

    $campaing_id = $request->query('campaign_id');
    
    $campaing_reports = null; 
    $donation_count = 0;
    $donors_count = 0;
    $campaign_donations = 0;
    $donations= [];


    if ($campaing_id) {
        try {
            $campaing_reports = Campaign::query()
                ->where('institution_id', currentInstitutionId())
                ->findOrFail($campaing_id);

            $donation_count = $campaing_reports->donations()->count();
            
    
            $donors_count = $campaing_reports->donations()
                ->distinct('user_id')
                ->count('user_id');
                
            $campaign_donations = $campaing_reports->donations()->sum('quantify');

            $donations = $campaing_reports->donations()->with('user')->get();


       

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('reports.index')->with('error', 'Campanha não encontrada.');
        }
    }
   
        return view('backend.reports.index', [
            'campaings' => $campaings,
            'campaing_reports' => $campaing_reports,
            'donation_count' => $donation_count,
            'donors_count' => $donors_count,
            'campaign_donations' => $campaign_donations,
            'donations'=>$donations
        ]);
    }
}
