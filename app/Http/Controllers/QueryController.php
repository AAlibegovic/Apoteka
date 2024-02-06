<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class QueryController extends Controller
{
    public function index()
    {
        

        // Query 1: Retrieve Sales Information with Customer and Product Details
        $salesInformation = Sale::select(
            'sales.id as sale_id',
            'sales.sale_date',
            'customers.Fname as customer_first_name',
            'customers.Lname as customer_last_name',
            'products.name as product_name',
            'sales.quantity',
            'employees.Fname as employee_first_name'
        )
            ->join('customers', 'sales.customer_id', '=', 'customers.id')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->join('employees', 'sales.employee_id', '=', 'employees.id')
            ->get();
        

        // Query 2: Calculate Total Sales Revenue for Each Product
        $totalRevenue = Product::select([
            'products.id',
            'products.name as product_name',
            'products.price as price',
            \DB::raw('COALESCE(SUM(sales.quantity), 0) as quantity'),
            \DB::raw('COALESCE(SUM(sales.quantity * products.price), 0) as total_revenue')
        ])
        ->leftJoin('sales', 'products.id', '=', 'sales.product_id')
        ->groupBy('products.id', 'products.name', 'products.price') 
        ->havingRaw('total_revenue > 0')
        ->get();
    
        // Query 3: List Products with Expiring Soon
        $expiringProducts = Product::select(
            'id',
            'name',
            'price',
            'year_of_expiration'
        )
            ->whereBetween('year_of_expiration', [now(), now()->addDays(30)])
            ->get();
        

        // Query 4: Find Products with Highest Sales Quantity
        $highestSalesQuantityProduct = Product::select(
            'products.name as product_name',
            \DB::raw('MAX(sales.quantity) as highest_sales_quantity')
        )
            ->join('sales', 'products.id', '=', 'sales.product_id')
            ->groupBy('products.name')
            ->first();

        // Query 5: Retrieve Brands with the Average Price of their Products
        $brandsWithAveragePrice = Brand::select(
            'brands.id',
            'brands.name as brand_name',
            \DB::raw('AVG(products.price) as average_product_price')
        )
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->groupBy('brands.id', 'brands.name')
            ->get();

        // Query 6: Identify Brands with Products Expiring Soon
        $brandsWithExpiringProducts = Brand::select('brands.name as brand_name')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->whereBetween('products.year_of_expiration', [now(), now()->addDays(30)])
            ->groupBy('brands.name')
            ->get();

        // Query 7: List Categories with the Number of Products
        $categoriesWithProductCount = Category::select(
            'categories.id',
            'categories.name as category_name',
            \DB::raw('COUNT(products.id) as number_of_products')
        )
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->groupBy('categories.id', 'categories.name')
            ->get();

        // Query 8: Find Categories with Products Over a Certain Price Threshold
        $uniqueCategories = DB::table('categories AS c')
        ->join('products AS p', 'c.id', '=', 'p.category_id')
        ->where('p.price', '>', 8)
        ->distinct()
        ->pluck('c.name')
        ->toArray();

        $categoriesWithHighPricedProducts = collect($uniqueCategories);

       
        return view('queries.index', [
            'salesInformation' => $salesInformation,
            'totalRevenue' => $totalRevenue,
            'expiringProducts' => $expiringProducts,
            'highestSalesQuantityProduct' => $highestSalesQuantityProduct,
            'brandsWithAveragePrice' => $brandsWithAveragePrice,
            'brandsWithExpiringProducts' => $brandsWithExpiringProducts,
            'categoriesWithProductCount' => $categoriesWithProductCount,
            'categoriesWithHighPricedProducts' => $categoriesWithHighPricedProducts,
        ]);
        
    }
}
