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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('d_id')->nullable();
            $table->string('s_mobile')->nullable();
            $table->string('package_name')->nullable();
            $table->string('package_price')->nullable();
            $table->string('duration')->nullable();
            $table->string('duration_types')->nullable();
            $table->string('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('request')->default(0);
            $table->boolean('pending_status')->default(0);

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
        Schema::dropIfExists('subscriptions');
    }
};
