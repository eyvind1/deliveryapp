<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string ('slug',50)->unique();
            $table->string('title',67);
            $table->string('description',155);
            $table->string('nombre',50)->unique();
            $table->text('descripcion');
            $table->decimal('precio',7,2);
            $table->string('unidad',15);
            $table->integer('stock');
            $table->string('urlfoto',100)->default('foto.jpg');
            $table->integer('visitas')->default(0);
            $table->integer('orden')->default(0);
            $table->boolean('estado')->default(0);

            $table->integer('subcategorias_id')->unsigned();
            $table->foreign('subcategorias_id')->references('id')->on('subcategorias');

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
        Schema::dropIfExists('productos');
    }
}
