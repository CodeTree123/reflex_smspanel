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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('package_name')->nullable();
            $table->string('basic_price')->nullable();
            $table->string('package_price')->nullable();
            $table->string('duration')->nullable();
            $table->string('duration_types')->nullable();
            $table->string('descount')->nullable();
            $table->string('saved_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_plans');
    }
};
