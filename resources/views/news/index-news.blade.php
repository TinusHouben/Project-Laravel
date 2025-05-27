@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nieuwsitems</h1>
        <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Nieuw Nieuwsitem toevoegen</a>
        
        @foreach ($newsItems as $newsItem)
            <div class="card mb-3">
                <img src="{{ Storage::url($newsItem->image_path) }}" alt="Nieuws afbeelding" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $newsItem->title }}</h5>
                    <p class="card-text">{{ Str::limit($newsItem->content, 150) }}</p>
                    <a href="{{ route('news.show', $newsItem) }}" class="btn btn-primary">Lees meer</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
