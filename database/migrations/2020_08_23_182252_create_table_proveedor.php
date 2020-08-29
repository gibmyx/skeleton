<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique()->index();
            $table->string('nombre', 100);
            $table->string('tipo_documento', 20)->default('');
            $table->string('num_documento', 20)->default('');
            $table->string('direccion', 70)->default('');
            $table->string('telefono', 20)->default('');
            $table->string('email', 50)->default('');
            $table->string('contacto',50)->default('');
            $table->string('telefono_contacto',50)->default('');
            $table->string('estado')->default('activo');
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
        Schema::dropIfExists('proveedores');
    }
}
