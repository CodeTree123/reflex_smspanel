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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('google_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('role')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('verification')->default(0);
            $table->text('p_image')->nullable();
            $table->boolean('setting_alert')->default(1);
            $table->text('p_google_img')->nullable();
            $table->rememberToken();
            $table->boolean('lastActiveStatus')->default(1);
            $table->timestamps('lastActive');
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
        Schema::dropIfExists('users');
    }
};
