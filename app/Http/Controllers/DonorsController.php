<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Rule;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DonorsRequest;

class DonorsController extends Controller
{
    public function index()
    {
        $donorActive   = User::query()->usersUnit()->where('is_active', true)->count();
        $donorInactive = User::query()->usersUnit()->where('is_active', false)->count();
        $totalDonor    = User::query()->usersUnit()->count();

        $donors = User::query()
            ->usersUnit()
            ->email(request()->email)
            ->name(request()->name)
            ->phone(request()->phone)
            ->active(request()->active)
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('backend.donors.index', [
            'donors'       => $donors,
            'totalDonor'   => $totalDonor,
            'donorInactive'=> $donorInactive,
            'donorActive'  => $donorActive,
        ]);
    }

    public function show(User $donor)
    {
        return view('backend.donors.show', [
            'donor' => $donor
        ]);
    }

    public function create()
    {
        $modules = Module::all();

        return view('backend.donors.create', [
            'modules' => $modules
        ]);
    }

    public function store(DonorsRequest $request)
    {
        try {
            $data = $request->validated();

        
            if (isset($data['address'])) {
                $addressData = $data['address'];
                unset($data['address']);
                $address = Address::create($addressData ?? []);
                $data['address_id'] = $address->id;
            }

            $data['institution_id'] = Auth::user()->institution_id;

            $modules = $data['modules'] ?? [];
            unset($data['modules']);

            $donorRule = Rule::where('name', 'donor')->first();
            $data['rule_id'] = $donorRule->id;

            unset($data['password']); // doadores não têm senha

            $user = User::create($data);
            $user->modules()->sync($modules);

            return redirect()->route('donors.index')
                             ->with('success', 'Doador cadastrado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('donors.index')
                             ->with('error', 'Erro ao cadastrar o doador!');
        }
    }

    public function edit(User $donor)
    {
        $modules = Module::all();

        return view('backend.donors.edit', [
            'donor'   => $donor,
            'modules' => $modules
        ]);
    }

    public function update(DonorsRequest $request, User $donor)
    {
        try {
            $data = $request->validated();

            if (isset($data['address'])) {
                $addressData = $data['address'];
                unset($data['address']);
                if ($donor->address) {
                    $donor->address->update($addressData);
                } else {
                    $address = Address::create($addressData);
                    $data['address_id'] = $address->id;
                }
            }

            $modules = $data['modules'] ?? [];
            unset($data['modules']);

            unset($data['password']); // doadores não têm senha

            $donor->update($data);
            $donor->modules()->sync($modules);

            return redirect()->route('donors.index')
                             ->with('success', 'Doador atualizado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('donors.index')
                             ->with('error', 'Erro ao atualizar o doador!');
        }
    }

    public function destroy(User $donor)
    {
        try {
            $donor->delete();
            return redirect()->route('donors.index')
                             ->with('success', 'Doador deletado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('donors.index')
                             ->with('error', 'Erro ao deletar o doador!');
        }
    }
}
