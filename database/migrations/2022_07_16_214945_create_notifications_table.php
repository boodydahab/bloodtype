<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->incriment('id');
			$table->timestamps();
			$table->string('title');
			$table->text('content');
			$table->unsignedBigInteger('donation_request_id');
		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}
