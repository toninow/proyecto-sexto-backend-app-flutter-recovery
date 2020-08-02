<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {	
		Schema::dropIfExists('addresses');
	
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('city');
			$table->string('district');
			$table->string('street');
			$table->string('apartment');
			$table->string('apartmentNo');
			$table->string('doorNo');
			$table->integer('userId');
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
        Schema::dropIfExists('addresses');
    }
}
