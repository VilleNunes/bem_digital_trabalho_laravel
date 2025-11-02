<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonorRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donors = User::query()
            ->usersUnit('donor')
            ->email(request()->email)
            ->name(request()->name)
            ->phone(request()->phone)
            ->cpf(request()->cpf)
            ->active(request()->active)
            ->orderBy('created_at','DESC')
            ->paginate(10)
            ->appends(request()->query());
        $totalDonor= User::query()->usersUnit('donor')->count();

        return view('backend.donors.index',['donors'=>$donors,'totalDonor'=>$totalDonor]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.donors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonorRequest $request)
    {
        $data = $request->validated();
        $data['institution_id'] = currentInstitutionId();
        $data['rule_id'] = 2;
        User::create($data);
        return to_route('donors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $donor)
    {
        return view('backend.donors.show',['donor'=>$donor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $donor)
    {
        return view('backend.donors.edit',['donor'=>$donor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDonorRequest $request, User $donor)
    {
        $data = $request->validated();

        if (isset($data['address'])){
            $address = $data['address'];
            unset($data['address']);
        }
        if(!$donor->address){
            $newAddress =  Address::create($address);
            $donor->address_id = $newAddress->id;
        }else{
            $donor->address()->update($address);
        }
       
        $donor->update($data);
        return to_route('donors.edit',['donor'=>$donor])->with('message','Doador editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $donor)
    {
        $donor->delete();
        return back()->with('success','Doador excluido com sucesso');
    }
}
