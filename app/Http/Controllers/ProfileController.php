<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\User; // Voeg de User model toe voor publieke profielpagina

class ProfileController extends Controller
{
    /**
     * Display the user's private profile (logged-in user only).
     */
    public function show(Request $request): View
    {
        return view('profile.show', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's public profile (accessible by anyone).
     */
    public function showPublic($userId): View
    {
        // Haal de gebruiker op met het ID
        $user = User::findOrFail($userId);

        // Toon de publieke profielpagina
        return view('profile.show_public', compact('user'));
    }

    /**
     * Display the form to edit the user's profile.
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
        // Update de profielgegevens
        $user = $request->user();
        $user->fill($request->validated());

        // Verwerk de profielfoto upload (indien aanwezig)
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        // Update het profiel
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

    /**
     * Handle the upload of a profile picture.
     */
    public function uploadPhoto(Request $request): RedirectResponse
    {
        // Valideer het bestand (maximaal 2MB, alleen afbeeldingen)
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);

        // Verkrijg de ingelogde gebruiker
        $user = $request->user();

        // Verwerk de afbeelding en sla deze op
        $path = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo = $path;

        // Sla de gebruiker op
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-photo-updated');
    }
}
