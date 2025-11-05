<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $role = optional($user->rule)->name;

        if ($role === 'admin') {
            $donationsQuery = Donation::with(['user.rule', 'institution'])->latest();
            $donations = $donationsQuery->paginate();
            $totalDonations = Donation::count();
            $totalAmount = (float) Donation::sum('amount');

            return view('backend.donations.index', compact('donations', 'role', 'totalDonations', 'totalAmount'));
        }

        if ($role === 'donor') {
            $donationsQuery = Donation::with(['user.rule', 'institution'])
                ->where('user_id', $user->id)
                ->latest();

            $donations = $donationsQuery->paginate();
            $totalDonations = Donation::where('user_id', $user->id)->count();
            $totalAmount = (float) Donation::where('user_id', $user->id)->sum('amount');

            return view('backend.donations.index', compact('donations', 'role', 'totalDonations', 'totalAmount'));
        }

        abort(403, 'Acesso não autorizado.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->ensureAdmin();

        $donors = User::with('rule')
            ->whereHas('rule', fn ($query) => $query->where('name', 'donor'))
            ->orderBy('name')
            ->get();

        $institutions = Institution::orderBy('fantasy_name')->get();

        return view('backend.donations.create', compact('donors', 'institutions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DonationRequest $request)
    {
        $this->ensureAdmin();

        $data = $request->validated();
        $donor = User::with('rule')->findOrFail($data['user_id']);

        if (optional($donor->rule)->name !== 'donor') {
            return back()
                ->withErrors(['user_id' => 'Selecione um usuário do tipo doador.'])
                ->withInput();
        }

        Donation::create($data);

        return redirect()->route('donations.index')
            ->with('status', 'Doação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        $this->ensureCanViewDonation($donation);

        return view('backend.donations.show', [
            'donation' => $donation->load('user.rule', 'institution'),
            'role' => optional(Auth::user()->rule)->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donation $donation)
    {
        $this->ensureAdmin();

        $donors = User::with('rule')
            ->whereHas('rule', fn ($query) => $query->where('name', 'donor'))
            ->orderBy('name')
            ->get();

        $institutions = Institution::orderBy('fantasy_name')->get();

        return view('backend.donations.edit', compact('donation', 'donors', 'institutions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DonationRequest $request, Donation $donation)
    {
        $this->ensureAdmin();

        $data = $request->validated();

        if (isset($data['user_id'])) {
            $donor = User::with('rule')->findOrFail($data['user_id']);

            if (optional($donor->rule)->name !== 'donor') {
                return back()
                    ->withErrors(['user_id' => 'Selecione um usuário do tipo doador.'])
                    ->withInput();
            }
        } else {
            $data['user_id'] = $donation->user_id;
        }

        if (! isset($data['institution_id'])) {
            $data['institution_id'] = $donation->institution_id;
        }

        $donation->update($data);

        return redirect()->route('donations.index')->with('status', 'Doação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        $this->ensureAdmin();

        $donation->delete();

        return redirect()->route('donations.index')->with('status', 'Doação removida com sucesso!');
    }

    /**
     * Garante acesso de administradores ou doadores donos.
     */
    protected function ensureCanViewDonation(Donation $donation): void
    {
        $user = Auth::user();

        $role = optional($user?->rule)->name;

        if ($role === 'admin') {
            return;
        }

        if ($role === 'donor' && $donation->user_id === $user->id) {
            return;
        }

        abort(403, 'Acesso não autorizado à doação informada.');
    }

    protected function ensureAdmin(): void
    {
        $role = optional(Auth::user()?->rule)->name;

        if ($role !== 'admin') {
            abort(403, 'Somente administradores podem realizar esta ação.');
        }
    }
}
