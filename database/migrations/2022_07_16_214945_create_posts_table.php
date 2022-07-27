<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('title');
			$table->string('image');
			$table->text('content');
			$table->unsignedBigInteger('category_id');
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}
