@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profiel van ') }} {{ $user->username ?? $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Profiel info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex justify-center items-center">
                            <!-- Profielfoto -->
                            <img class="rounded-full w-32 h-32 object-cover" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/150' }}" alt="Profielfoto">
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">{{ $user->username ?? $user->name }}</h3>
                            <p><strong>Verjaardag:</strong> {{ $user->birthday ? $user->birthday->format('d-m-Y') : 'Niet opgegeven' }}</p>
                            <p><strong>Over mij:</strong> {{ $user->about_me ?? 'Geen informatie' }}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
