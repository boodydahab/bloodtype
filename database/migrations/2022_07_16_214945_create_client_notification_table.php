<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientNotificationTable extends Migration {

	public function up()
	{
		Schema::create('client_notification', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->unsignedBigInteger('client_id');
			$table->unsignedBigInteger('notification_id');
			$table->boolean('is_read')->default(1,0);
		});
	}

	public function down()
	{
		Schema::drop('client_notification');
	}
}
