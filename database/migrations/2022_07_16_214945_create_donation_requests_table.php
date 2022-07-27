<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('patient_name');
			$table->string('patient_phone');
			$table->string('patient_age');
			$table->unsignedBigInteger('city_id');
			$table->string('hospitsl_name');
			$table->string('hospital_address');
			$table->string('bags_num');
			$table->text('details');
			$table->unsignedBigInteger('blood_type_id');
			$table->decimal('latitude', 10,10);
			$table->decimal('longitude', 10,10);
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}
