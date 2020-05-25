<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->engine = 'MyISAM'; // means you can't use foreign key constraints , since we will be searching with title consist of specific string
            $table->string('title');
            $table->text('body');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();


            //$table->foreign('user_id')->references('id')->on('user')->ondelete('cascade');


        });

        //adding fulltext to title attribute will enhance and increase the performance of searching post with title.
        //DB::statement('ALTER TABLE posts ADD FULLTEXT search(title)');
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
