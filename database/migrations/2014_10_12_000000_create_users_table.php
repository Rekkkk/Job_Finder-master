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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('profile')->nullable();
            $table->string('lname');
            $table->string('fname');
            $table->string('mname');
            $table->string('sname')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('barangay')->nullable();
            //0-applicant 1-employer 2-superadmin
            $table->integer('user_role');
            $table->integer('num_reports')->default(0);
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
        Schema::dropIfExists('users');
    }
};
