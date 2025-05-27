@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $newsItem->title }}</h1>

        <!-- Afbeelding van het nieuwsitem -->
        <div class="mt-4">
            <img src="{{ Storage::url($newsItem->image_path) }}" alt="Nieuws afbeelding" class="rounded-lg shadow-lg w-full max-w-3xl mx-auto mb-6">
        </div>

        <!-- Datum van publicatie -->
        <p class="text-gray-600 dark:text-gray-400 text-lg">
            <strong>Gepubliceerd op:</strong> {{ $newsItem->published_at->format('d-m-Y') }}
        </p>

        <!-- Nieuwsinhoud -->
        <div class="mt-6 text-gray-800 dark:text-gray-300 text-lg leading-relaxed">
            {!! nl2br(e($newsItem->content)) !!}
        </div>
    </div>
@endsection
