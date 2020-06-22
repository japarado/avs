<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollingStationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polling_station', function (Blueprint $table) {
            $table->id();
			$table->string('name')->nullable()->default('RM. XXXA');
			$table->string('auth_key');
			$table->text('instructions')->nullable();
			$table->unsignedBigInteger('user_id');
            $table->timestamps();

			$table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polling_station');
    }
}
