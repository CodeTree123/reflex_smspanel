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
        Schema::create('suborders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('product_id');
            $table->string('supplier_id');
            $table->string('quantity');
            $table->string('per_price');
            $table->string('subtotal_price');
            $table->boolean('status')->default(0);
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::table('suborders', function (Blueprint $table) {
            $table->dropForeign('suborders_order_id_foreign');
        });
        Schema::dropIfExists('suborders');
    }
};
