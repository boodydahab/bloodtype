<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name');
			$table->string('patient_phone');
			$table->string('patient_age');
			$table->integer('city_id')->unsigned();
			$table->string('hospitsl_name');
			$table->string('hospital_address');
			$table->string('bags_num');
			$table->text('details');
			$table->integer('blood_type_id');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}
