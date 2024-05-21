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
        Schema::create('s_product_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pro_id');
            $table->string('stock')->nullable();
            $table->string('stock_alert')->nullable();
            $table->boolean('status')->default(1);
            $table->foreign('pro_id')->references('id')->on('s_products')->onDelete('cascade');
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
        Schema::table('s_product_stocks', function (Blueprint $table) {
            $table->dropForeign('s_product_stocks_pro_id_foreign');
        });
        Schema::dropIfExists('s_product_stocks');
    }
};
