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
        Schema::create('treatment_costs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('d_id')->nullable();
            $table->unsignedBigInteger('t_plan_id')->nullable();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->boolean('status')->default(1);

            $table->foreign('d_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('t_plan_id')->references('id')->on('treatment_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatment_costs');
    }
};
