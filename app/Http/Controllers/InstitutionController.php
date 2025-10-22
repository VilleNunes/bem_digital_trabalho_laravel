<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Institution;

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

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('institutions', 'public');
        }

        \App\Models\Institution::create([
            'fantasy_name' => $data['fantasy_name'],
            'cnpj' => $data['cnpj'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'is_active' => $data['is_active'] ?? false,
            'description' => $data['description'] ?? null,
            'photo_path' => $data['photo_path'] ?? null,
            // 'address_id' se for setado aqui
        ]);

        return redirect()->route('institutions.index')
            ->with('success', 'Instituição criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Institution $institution)
    {
        //
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
