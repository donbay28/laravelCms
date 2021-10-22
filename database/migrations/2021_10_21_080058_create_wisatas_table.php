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
            $table->timestamps();

            $table->foreign('idkota')->references('idkotas')->on('kotas')->onDelete('cascade');  
        });
        DB::statement("ALTER TABLE wisatas ADD imageSmall LONGBLOB");
        DB::statement("ALTER TABLE wisatas ADD imageBig LONGBLOB");
        DB::statement("ALTER TABLE wisatas ADD video LONGBLOB");
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
