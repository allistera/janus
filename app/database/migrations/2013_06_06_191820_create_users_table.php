<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('display_name', 50);
			$table->string('email', 254);
			$table->text('password');
			$table->float('calories')->nullable();
			$table->float('protein')->nullable();
			$table->float('carbohydrates')->nullable();
			$table->float('fat')->nullable();
			$table->integer('status');
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
		Schema::drop('users');
	}

}