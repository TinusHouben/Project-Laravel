@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>{{ $user->username ?? $user->name }}'s profiel</h1>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/150' }}" alt="Profielfoto">
        <div class="card-body">
            <h5 class="card-title">{{ $user->username ?? $user->name }}</h5>
            <p class="card-text">
                <strong>Verjaardag:</strong> {{ $user->birthday ? $user->birthday->format('d-m-Y') : 'Niet opgegeven' }}<br>
                <strong>Over mij:</strong> {{ $user->about_me ?? 'Geen informatie' }}
            </p>
        </div>
    </div>
</div>
@endsection
