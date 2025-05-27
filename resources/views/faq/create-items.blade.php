<!-- resources/views/faq/create-item.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuw FAQ Item Aanmaken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('faq.items.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="question" class="block text-sm font-medium text-gray-700">Vraag</label>
                            <input type="text" id="question" name="question" class="mt-1 block w-full" value="{{ old('question') }}" required>
                            @error('question')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="answer" class="block text-sm font-medium text-gray-700">Antwoord</label>
                            <textarea id="answer" name="answer" class="mt-1 block w-full" required>{{ old('answer') }}</textarea>
                            @error('answer')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="faq_category_id" class="block text-sm font-medium text-gray-700">Categorie</label>
                            <select id="faq_category_id" name="faq_category_id" class="mt-1 block w-full" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('faq_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('faq_category_id')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">FAQ Item Toevoegen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
