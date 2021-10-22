<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulinaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culinary', function (Blueprint $table) {
            $table->increments('idculinary');
            $table->integer('idkota')->unsigned()->index();
            $table->string("namaCulinary",100);
            $table->string("shortDescriptionCulinary",400);
            $table->string("descriptionCulinary",1024);
            $table->string("imageSmallCulinary",1024);
            $table->string("imageBigCulinary",1024);
            $table->string("videoCulinary",1024);
            $table->timestamps();

            $table->foreign('idkota')->references('idkotas')->on('kotas')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('culinary');
    }
}
