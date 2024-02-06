<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="ml-2 font-semibold text-xl text-gray-800 leading-tight py-2">
                {{ __('Rezultati upita') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Sales Information -->
                <h1 class="text-2xl font-semibold mb-4">Informacije o prodaji</h1>
                <p>
                Dohvata detaljne informacije o svakoj prodaji, uključujući ID prodaje, datum prodaje, detalje o kupcu, naziv proizvoda, količinu prodaje i detalje o zaposleniku.
                </p>
                <br> 
                @if($salesInformation->count() > 0)
                    <ul>
                        @foreach($salesInformation as $sale)
                            <li>
                                ID prodaje: {{ $sale['sale_id'] }},
                                Datum prodaje: {{ $sale['sale_date'] }},
                                Kupac: {{ $sale['customer_first_name'] }} {{ $sale['customer_last_name'] }},
                                Proizvod: {{ $sale['product_name'] }},
                                Količina: {{ $sale['quantity'] }},
                                Zaposlenik: {{ $sale['employee_first_name'] }}
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-4"> 
                @else
                    <p>Nisu dostupne informacije</p>
                @endif

                <!-- Total Sales Revenue -->
                <h1 class="text-2xl font-semibold mb-4 mt-8">Ukupni prihod od prodaje</h1>
                <p>
                    Izračunava ukupni prihod za svaki proizvod na temelju prodane količine i cijene proizvoda.
                </p>
                <br> 
                @if($totalRevenue->count() > 0)
                    <ul>
                        @foreach($totalRevenue as $revenue)
                            <li>
                                ID proizvoda: {{ $revenue->id }},
                                Naziv proizvoda: {{ $revenue->product_name }},
                                Cijena proizvoda: {{ $revenue->price }},
                                Prodajna količina: {{ $revenue->quantity }},
                                Ukupni prihod: {{ $revenue->total_revenue }}
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-4">
                @else
                    <p>Nema dostupnih ukupnih prihoda od prodaje.</p>
                @endif


                <!-- Expiring Products -->
                <h1 class="text-2xl font-semibold mb-4 mt-8">Proizvodi sa istekom roka</h1>
                <p>
                    Popis proizvoda s rokom isteka unutar sljedećih 30 dana.
                </p>
                <br> 
                @if($expiringProducts->count() > 0)
                    <ul>
                        @foreach($expiringProducts as $product)
                            <li>
                                ID proizvoda: {{ $product->id }},
                                Naziv proizvoda: {{ $product->name }},
                                Cijena: {{ $product->price }},
                                Datum isteka: {{ $product->year_of_expiration }}
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-4">
                @else
                    <p>Nema dostupnih proizvoda koji ističu.</p>
                @endif


                <!-- Highest Sales Quantity Product -->
                <h1 class="text-2xl font-semibold mb-4 mt-8">Proizvod s najvećom količinom prodaje</h1>
                <p>
                    Identificira proizvod s najvećom količinom prodaje.
                </p>
                <br> 
                @if($highestSalesQuantityProduct->count() > 0)
                    <ul>
                        <li>
                            Naziv proizvoda: {{ $highestSalesQuantityProduct['product_name'] }},
                            Najveća količina prodaje: {{ $highestSalesQuantityProduct['highest_sales_quantity'] }}
                        </li>
                    </ul>
                    <hr class="my-4">
                @else
                    <p>Nema dostupnih informacija o proizvodu s najvećom količinom prodaje.</p>
                @endif


                <!-- Brands with Average Price -->
                <h1 class="text-2xl font-semibold mb-4 mt-8">Brendovi s prosječnom cijenom</h1>
                <p>
                    Izračunava prosječnu cijenu proizvoda za svaku marku.
                </p>
                <br> 
                @if($brandsWithAveragePrice->count() > 0)
                    <ul>
                        @foreach($brandsWithAveragePrice as $brand)
                            <li>
                                ID marke: {{ $brand->id }},
                                Naziv marke: {{ $brand->brand_name }},
                                Prosječna cijena proizvoda: {{ $brand->average_product_price }}
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-4">
                @else
                    <p>Nema dostupnih informacija o markama s prosječnom cijenom.</p>
                @endif


                <!-- Brands with Expiring Products -->
                <h1 class="text-2xl font-semibold mb-4 mt-8">Brendovi s proizvodima kojima ističe rok</h1>
                <p>
                    Popis brendova koje imaju proizvode s rokom isteka unutar sljedećih 30 dana.
                </p>
                <br> 
                @if($brandsWithExpiringProducts->count() > 0)
                    <ul>
                        @foreach($brandsWithExpiringProducts as $brand)
                            <li>
                                Naziv marke: {{ $brand['brand_name'] }}
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-4">
                @else
                    <p>Nema dostupnih informacija o markama s proizvodima koji ističu.</p>
                @endif


                <!-- Categories with Product Count -->
                <h1 class="text-2xl font-semibold mb-4 mt-8">Kategorije s brojem proizvoda</h1>
                <p>
                    Broji broj proizvoda u svakoj kategoriji.
                </p>
                <br> 
                @if($categoriesWithProductCount->count() > 0)
                    <ul>
                        @foreach($categoriesWithProductCount as $category)
                            <li>
                                ID kategorije: {{ $category->id }},
                                Naziv kategorije: {{ $category->category_name }},
                                Broj proizvoda: {{ $category->number_of_products }}
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-4">
                @else
                    <p>Nema dostupnih informacija o kategorijama s brojem proizvoda.</p>
                @endif


                <!-- Categories with High Priced Products -->
                <h1 class="text-2xl font-semibold mb-4 mt-8">Kategorije s proizvodima visoke cijene</h1>
                <p>
                    Popis kategorija koje imaju proizvode s cijenama većom od 8 KM.
                </p>
                <br> 
                @if($categoriesWithHighPricedProducts->count() > 0)
                    <ul>
                        @foreach($categoriesWithHighPricedProducts as $category)
                            <li>
                                Naziv kategorije: {{ $category }}
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-4">
                @else
                    <p>Nema dostupnih informacija o kategorijama s proizvodima visoke cijene.</p>
                @endif


            </div>
        </div>
    </div>

</x-app-layout>
