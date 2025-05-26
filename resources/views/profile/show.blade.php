<!-- resources/views/profile/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}'s Profiel</h1>
        <img src="{{ Storage::url($user->profile_photo) }}" alt="Profielfoto" width="150">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Over mij:</strong> {{ $user->about_me ?? 'Niets ingevuld' }}</p>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Bewerk Profiel</a>
        <a href="{{ route('password.edit') }}" class="btn btn-secondary">Wachtwoord Wijzigen</a>
    </div>
@endsection
