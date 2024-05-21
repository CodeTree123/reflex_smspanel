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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('u_id');
            $table->string('BMDC')->unique()->nullable();
            $table->string('nid')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('bDegree')->nullable();
            $table->string('mCollege')->nullable();
            $table->string('batch')->nullable();
            $table->string('session')->nullable();
            $table->string('passing_year')->nullable();
            $table->text('professional_degree')->nullable();
            $table->text('speciality')->nullable();
            $table->text('designation')->nullable();
            $table->text('bmdc_image')->nullable();
            $table->text('postG_image')->nullable();
            $table->text('bar_image')->nullable();
            $table->boolean('bar_img_status')->default(0);
            $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropForeign('doctors_u_id_foreign');
        });
        Schema::dropIfExists('doctors');
    }
};
