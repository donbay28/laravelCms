<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultures', function (Blueprint $table) {
            $table->increments('idcultures');
            $table->integer('idkota')->unsigned()->index();
            $table->string("namaCulture",100);
            $table->string("shortDescriptionCulture",400);
            $table->string("descriptionCulture",1024);
            $table->string("imageSmallCulture",1024);
            $table->string("imageBigCulture",1024);
            $table->string("videoCulture",1024);
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
        Schema::dropIfExists('cultures');
    }
}
