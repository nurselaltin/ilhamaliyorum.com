<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Education extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('writer_id');
            $table->string('writer_fullname');
            $table->string('education_type');
            $table->string('school_name');
            $table->string('department');
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('continues');
            $table->integer('isActive')->default(1);
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
        Schema::dropIfExists('educations');
    }
}