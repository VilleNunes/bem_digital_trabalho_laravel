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
        $total_donation_sum = Donation::whereHas('campaign', function ($query) {
            $query->where('institution_id', currentInstitutionId());
        })->sum('quantify');
        return view('dashboard',[ 'campaings'=>$campaings,'total_donors'=>$total_donors,'total_campaing'=>$total_campaing,'total_users'=>$total_users,'total_donation_sum'=>$total_donation_sum]);
    }
}
