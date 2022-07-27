<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->text('about');
			$table->string('phone');
			$table->string('email');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('instagram');
			$table->string('youtube');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
