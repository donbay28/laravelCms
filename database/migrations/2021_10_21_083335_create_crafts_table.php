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
            $table->string("shortDescription",400);
            $table->string("description",1024);
            $table->timestamps();

            $table->foreign('idkota')->references('idkotas')->on('kotas')->onDelete('cascade');  
        });
        DB::statement("ALTER TABLE crafts ADD imageSmall LONGBLOB");
        DB::statement("ALTER TABLE crafts ADD imageBig LONGBLOB");
        DB::statement("ALTER TABLE crafts ADD video LONGBLOB");
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
