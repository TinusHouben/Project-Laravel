<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    // Toon het wachtwoord wijzigingsformulier
    public function edit()
    {
        // Zorg ervoor dat de juiste view wordt geladen
        return view('auth.passwords.edit');
    }

    // Werk het wachtwoord bij
    public function update(Request $request)
    {
        // Validatie
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Controleer of het huidige wachtwoord correct is
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Het huidige wachtwoord is niet correct.']);
        }

        // Werk het wachtwoord bij
        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        // Geef een succesbericht terug na het bijwerken van het wachtwoord
        return redirect()->route('profile.show')->with('status', 'Wachtwoord succesvol bijgewerkt!');
    }
}

