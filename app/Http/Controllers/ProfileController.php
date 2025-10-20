<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
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

        // Upload da imagem (se existir)
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            // Apagar avatar antigo se existir
            if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                Storage::delete('public/' . $user->avatar);
            }

            // Armazenar o novo arquivo
            $path = $avatar->store('avatars', 'public');
            $validated['avatar'] = $path;
        }

        // Atualizar dados
        $user->update($validated);

        return Redirect::route('profile.edit')->with('status', 'Perfil atualizado com sucesso!');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = $request->user();

        if ($user->foto && Storage::exists('public/' . $user->foto)) {
            Storage::delete('public/' . $user->foto);
        }

        $path = $request->file('foto')->store('avatars', 'public');
        $user->foto = $path;
        $user->save();

        return back()->with('success', 'Foto atualizada com sucesso!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
