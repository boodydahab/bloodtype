<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->id();
			$table->string('phone');
			$table->string('email');
			$table->string('password');
			$table->string('name');
			$table->unsignedBigInteger('blood_type_id');
			$table->date('last_donation_date');
			$table->unsignedBigInteger('city_id');
			$table->string('pin_code');
			$table->date('date_of_birth');
            $table->string('api_token',60)->unique()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
