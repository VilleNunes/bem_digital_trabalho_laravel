<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->input('q');
        $institutions = Institution::query()
            ->when($query, function ($q) use ($query) {
                $q->where('fantasy_name', 'like', "%{$query}%")
                    ->orWhere('email', 'like', "%{$query}%");
            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('backend.institutions.index', compact('institutions', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstitutionRequest $request)
    {
        $data = $request->validated();

        $institution = Institution::create([
            'fantasy_name'=>$data['fantasy_name'],
            'cnpj'=>$data['cnpj'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'is_active'=>false,
            'address_id'=>null,
        ]);

        $user = User::create([
            'name'=>$data['name_admin'],
            'email'=>$data['email_adm'],
            'password'=>Hash::make($data['password']),
            'institution_id'=>$institution->id,
            'rule_id'=>3,
            'is_active'=>true,
            'cpf'=>$data['cpf']
        ]);

        $user->modules()->sync([1,2,3,4,5,6]);
        return redirect()->route('cadastro.instituicoes')->with('success', 'Instituição criada com sucesso! Aguarde a aprovação do administrador para ativar a instituição. ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Institution $institution)
    {
        // Carrega o endereço, campanhas ativas
        $institution->load(['address', 'campaigns' => function ($query) {
            $query->where('is_active', true)->where('termination', '>=', now())->where('beginning', '<=', now());
        }]);

        return view('frontend.institution.show', compact('institution'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        return view('backend.institutions.edit', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstitutionRequest $request, Institution $institution)
    {
        $data = $request->validated();
        if (isset($data['address']) && is_array($data['address'])) {
            $addressData = $data['address'];
            unset($data['address']);


            if ($institution->address) {
                $institution->address->update($addressData);
            } else {

                $newAddress = \App\Models\Address::create($addressData);
                $institution->update(['address_id' => $newAddress->id]);
            }
        }

        $payload = [
            'fantasy_name' => $data['fantasy_name'],
            'cnpj' => $data['cnpj'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'is_active' => $data['is_active'] ?? false,
            'description' => $data['description'] ?? null,
        ];

        if ($request->boolean('remove_photo') && $institution->photo_path) {
            $old = str_replace('/storage/', '', $institution->photo_path);
            Storage::disk('public')->delete($old);
            $payload['photo_path'] = null;
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('institutions', 'public');


            if ($institution->photo_path) {
                $old = str_replace('/storage/', '', $institution->photo_path);
                Storage::disk('public')->delete($old);
            }
            $payload['photo_path'] = Storage::url($path);
        }

        $institution->update($payload);

        return redirect()->route('institutions.index')
            ->with('success', 'Instituição atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        $institution->delete();
        return redirect()->route('institutions.index')->with('success', 'Instituição removida com sucesso!');
    }

    public function active(\App\Models\Institution $institution)
    {
        $institution->is_active = !$institution->is_active;
        $institution->save();

        return back()->with('success', 'Status da instituição atualizado!');
    }
}
