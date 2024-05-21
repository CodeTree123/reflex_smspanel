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
        Schema::create('treatment_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('t_id')->nullable();
            $table->unsignedBigInteger('d_id')->nullable();
            $table->unsignedBigInteger('p_id')->nullable();
            $table->string('paid_amount')->nullable();
            $table->date('date')->nullable();

            $table->foreign('t_id')->references('id')->on('treatment_infos')->onDelete('cascade');
            $table->foreign('d_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('p_id')->references('id')->on('patient_infos')->onDelete('cascade');
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
        Schema::dropIfExists('treatment_payments');
    }
};
