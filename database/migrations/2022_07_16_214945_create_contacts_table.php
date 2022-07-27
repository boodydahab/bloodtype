<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->text('message');
			$table->unsignedBigInteger('client_id');
			$table->string('subject');
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}
