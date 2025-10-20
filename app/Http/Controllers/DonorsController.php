<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorsController extends Controller
{
   5 public function index()
    {
        $userActive = User::query()->usersUnit()->where('is_active',true)->count();
        $userInactive = User::query()->usersUnit()->where('is_active',false)->count();
        $totalUser= User::query()->usersUnit()->count();

        $users = User::query()
        ->usersUnit()
        ->email(request()->email)
        ->name(request()->name)
        ->phone(request()->phone)
        ->active(request()->active)
        ->orderBy('created_at','DESC')
        ->paginate(10);

     return view('backend.donors.index',
        ['donors'=>$Donors,
        'totalDonor'=>$totalDonor,
        'donorInactive'=>$DonorInactive,
        'donorActive'=>$DonorActive
        ]);
    }

    public function create() 
    {
        return view('donors.create');

    }

    public function store(
         {
            
         }
    )
}
