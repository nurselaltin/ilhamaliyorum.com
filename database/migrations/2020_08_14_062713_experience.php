<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Experience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('writer_id');
            $table->string('fullname');
            $table->string('company_name');
            $table->string('company_sector');
            $table->string('job_title');
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('continues');
            $table->integer('isActive')->default(1);
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
        Schema::table('experinces', function (Blueprint $table) {
            //
        });
    }
}
