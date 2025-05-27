@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nieuwsitem bewerken</h1>
        
        <form action="{{ route('news.update', $newsItem) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $newsItem->title) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Afbeelding (huidige afbeelding: <img src="{{ Storage::url($newsItem->image_path) }}" alt="Afbeelding" width="100px">)</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="content">Inhoud</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $newsItem->content) }}</textarea>
            </div>

            <div class="form-group">
                <label for="published_at">Publicatiedatum</label>
                <input type="date" name="published_at" id="published_at" class="form-control" value="{{ old('published_at', $newsItem->published_at->format('Y-m-d')) }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Bijwerken</button>
        </form>
    </div>
@endsection
