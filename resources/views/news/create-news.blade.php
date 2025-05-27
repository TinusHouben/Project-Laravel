@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6">Nieuw nieuwsitem aanmaken</h1>

        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Titel -->
            <div class="form-group">
                <label for="title" class="text-gray-700 dark:text-gray-300">Titel</label>
                <input type="text" id="title" name="title" class="form-control w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-400" required>
            </div>

            <!-- Afbeelding -->
            <div class="form-group">
                <label for="image" class="text-gray-700 dark:text-gray-300">Afbeelding</label>
                <input type="file" id="image" name="image" class="form-control w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-400" required>
            </div>

            <!-- Inhoud -->
            <div class="form-group">
                <label for="content" class="text-gray-700 dark:text-gray-300">Inhoud</label>
                <textarea id="content" name="content" class="form-control w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-400" rows="5" required></textarea>
            </div>

            <!-- Publicatiedatum -->
            <div class="form-group">
                <label for="published_at" class="text-gray-700 dark:text-gray-300">Publicatiedatum</label>
                <input type="date" id="published_at" name="published_at" class="form-control w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-400" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary py-2 px-6 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-600">
                Opslaan
            </button>
        </form>
    </div>
@endsection
