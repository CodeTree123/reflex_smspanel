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
        Schema::create('chember_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('chem_id')->nullable();
            $table->string('week_name')->nullable();
            $table->string('day_time')->nullable();
            $table->string('evening_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chember_schedules');
    }
};
