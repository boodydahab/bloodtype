<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->string('phone');
			$table->increments('id');
			$table->timestamps();
			$table->string('email');
			$table->integer('password');
			$table->string('name');
			$table->integer('blood_type_id', array('O-','O+','A-','A+','B-','B+','AB-','AB+'))->unsigned();
			$table->date('last_donation_date');
			$table->integer('city_id')->unsigned();
			$table->string('pin_code');
			$table->date('date_of_birth');
			$table->integer('client_id')->unsigned();
            $table->string('api_token',60)->unique()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
