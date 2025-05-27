@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $newsItem->title }}</h1>
        <img src="{{ Storage::url($newsItem->image_path) }}" alt="Nieuws afbeelding" class="img-fluid mb-3">
        <p><strong>Gepubliceerd op:</strong> {{ $newsItem->published_at->format('d-m-Y') }}</p>
        <div>{!! nl2br(e($newsItem->content)) !!}</div>
    </div>
@endsection
