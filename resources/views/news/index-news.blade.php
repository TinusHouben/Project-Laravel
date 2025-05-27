@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nieuws overzicht
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @foreach ($newsItems as $newsItem)
                    <div class="mb-6 border rounded shadow p-4 bg-gray-50 dark:bg-gray-900">
                        <img src="{{ Storage::url($newsItem->image_path) }}" alt="Nieuws afbeelding" class="mb-3 w-full max-h-48 object-cover rounded">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-gray-100">{{ $newsItem->title }}</h3>
                        <p class="mb-2 text-gray-700 dark:text-gray-300">{{ Str::limit($newsItem->content, 150) }}</p>
                        <a href="{{ route('news.show', $newsItem) }}" class="text-blue-600 hover:underline dark:text-blue-400">Lees meer</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
