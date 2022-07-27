<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodTypeClientTable extends Migration {

	public function up()
	{
		Schema::create('blood_type_client', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->unsignedBigInteger('blood_type_id');
			$table->unsignedBigInteger('client_id');
		});
	}

	public function down()
	{
		Schema::drop('blood_type_client');
	}
}
