<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		
		Schema::create('shipping', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name',60);
			$table->string('email' , 60);
			$table->text('address');
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent();
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
