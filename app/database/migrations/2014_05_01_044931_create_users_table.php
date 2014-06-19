<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
	        $table->increments('id');
	        $table->string('username')->unique();
			$table->string('email');
			$table->integer('school_id');
			$table->integer('fb_id');
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('phone');
	        $table->string('password');
	        $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			Schema::drop('users');
		});
	}

}
