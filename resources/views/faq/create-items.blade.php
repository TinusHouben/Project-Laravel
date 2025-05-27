@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuw FAQ-item aanmaken</h1>

    <form action="{{ route('faq.items.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="faq_category_id" class="form-label">Categorie</label>
            <select name="faq_category_id" id="faq_category_id" class="form-select" required>
                <option value="">Selecteer categorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('faq_category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('faq_category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="question" class="form-label">Vraag</label>
            <input type="text" name="question" id="question" class="form-control" value="{{ old('question') }}" required>
            @error('question')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="answer" class="form-label">Antwoord</label>
            <textarea name="answer" id="answer" class="form-control" rows="5" required>{{ old('answer') }}</textarea>
            @error('answer')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">FAQ-item aanmaken</button>
    </form>
</div>
@endsection
