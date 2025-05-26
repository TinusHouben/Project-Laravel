@extends('layouts.app')

@section('content')
<h1>Nieuws</h1>

@foreach($newsItems as $newsItem)
    <article>
        <h2><a href="{{ route('news.show', $newsItem) }}">{{ $newsItem->title }}</a></h2>
        <p>Gepubliceerd op {{ $newsItem->published_at->format('d-m-Y') }}</p>
        <img src="{{ asset('storage/' . $newsItem->image_path) }}" alt="{{ $newsItem->title }}" style="max-width: 300px;">
        <p>{{ Str::limit($newsItem->content, 150) }}</p>
    </article>
@endforeach

@if(auth()->check() && auth()->user()->is_admin)
    <a href="{{ route('news.create') }}">Nieuw nieuwsitem toevoegen</a>
@endif
@endsection
