<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPostTable extends Migration {

	public function up()
	{
		Schema::create('client_post', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->unsignedBigInteger('client_id');
			$table->unsignedBigInteger('post_id');
		});
	}

	public function down()
	{
		Schema::drop('client_post');
	}
}
