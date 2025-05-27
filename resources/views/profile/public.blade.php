@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-white">{{ $user->username ?? $user->name }}'s Profiel</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Profiel Card -->
            <div class="card shadow-sm text-white bg-dark">
                <!-- Profielfoto -->
                <img class="card-img-top" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/150' }}" alt="Profielfoto" style="width: 100%; max-height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->username ?? $user->name }}</h5>
                    <p class="card-text">
                        <strong>Verjaardag:</strong> {{ $user->birthday ? $user->birthday->format('d-m-Y') : 'Niet opgegeven' }}<br>
                        <strong>Over mij:</strong> {{ $user->about_me ?? 'Geen informatie' }}
                    </p>

                    <!-- Bewerken en Wachtwoord Wijzigen Knoppen voor de ingelogde gebruiker -->
                    @if (Auth::check() && Auth::user()->id == $user->id)
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Bewerk Profiel</a>
                            <a href="{{ route('password.edit') }}" class="btn btn-secondary">Wachtwoord Wijzigen</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
