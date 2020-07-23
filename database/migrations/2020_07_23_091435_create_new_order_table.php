<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewOrderTable extends Migration
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
			$table->integer('user_id');
			$table->double('total_amount');
			$table->string('payment_type');
			$table->string('order_id');
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
        Schema::dropIfExists('new_order');
    }
}
