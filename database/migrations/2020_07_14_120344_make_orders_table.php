<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
		Schema::dropIfExists('orders');
        //
		Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('order_date');
			$table->integer('product_id');
			$table->integer('user_id');
			$table->integer('quantity');
			$table->double('amount');
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
