<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('writer_id');
            $table->string('writer_fullname');
            $table->string('url');
            $table->string('title');
            $table->longText('description');
            $table->string('category');
            $table->string('img_url');
            $table->integer('views')->default(0);
            $table->integer('is_active')->default(1);
            $table->integer('public');
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
        Schema::dropIfExists('blogs');
    }
}
