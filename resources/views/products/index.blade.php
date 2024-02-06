<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="ml-2 font-semibold text-xl text-gray-800 leading-tight py-2">
                {{ __('Početna') }}
            </h2>
        </div>

        <div class="p-2">
            <a href="\add_product">
                <x-button class="bg-white text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2.5 text-center me-2 mb-2 ml-1 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                    {{ __('Dodavanje produkta') }}
                </x-button>
            </a>
        </div>

        <div class="p-2">
            <form method="GET" action="{{ route('products') }}">
                <label for="category">Kategorija:</label>
                <select name="category" id="category">
                    <option value="" @if (!$selectedCategory) selected @endif>Sve</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($selectedCategory == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <x-button type="submit" class="bg-white text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2.5 text-center me-2 mb-2 ml-1 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                    Filtriraj
                </x-button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4">
                    @foreach ($products as $p)
                        <div class="p-2">
                            <div class="bg-white border border-gray-300 shadow-sm sm:rounded-lg">
                                <div class="p-4 space-y-4">
                                    <!-- Row 1: Product Details -->
                                    <ul>
                                        <li>Naziv: {{ $p->name }}</li>
                                        <li>Cijena: {{ $p->price }} KM</li>
                                        <li>Opis: {{ $p->description }}</li>
                                        <li>Godina proizvodnje: {{ $p->year_of_production }}</li>
                                        <li>Godina isteka roka: {{ $p->year_of_expiration }}</li>
                                        <li>Brand: {{ $p->brand->name }}</li>
                                    </ul>

                                    <!-- Row 2: Obrisi and Uredi Buttons -->
                                    <div class="flex justify-end space-x-4">
                                        <!-- Obrisi Button -->
                                        <form method="POST" action="{{ route('destroy_product') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $p->id }}">
                                            <x-button type="submit" class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-4 py-2.5 text-center ml-1 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-500 dark:focus:ring-red-800">
                                                {{ __('Obrisi') }}
                                            </x-button>
                                        </form>

                                        <!-- Uredi Button -->
                                        <form method="POST" action="{{ route('edit_product') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $p->id }}">
                                            <x-button type="submit" class="bg-white text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2.5 text-center ml-1 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                                {{ __('Uredi') }}
                                            </x-button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
