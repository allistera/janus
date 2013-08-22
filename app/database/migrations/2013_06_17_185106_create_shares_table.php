<?php

use Illuminate\Database\Migrations\Migration;

class CreateSharesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shares', function($table)
		{
			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('plan_id')->unsigned();
			$table->string('hash');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('plan_id')->references('id')->on('plans');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shares');
	}

}