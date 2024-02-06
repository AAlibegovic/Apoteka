<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Employee;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with(['customer', 'product', 'employee'])
            ->select('sales.*', 'customers.Fname', 'customers.Lname', 'products.name as product_name')
            ->join('customers', 'sales.customer_id', '=', 'customers.id')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->get();
    
        return view('sales.index', ['sales' => $sales]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = DB::table('customers')->get();
        $products = DB::table('products')->get();
        $employees = DB::table('employees')->select('id', 'Fname', 'Lname')->get(); // Use the DB facade
    
        return view('sales.add', ['customers' => $customers, 'products' => $products, 'employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'sale_date' => 'required',
            'quantity' => 'required',
            'employee_id' => 'required',
        ]);

        DB::table('sales')->insert([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'sale_date' => $request->sale_date,
            'quantity' => $request->quantity,
            'employee_id' => $request->employee_id,
        ]);

        return redirect()->route('sales');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $sale = DB::table('sales')->where('id', $id)->first();

        return view('sales.show', ['sale' => $sale]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $sale = DB::table('sales')->where('id', $id)->first();
        $customers = DB::table('customers')->get();
        $products = DB::table('products')->get();
        $employees = DB::table('employees')->select('id', 'Fname', 'Lname')->get(); // Use the DB facade
    
        return view('sales.edit', ['sale' => $sale, 'customers' => $customers, 'products' => $products, 'employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'sale_date' => 'required',
            'quantity' => 'required',
            'employee_id' => 'required',
        ]);

        DB::table('sales')->where('id', $id)->update([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'sale_date' => $request->sale_date,
            'quantity' => $request->quantity,
            'employee_id' => $request->employee_id,
        ]);

        return redirect()->route('sales');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table('sales')->where('id', $id)->delete();

        return redirect()->route('sales');
    }
}

