<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique()->index();

            $table->String('nombre', 50);
            $table->decimal('precio_venta', 15, 5)->default(0);
            $table->String('descripcion', 256)->default('');
            $table->String('codigo', 50);
            $table->integer('stock')->default('0');
            $table->integer('categoria_id')->unsigned();
            $table->String('estado', 50)->default('activo');

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
        Schema::dropIfExists('articulos');
    }
}
