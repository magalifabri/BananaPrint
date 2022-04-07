<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('printer_id');
            $table->integer('user_id');
            $table->boolean('color');
            $table->boolean('double_sided');
            $table->integer('num_pages');
            $table->string('file_ext');
            $table->string('pickup_timeframe_start1');
            $table->string('pickup_timeframe_start2');
            $table->string('pickup_timeframe_start3');
            $table->string('pickup_timeframe_end1');
            $table->string('pickup_timeframe_end2');
            $table->string('pickup_timeframe_end3');
            $table->string('pickup_timeframe_date1');
            $table->string('pickup_timeframe_date2');
            $table->string('pickup_timeframe_date3');
            $table->string('exchange_offer');
            $table->string('message')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
