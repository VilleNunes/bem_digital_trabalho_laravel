<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\Address;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        // Atualizar apenas dados do usuário (sem imagem)
        $user->update($validated);

        return Redirect::route('profile.edit')->with('status', 'Perfil atualizado com sucesso!');
    }

    /**
     * Atualiza apenas o avatar do usuário
     */
    public function updateAvatar(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $user = $request->user();

        // Apagar avatar antigo (se não for o padrão)
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Salvar novo
        $path = $request->file('avatar')->store('avatars', 'public');
        $user->update(['avatar' => $path]);

        return back()->with('success', 'Foto de perfil atualizada com sucesso!');
    }

    public function updateAddress(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'zip'           => ['nullable', 'string', 'max:100'],
            'state'         => ['nullable', 'string', 'max:100'],
            'city'          => ['nullable', 'string', 'max:100'],
            'neighborhood'  => ['nullable', 'string', 'max:100'],
            'road'          => ['nullable', 'string', 'max:100'],
            'number'        => ['nullable', 'string', 'max:100'],
            'complement'    => ['nullable', 'string', 'max:100'],
        ]);

        $user = $request->user();

        // Se já existir um endereço, atualiza
        if ($user->address) {
            $user->address->update($validated);
        } else {
            // Cria novo endereço e associa ao usuário
            $address = Address::create($validated);
            $user->address()->associate($address);
            $user->save();
        }

        return back()->with('success', 'Endereço atualizado com sucesso!');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Conta excluída com sucesso!');
    }
}
