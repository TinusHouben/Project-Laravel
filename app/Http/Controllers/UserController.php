<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Toon lijst van alle gebruikers
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Formulier om nieuwe gebruiker aan te maken
    public function create()
    {
        return view('admin.users.create');
    }

    // Nieuwe gebruiker opslaan
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'nullable|boolean',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['is_admin'] = $data['is_admin'] ?? false;

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker aangemaakt.');
    }

    // Promote user tot admin
    public function promote(User $user)
    {
        $user->is_admin = true;
        $user->save();

        return back()->with('success', 'Gebruiker is nu admin.');
    }

    // Admin rechten verwijderen
    public function demote(User $user)
    {
        $user->is_admin = false;
        $user->save();

        return back()->with('success', 'Adminrechten verwijderd.');
    }
}
