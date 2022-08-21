<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('title', 255);
            $table->string('image', 255)->nullable();
            $table->enum('type', ['PRIVATE', 'PUBLIC'])->default('PUBLIC');
            $table->enum('status', ['PUBLISHED', 'TO_MODERATE', 'DRAFT', 'TRASH'])->default('DRAFT');
            $table->text('body');
            $table->integer('block')->default(0);
            $table->timestamps();
            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
