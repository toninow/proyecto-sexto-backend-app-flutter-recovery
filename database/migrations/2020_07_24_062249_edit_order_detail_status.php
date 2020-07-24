<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditOrderDetailStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		
		Schema::dropIfExists('order_details');
		
		Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('order_id');
			$table->string('order_product_name');
			$table->double('product_order_price');
			$table->string('product_photo');
			$table->string('status');
			$table->double('product_order_discount');
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
        //
    }
}