<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulinariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culinaries', function (Blueprint $table) {
            $table->increments('idculinaries');
            $table->integer('idkota')->unsigned()->index();
            $table->string("namaCulinary",100);
            $table->string("shortDescriptionCulinaries",400);
            $table->string("descriptionCulinaries",1024);
            $table->string("imageSmallCulinaries",1024);
            $table->string("imageBigCulinaries",1024);
            $table->string("videoCulinaries",1024);
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
        Schema::dropIfExists('culinaries');
    }
}
