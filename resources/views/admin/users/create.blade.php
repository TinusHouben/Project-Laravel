<!-- resources/views/admin/users/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuwe gebruiker aanmaken</h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Bevestig wachtwoord</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
        </div>

        <div class="form-group">
            <label for="is_admin">Is admin</label>
            <input type="checkbox" name="is_admin" class="form-check-input" id="is_admin">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Opslaan</button>
    </form>
</div>
@endsection
