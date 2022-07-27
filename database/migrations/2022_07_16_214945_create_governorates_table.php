<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernoratesTable extends Migration {

	public function up()
	{
		Schema::create('governorates', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('governorates');
	}
}
