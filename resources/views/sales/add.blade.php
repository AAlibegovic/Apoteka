<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Naružba') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    <form method="POST" action="{{ route('store_sale') }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="customer_id" value="{{ __('Kupac') }}" />
                            <select id="customer_id" name="customer_id" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected="true" disabled="disabled">Odaberi</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->Fname }} {{ $customer->Lname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="product_id" value="{{ __('Produkt') }}" />
                            <select id="product_id" name="product_id" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected="true" disabled="disabled">Odaberi</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="employee_id" value="{{ __('Zaposlenik') }}" />
                            <select id="employee_id" name="employee_id" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected="true" disabled="disabled">Odaberi</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->Fname }} {{ $employee->Lname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="sale_date" value="{{ __('Datum prodaje') }}" />
                            <x-input id="sale_date" class="block mt-1 w-full" type="datetime-local" name="sale_date" :value="now()->format('Y-m-d\TH:i')" required readonly />
                        </div>

                        <div class="mt-4">
                            <x-label for="quantity" value="{{ __('Količina') }}" />
                            <x-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                        <x-button type="submit" class="text-blue-700 hover:text-white bg-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2.5 text-center me-2 mb-2 ml-1 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                            {{ __('Spremi') }}
                        </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
