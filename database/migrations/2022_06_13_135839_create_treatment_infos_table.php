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
        Schema::create('treatment_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('d_id')->nullable();
            $table->unsignedBigInteger('p_id')->nullable();
            $table->string('tooth_type')->nullable();
            $table->string('tooth_no')->nullable();
            $table->string('tooth_side')->nullable();
            $table->string('chife_complaints')->nullable();
            $table->string('clinical_findings')->nullable();
            $table->string('investigation')->nullable();
            $table->string('treatment_plans')->nullable();
            $table->string('cost')->nullable();
            $table->string('paid')->nullable();
            $table->string('due')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('discount_id')->nullable();
            $table->boolean('payment_status')->default(0);
            $table->integer('status')->default(0);

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
        Schema::dropIfExists('treatment_infos');
    }
};
