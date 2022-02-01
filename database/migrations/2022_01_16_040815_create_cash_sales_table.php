<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //'', '', '', ''
        Schema::create('cash_sales', function (Blueprint $table) {
            $table->id();
            $table->string('trans_id');
            $table->string('code');
            $table->string('net_tax');
            $table->string('gross_amount');
            $table->string('amount_paid');
            $table->string('returning_change');
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
        Schema::dropIfExists('cash_sales');
    }
}
