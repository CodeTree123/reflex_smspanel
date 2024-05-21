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
        Schema::create('forum_events', function (Blueprint $table) {
            $table->id();
            $table->string('u_id')->nullable();
            $table->string('eventTitle')->nullable();
            $table->string('location')->nullable();
            $table->date('eventDate')->nullable();
            $table->time('eventTime')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('forum_events');
    }
};
