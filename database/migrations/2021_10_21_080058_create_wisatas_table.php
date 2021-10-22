<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->increments('idwisatas');
            $table->integer('idkota')->unsigned()->index();
            $table->string("namaWisata",100);
            $table->string("shortDescriptionWisata",400);
            $table->string("descriptionWisata",1024);
            $table->string("imageSmallWisata",1024);
            $table->string("imageBigWisata",1024);
            $table->string("videoWisata",1024);
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
        Schema::dropIfExists('wisatas');
    }
}
