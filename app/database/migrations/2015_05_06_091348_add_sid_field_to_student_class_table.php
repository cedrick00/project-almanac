<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSidFieldToStudentClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student_classes', function(Blueprint $table)
		{
			$table->tinyInteger('sid')->after('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('student_classes', function(Blueprint $table)
		{
			$table->dropColumn(array('sid'));
		});
	}

}
