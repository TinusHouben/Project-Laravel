<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Sportvereniging Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-6">Welkom bij onze Sportvereniging! 🏆</h1>

                    <!-- Over Ons Sectie -->
                    <section class="mb-12">
                        <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">Over Ons</h2>
                        <p class="text-lg text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus scelerisque, sapien non cursus tincidunt, elit dui consequat tortor, id vehicula velit velit nec neque. Nullam eget nisi vel urna posuere dictum. Ut sollicitudin libero ut vehicula placerat. Donec ultricies, nulla id sodales vulputate, orci elit gravida arcu, sit amet pretium libero sapien et eros. Duis tempor vestibulum urna, sit amet dictum felis cursus in. 
                        </p>
                        <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">
                            Curabitur et nisi sit amet tortor sodales sollicitudin. Proin auctor velit ac augue convallis, ut hendrerit dui malesuada. Nam ut sem at dui pretium tristique. Fusce hendrerit, lorem eget egestas vehicula, sapien eros ullamcorper ex, at feugiat felis lacus ut libero.
                        </p>
                    </section>

                    <!-- Onze Teams Sectie -->
                    <section class="mb-12">
                        <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">Onze Teams</h2>
                        <p class="text-lg text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec purus eget libero mollis egestas. Aliquam erat volutpat. In vehicula ipsum libero, vel suscipit dolor euismod ac. Cras fringilla scelerisque purus, vel tempor libero ullamcorper eu.
                        </p>
                        <ul class="list-disc pl-5 mt-4 text-lg text-gray-700 dark:text-gray-300">
                            <li>Voetbal</li>
                            <li>Basketbal</li>
                            <li>Tennis</li>
                            <li>Atletiek</li>
                            <li>Handbal</li>
                        </ul>
                    </section>

                    <!-- Evenementen Sectie -->
                    <section class="mb-12">
                        <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">Evenementen</h2>
                        <p class="text-lg text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin nisi id nisi venenatis, in egestas magna feugiat. Morbi bibendum, sapien eu tincidunt tempor, metus elit volutpat nunc, ut dignissim purus neque id purus. Suspendisse tristique quam id dui volutpat, ut sodales magna sollicitudin.
                        </p>

                        <div class="mt-6 space-y-4">
                            <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Zomer Sportfestival</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">15 juli 2025 | Van 10:00 tot 18:00 uur</p>
                                <p class="text-gray-700 dark:text-gray-300 mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquet, tortor ac mollis pharetra, elit turpis vehicula orci, nec aliquet urna leo sit amet elit.
                                </p>
                            </div>
                            <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Wintercompetitie</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">1 december 2025 | Van 09:00 tot 16:00 uur</p>
                                <p class="text-gray-700 dark:text-gray-300 mt-2">
                                    Nulla facilisi. Proin tristique metus eu tortor efficitur, sit amet tincidunt enim gravida. Suspendisse potenti. Nunc venenatis leo ut arcu fermentum, nec egestas orci iaculis.
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- Contactinformatie Sectie -->
                    <section class="mb-12">
                        <h2 class="text-2xl font-semibold text-blue-600 dark:text-blue-400 mb-4">Contactinformatie</h2>
                        <p class="text-lg text-gray-700 dark:text-gray-300">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet lacinia nisi, ac feugiat nunc dictum in. Curabitur condimentum tincidunt purus, ac aliquam neque posuere id. Aliquam erat volutpat.
                        </p>
                        <ul class="list-none mt-4 space-y-2">
                            <li class="text-gray-700 dark:text-gray-300">📍 Adres: Sportstraat 12, 1234 AB</li>
                            <li class="text-gray-700 dark:text-gray-300">📞 Telefoon: 0123 456 789</li>
                            <li class="text-gray-700 dark:text-gray-300">📧 E-mail: info@sportvereniging.nl</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
