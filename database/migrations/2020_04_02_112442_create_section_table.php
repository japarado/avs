<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('level');
			$table->unsignedBigInteger('strand_id');
            $table->unsignedInteger('number');
            $table->timestamps();

			$table->unique(['level', 'strand_id', 'number']);
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
        Schema::dropIfExists('section');
    }
}
