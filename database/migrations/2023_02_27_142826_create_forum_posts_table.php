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
        Schema::create('forum_posts', function (Blueprint $table) {
            $table->id();
            $table->string('u_doc_id')->nullable();
            $table->integer('post_type')->nullable();
            $table->string('post_title')->nullable();
            $table->text('post_main')->nullable();
            $table->text('description')->nullable();
            $table->integer('view_count')->default(0)->nullable();
            $table->integer('likes_count')->default(0)->nullable();
            $table->integer('comments_count')->default(0)->nullable();
            $table->string('post_img')->nullable();
            $table->boolean('showStatus')->default(1);
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
        Schema::dropIfExists('forum_posts');
    }
};
