<?php

use Illuminate\Database\Migrations\Migration;

class Initialschema extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create("blogs", function($table) {
            $table->increments('id');
            $table->unsignedInteger("user_id");
            $table->string("title");
            $table->mediumText('description');
            $table->foreign("user_id")->references('id')->on('users')->onDelete("cascade");
        });

        Schema::create("posts", function($table) {
            $table->increments("id");
            $table->unsignedInteger("blog_id");
            $table->string("title");
            $table->text('story');
            $table->foreign("blog_id")->references('id')->on('blogs')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("posts", function($table){
            $table->dropForeign("blog_id");
        });
        Schema::table("blogs", function($table){
            $table->dropForeign("user_id");
        });
        Schema::drop("posts");
        Schema::drop("blogs");
        Schema::drop('users');
    }

}