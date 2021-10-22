<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crafts', function (Blueprint $table) {
            $table->increments('idcrafts');
            $table->integer('idkota')->unsigned()->index();
            $table->string("namaCraft",100);
            $table->string("shortDescriptionCraft",400);
            $table->string("descriptionCraft",1024);
            $table->string("imageSmallCraft",1024);
            $table->string("imageBigCraft",1024);
            $table->string("videoCraft",1024);
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
        Schema::dropIfExists('crafts');
    }
}
