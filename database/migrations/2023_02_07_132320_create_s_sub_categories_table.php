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
        Schema::create('s_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->string('name')->nullable();
            $table->boolean('status')->default(1);
            $table->foreign('cat_id')->references('id')->on('s_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('s_sub_categories', function (Blueprint $table) {
            $table->dropForeign('s_sub_categories_cat_id_foreign');
        });
        Schema::dropIfExists('s_sub_categories');
    }
};
