<?php

use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plans', function($table)
		{
			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('breakfast')->nullable();
			$table->string('lunch')->nullable();
			$table->string('dinner')->nullable();
			$table->float('calories')->nullable();
			$table->float('protein')->nullable();
			$table->float('carbohydrates')->nullable();
			$table->float('fat')->nullable();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plans');
	}

}