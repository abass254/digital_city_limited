<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'', '', '', '', ''
        Schema::create('cash_sale_details', function (Blueprint $table) {
            $table->id();
            $table->string('cash_id');
            $table->string('prod_id');
            $table->string('qty');
            $table->string('tax');
            $table->string('price');
            $table->string('total_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_sale_details');
    }
}
