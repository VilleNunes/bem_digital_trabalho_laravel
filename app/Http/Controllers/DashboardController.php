<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $campaings = Campaign::query()->where('institution_id',currentInstitutionId())->paginate(5);
        $total_campaing = Campaign::query()->where('institution_id',currentInstitutionId())->count();
        $total_donors = User::usersUnit('donor')->where('institution_id',currentInstitutionId())->count();
        $total_users = User::usersUnit('user')->count();
        $total_donation_sum_kg = Donation::query()->where('type','entrada')->whereHas('campaign', function ($query) {
            $query->where('institution_id', currentInstitutionId())->where('unit','kg');
        })->sum('quantify');
        $total_donation_sum_unit = Donation::query()->where('type','saida')->whereHas('campaign', function ($query) {
            $query->where('institution_id', currentInstitutionId())->where('unit','unit');
        })->sum('quantify');
        return view('dashboard',[ 'campaings'=>$campaings,'total_donors'=>$total_donors,
        'total_campaing'=>$total_campaing,'total_users'=>$total_users,'total_donation_sum_kg'=>$total_donation_sum_kg,'total_donation_sum_unit'=>$total_donation_sum_unit]);
    }
}
