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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('u_id');
//            $table->string('fname')->nullable();
//            $table->string('lname')->nullable();
            $table->string('other')->nullable();
            $table->string('Address')->nullable();
//            $table->string('email')->unique();
//            $table->string('password')->nullable();
//            $table->string('phone')->nullable();
//            $table->boolean('role')->default(2);
//            $table->text('shop_image')->nullable();
//            $table->boolean('status')->default(0);
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
            $table->dropForeign('shops_u_id_foreign');
        });
        Schema::dropIfExists('shops');
    }
};
