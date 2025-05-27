@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuwe FAQ-categorie aanmaken</h1>

    <form action="{{ route('faq.categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Categorie naam</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Categorie aanmaken</button>
    </form>
</div>
@endsection
