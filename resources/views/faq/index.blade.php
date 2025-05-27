@extends('layouts.app')

@section('content')
<h1>FAQ</h1>

@foreach($categories as $category)
    <h2>{{ $category->name }}</h2>
    <ul>
        @foreach($category->faqItems as $item)
            <li>
                <strong>{{ $item->question }}</strong><br>
                {{ $item->answer }}
            </li>
        @endforeach
    </ul>
@endforeach
@endsection
