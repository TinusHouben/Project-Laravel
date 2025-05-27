<!-- resources/views/news/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Nieuw nieuwsitem aanmaken</h1>
    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="title">Titel:</label>
        <input type="text" id="title" name="title" required>

        <label for="image">Afbeelding:</label>
        <input type="file" id="image" name="image" required>

        <label for="content">Inhoud:</label>
        <textarea id="content" name="content" required></textarea>

        <label for="published_at">Publicatiedatum:</label>
        <input type="date" id="published_at" name="published_at" required>

        <button type="submit">Opslaan</button>
    </form>
@endsection
