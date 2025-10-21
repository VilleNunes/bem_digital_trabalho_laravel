<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;
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
        //
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
        $data = $request->validate([
            'fantasy_name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'is_active' => ['nullable'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $institution->update($data);

        return redirect()->route('institutions.index')->with('success', 'Instituição atualizada com sucesso!');
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
