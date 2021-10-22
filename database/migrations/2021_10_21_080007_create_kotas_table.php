<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kotas', function (Blueprint $table) {
            $table->increments('idkotas');
            $table->string("namaKota",100);
            $table->string("shortDescription",400);
            $table->string("description",1024);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE kotas ADD imageSmall LONGBLOB");
        DB::statement("ALTER TABLE kotas ADD imageBig LONGBLOB");
        DB::statement("ALTER TABLE kotas ADD video LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kotas');
    }
}
