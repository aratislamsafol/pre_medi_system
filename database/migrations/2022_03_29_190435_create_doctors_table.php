<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name')->nullable();
            $table->string('user_name')->unique();
            $table->integer('age');
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('ip_address');
            $table->unsignedInteger('status')->default(1)->comment('1->active,0->inactive,3->banned');
            $table->string('street_address');
            $table->unsignedInteger('division_id');
            $table->unsignedInteger('district_id');
            $table->string('blood_group');
            $table->string('doc_image');
            $table->string('specialist');
            $table->string('experience');
            $table->string('Degree');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('doctors');
    }
}
