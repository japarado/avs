<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('candidate', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->text('desc')->nullable();
			$table->string('image')->nullable();
			$table->integer('type')->default(config('constants.candidatetypes.regular'));
			$table->unsignedBigInteger('position_id');
			$table->unsignedBigInteger('strand_id');
			$table->timestamps();
			$table->softDeletes();


			$table->foreign('position_id')->references('id')->on('position');
			$table->foreign('strand_id')->references('id')->on('strand');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('candidate');
	}
}
