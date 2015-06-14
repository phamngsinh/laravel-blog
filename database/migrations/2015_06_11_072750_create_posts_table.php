<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts',function(Blueprint $table){
        $table->increments('ids');
        $table->string('slug')->uique();
        $table->string('title');
        $table->text('content');
        $table->timestamps();
        $table->timestamps('published_at')->index();

      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
