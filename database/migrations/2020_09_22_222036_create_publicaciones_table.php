<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string ('slug',50)->unique();
            $table->string('title',67);
            $table->string('description',155);
            $table->string('nombre',50);
            $table->text('descripcion');
            $table->string('urlfoto',100)->default('foto.jpg');
            $table->integer('visitas')->default(0);
            $table->integer('orden')->default(0);
            
            $table->integer('categorias_id')->unsigned();
            $table->foreign('categorias_id')->references('id')->on('categorias');

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
        Schema::dropIfExists('publicaciones');
    }
}
