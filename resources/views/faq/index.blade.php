<!-- resources/views/faq/index.blade.php -->
@extends('layouts.app') <!-- Gebruik je standaard app layout -->

@section('content') <!-- Dit is waar de inhoud komt -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- FAQ inhoud begint hier -->
                    <h3 class="text-lg font-bold mb-4">FAQ Categorieën</h3>

                    <!-- Vaste FAQ-items, zonder database -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- FAQ-item 1 -->
                        <div class="mb-6">
                            <h4 class="text-xl font-semibold">Wat is de locatie van de sportvereniging?</h4>
                            <p class="text-gray-600">Onze sportvereniging is gevestigd in de Sportstraat 12, 1234 AB in de stad.</p>
                        </div>

                        <!-- FAQ-item 2 -->
                        <div class="mb-6">
                            <h4 class="text-xl font-semibold">Hoe kan ik me inschrijven voor een team?</h4>
                            <p class="text-gray-600">Je kunt je inschrijven voor een team via het formulier op onze website. Ga naar de pagina 'Teams' en vul het formulier in.</p>
                        </div>

                        <!-- FAQ-item 3 -->
                        <div class="mb-6">
                            <h4 class="text-xl font-semibold">Wat zijn de lidmaatschapskosten?</h4>
                            <p class="text-gray-600">De lidmaatschapskosten zijn €200 per jaar, inclusief toegang tot alle trainingen en faciliteiten.</p>
                        </div>

                        <!-- FAQ-item 4 -->
                        <div class="mb-6">
                            <h4 class="text-xl font-semibold">Hoe kan ik mijn lidmaatschap opzeggen?</h4>
                            <p class="text-gray-600">Je kunt je lidmaatschap opzeggen door contact op te nemen met onze klantenservice via het contactformulier op de website.</p>
                        </div>
                    </div>
                    <!-- FAQ inhoud eindigt hier -->
                </div>
            </div>
        </div>
    </div>
@endsection
