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
            $table->string("shortDescription",400);
            $table->string("description",1024);
            $table->binary("imageSmall");
            $table->binary("iamgeBig");
            $table->binary("video");
            $table->timestamps();
        });
        Schema::table('culinaries', function($table) {
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
