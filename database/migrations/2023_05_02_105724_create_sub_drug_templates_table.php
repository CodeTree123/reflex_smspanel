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
        Schema::create('sub_drug_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tempDrug_id');
            $table->string('tempDrug_name')->nullable();
            $table->string('tempDrug_time')->nullable();
            $table->string('tempDrug_mealTime')->nullable();
            $table->string('tempDrug_duration')->nullable();
            $table->foreign('tempDrug_id')->references('id')->on('drug_templates')->onDelete('cascade');
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
        Schema::table('sub_drug_templates', function (Blueprint $table) {
            $table->dropForeign('sub_drug_templates_tempDrug_id_foreign');
        });
        Schema::dropIfExists('sub_drug_templates');
    }
};
