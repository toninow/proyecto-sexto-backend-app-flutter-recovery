<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductsList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		
		Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name');
			$table->integer('price');
			$table->string('photo');
			$table->integer('discount');
			$table->boolean('is_hot_product');
			$table->boolean('is_new_arrival');
			$table->integer('category_id');
			$table->integer('user_id');
			$table->text('detail');
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
