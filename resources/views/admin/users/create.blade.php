@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Nieuwe gebruiker aanmaken</h1>

                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        <!-- Naam input -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Naam</label>
                            <input type="text" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100" id="name" required placeholder="Vul de naam in">
                        </div>

                        <!-- E-mail input -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail</label>
                            <input type="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100" id="email" required placeholder="Vul een geldig e-mailadres in">
                        </div>

                        <!-- Wachtwoord input -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Wachtwoord</label>
                            <input type="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100" id="password" required placeholder="Vul een sterk wachtwoord in">
                        </div>

                        <!-- Wachtwoord bevestigen input -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bevestig wachtwoord</label>
                            <input type="password" name="password_confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100" id="password_confirmation" required placeholder="Bevestig je wachtwoord">
                        </div>

                        <!-- Is admin checkbox -->
                        <div class="mb-4">
                            <label for="is_admin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Is admin</label>
                            <div class="flex items-center">
                                <input type="checkbox" name="is_admin" class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" id="is_admin">
                                <label class="ml-2 text-sm text-gray-700 dark:text-gray-300" for="is_admin">Geef deze gebruiker adminrechten</label>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-6 py-2 mt-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                Opslaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
