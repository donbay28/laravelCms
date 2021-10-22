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
            $table->timestamps();

            $table->foreign('idkota')->references('idkotas')->on('kotas')->onDelete('cascade');  
        });
        DB::statement("ALTER TABLE culinaries ADD imageSmall LONGBLOB");
        DB::statement("ALTER TABLE culinaries ADD imageBig LONGBLOB");
        DB::statement("ALTER TABLE culinaries ADD video LONGBLOB");
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
