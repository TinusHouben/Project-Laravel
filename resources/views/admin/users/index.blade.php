@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Gebruikerslijst</h1>

                    <!-- Nieuw gebruiker knop -->
                    <a href="{{ route('admin.users.create') }}" class="mb-4 inline-block px-6 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Nieuwe gebruiker aanmaken</a>

                    <!-- Gebruikerslijst -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">#</th>
                                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Naam</th>
                                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Email</th>
                                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Rol</th>
                                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">{{ $user->id }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">{{ $user->name }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">{{ $user->email }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">
                                            @if ($user->is_admin)
                                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Admin</span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold text-gray-800 bg-gray-200 rounded-full">Gebruiker</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 text-sm text-gray-900 dark:text-gray-100">
                                            @if (!$user->is_admin)
                                                <form action="{{ route('admin.users.promote', $user) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Promoveer</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.users.demote', $user) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Demoteer</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
