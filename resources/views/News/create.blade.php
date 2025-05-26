@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuw nieuwsitem toevoegen</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titel</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Afbeelding</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Inhoud</label>
            <textarea name="content" id="content" rows="5" class="form-control" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Publicatiedatum</label>
            <input type="datetime-local" name="published_at" id="published_at" class="form-control" value="{{ old('published_at') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
