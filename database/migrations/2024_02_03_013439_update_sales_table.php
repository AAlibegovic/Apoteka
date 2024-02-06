<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSalesTable  extends Migration
{
    public function up()
    {
        Schema::dropIfExists('sales');
        
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->date('sale_date');
            $table->double('quantity');
            $table->unsignedBigInteger('employee_id'); // Add employee_id column
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('employee_id')->references('id')->on('employees'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
