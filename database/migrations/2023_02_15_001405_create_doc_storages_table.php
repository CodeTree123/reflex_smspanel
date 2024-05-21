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
        Schema::create('doc_storages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('d_id');
            $table->string('product_name')->nullable();
            $table->string('product_stock')->nullable();
            $table->string('product_stock_alert')->nullable();
            $table->string('product_description')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('stock_status')->default(1);
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
        Schema::table('doc_storages', function (Blueprint $table) {
            $table->dropForeign('doc_storages_d_id_foreign');
        });
        Schema::dropIfExists('doc_storages');
    }
};
