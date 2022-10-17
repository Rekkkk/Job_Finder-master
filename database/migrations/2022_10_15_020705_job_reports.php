<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_reports', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('job_id')->on('job')->on('job')->onDelete('cascade');
            $table->longText('comment')->nullable();
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
        //
    }
};
