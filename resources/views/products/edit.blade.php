<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editovanje Proizvoda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    @foreach($products as $p)
                    <form method="POST" action="{{ route('update_product') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$p->id}}"/>

                        <div>
                            <x-label for="name" value="{{ __('Naziv') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$p->name}}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="price" value="{{ __('Cijena') }}" />
                            <x-input id="price" class="block mt-1 w-full" step="any" type="number" name="price" value="{{$p->price}}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="description" value="{{ __('Opis') }}" />
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description"  value="{{$p->description}}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="year_of_production" value="{{ __('Datum proizvodnje') }}" />
                            <x-input id="year_of_production" class="block mt-1 w-full" type="date" name="year_of_production" value="{{$p->year_of_production}}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="year_of_expiration" value="{{ __('Datum isteka roka') }}" />
                            <x-input id="year_of_expiration" class="block mt-1 w-full" type="date" name="year_of_expiration" value="{{$p->year_of_expiration}}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="brand" value="{{ __('Brend') }}" />
                            <select id="brand" name="brand" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected="true" disabled="disabled">Odaberi</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}" @if($brand->id == $p->brand_id) selected @endif>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="category" value="{{ __('Kategorija') }}" />
                            <select id="category" name="category" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected="true" disabled="disabled">Odaberi</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $p->category_id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2.5 text-center me-2 mb-2 ml-1 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                Spremi
                            </button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
