<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostArticleTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->string('title');
            $kolom->string('slug')->unique();
            $kolom->text('description');
            $kolom->text('content');
            $kolom->string('image');
            $kolom->timestamps();
        });

        Schema::create('category', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->string('nameCategory');
            $kolom->timestamps();
        });

        Schema::create('detail_category', function(Blueprint $kolom){
            $kolom->unsignedInteger('posts_id')->nullable();
            $kolom->unsignedInteger('category_id')->nullable();
            $kolom->timestamps();

            $kolom->foreign('posts_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $kolom->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('posts', function(Blueprint $kolom){
            $kolom->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('detail_category');
        Schema::drop('category');
        Schema::drop('posts');
    }
}
