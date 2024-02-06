<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="ml-2 font-semibold text-xl text-gray-800 leading-tight py-2">
                {{ __('Narudžbe') }}
            </h2>
        </div>

        <div class="p-2">
            <a href="\add_sale">
                <x-button class="bg-white text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2.5 text-center me-2 mb-2 ml-1 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                    {{ __('Dodavanje narudžbe') }}
                </x-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    @foreach ($sales as $sale)
                        <div class="flex space-x-4">
                            <div class="flex-1">
                                <ul>
                                    <li>Customer: {{ $sale->customer->Fname }} {{ $sale->customer->Lname }}</li>
                                    <li>Product: {{ $sale->product->name }}</li>
                                    <li>Sale Date: {{ $sale->sale_date }}</li>
                                    <li>Quantity: {{ $sale->quantity }}</li>
                                    <li>Employee: {{ $sale->employee->Fname }} {{ $sale->employee->Lname }}</li>
                                </ul>
                                <hr class="my-2 border-gray-300"> <!-- Add a horizontal line as separator -->
                            </div>

                            <div class="flex justify-end space-x-4">
                                <!-- Obrisi Button -->
                                <form method="POST" action="{{ route('destroy_sale') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $sale->id }}">
                                    <x-button type="submit" class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-4 py-2.5 text-center ml-1 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-500 dark:focus:ring-red-800">
                                        {{ __('Obrisi') }}
                                    </x-button>
                                </form>
                            </div>

                            <div class="pull-right">
                                {{-- Additional actions --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
