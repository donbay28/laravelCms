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
            $table->string("shortDescription",400);
            $table->string("description",1024);
            $table->binary("imageSmall");
            $table->binary("iamgeBig");
            $table->binary("video");
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
        Schema::dropIfExists('wisatas');
    }
}
