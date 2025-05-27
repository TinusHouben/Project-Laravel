<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\User; 

class ProfileController extends Controller
{
   
    public function show(Request $request): View
    {
        return view('profile.show', [
            'user' => $request->user(),
        ]);
    }

  public function index(): View
{
    $users = User::all();
    return view('profile.show', compact('users'));
}


  
    public function showPublic($userId): View
    {
       
        $user = User::findOrFail($userId);

        
        return view('profile.show_public', compact('user'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

   
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
       
        $user = $request->user();
        $user->fill($request->validated());

        
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

       
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

  
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

 
    public function uploadPhoto(Request $request): RedirectResponse
    {
    
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);


        $user = $request->user();


        $path = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo = $path;

   
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-photo-updated');
    }
}
