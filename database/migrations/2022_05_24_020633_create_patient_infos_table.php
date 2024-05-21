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
        Schema::create('patient_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('d_id')->nullable();
            $table->bigInteger('patient_id')->nullable();
            $table->boolean('new_status')->default(1);
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobile_type')->nullable();
            $table->string('gender')->nullable();
            $table->string('Blood_group')->nullable();
            $table->string('date')->nullable();
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->text('image')->nullable();
            $table->string('bp_high')->nullable();
            $table->string('bp_low')->nullable();
            $table->string('Bleeding_disorder')->nullable();
            $table->string('Heart_Disease')->nullable();
            $table->string('Allergy')->nullable();
            $table->string('Diabetic')->nullable();
            $table->string('Pregnant')->nullable();
            $table->string('Helpatics')->nullable();
            $table->text('other')->nullable();

            $table->foreign('d_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('patient_infos');
    }
};
