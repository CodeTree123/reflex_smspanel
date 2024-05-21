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
        Schema::create('s_sub_subcat3s', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('cat_id');
            // $table->unsignedBigInteger('sub_cat_id');
            // $table->unsignedBigInteger('sub_subcat1_id');
            $table->unsignedBigInteger('sub_subcat2_id');
            $table->string('name')->nullable();
            $table->boolean('status')->default(1);
            // $table->foreign('cat_id')->references('id')->on('s_categories')->onDelete('cascade');
            // $table->foreign('sub_cat_id')->references('id')->on('s_sub_categories')->onDelete('cascade');
            // $table->foreign('sub_subcat1_id')->references('id')->on('s_sub_subcat1s')->onDelete('cascade');
            $table->foreign('sub_subcat2_id')->references('id')->on('s_sub_subcat2s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('s_sub_subcat3s', function (Blueprint $table) {
            $table->dropForeign('s_sub_subcat3s_sub_subcat2_id_foreign');
        });
        // Schema::table('s_sub_subcat3s', function (Blueprint $table) {
        //     $table->dropForeign('[s_sub_subcat3s_cat_id_foreign,s_sub_subcat3s_sub_cat_id_foreign,s_sub_subcat3s_sub_subcat1_id_foreign,s_sub_subcat3s_sub_subcat2_id_foreign]');
        // });
        Schema::dropIfExists('s_sub_subcat3s');
    }
};
