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
            $table->text('body');
            
            // $table->integer('user_id')->unsigned()->index();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // the foreign id will reference the user_id in users table using the id column, constrained will use conventions to determine the table and column name being referenced, onDelete with cascade will delete everything in the database level with that user id

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
        Schema::dropIfExists('posts');
    }
}
