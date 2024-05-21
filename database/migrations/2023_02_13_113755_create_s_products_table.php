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
        Schema::create('s_products', function (Blueprint $table) {
            $table->id();
            $table->string('cat_id')->nullable();
            $table->string('subcat_id')->nullable();
            $table->string('subsubcat_id')->nullable();
            $table->string('subsubcat1_id')->nullable();
            $table->string('subsubcat2_id')->nullable();

            $table->unsignedBigInteger('supplier_id');

            $table->string('pro_name')->nullable();
            $table->string('pro_price')->nullable();
            $table->string('pro_img')->nullable();
            $table->text('pro_description')->nullable();
            $table->boolean('status')->default(1);
            $table->foreign('supplier_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('s_products', function (Blueprint $table) {
            $table->dropForeign('s_products_supplier_id_foreign');
        });
        Schema::dropIfExists('s_products');
    }
};
