@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $newsItem->title }}</h1>

    <p><small>Gepubliceerd op {{ $newsItem->published_at->format('d-m-Y H:i') }}</small></p>

    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" style="max-width: 100%; height: auto;">

    <p>{!! nl2br(e($newsItem->content)) !!}</p>
</div>
@endsection
