<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->nullable();
            $table->string('title');
            $table->mediumText('description');
            $table->boolean('is_ready')->default(0);   
            $table->boolean('is_processing')->default(0);   
            $table->integer('is_published')->default(0);
            $table->integer('time_taken')->default(0);
            $table->timestamps();
        });

        #Schema::table('videos', function($table) {
        #    $table->foreign('user_id')->references('id')->on('users');
        #});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
