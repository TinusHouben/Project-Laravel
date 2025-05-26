@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Gebruikerslijst</h1>

    <!-- Nieuw gebruiker knop -->
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Nieuwe gebruiker aanmaken</a>

    <!-- Gebruikerslijst -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->is_admin)
                            <span class="badge bg-success">Admin</span>
                        @else
                            <span class="badge bg-secondary">Gebruiker</span>
                        @endif
                    </td>
                    <td>
                        @if (!$user->is_admin)
                            <form action="{{ route('admin.users.promote', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Promoveer</button>
                            </form>
                        @else
                            <form action="{{ route('admin.users.demote', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Demoteer</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
