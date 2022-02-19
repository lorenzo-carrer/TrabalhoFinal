<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('sobrenome')->nullable();
            $table->string('usuario');
            $table->string('email')->unique();
            $table->string('senha');
            $table->integer('celular')->nullable()->unique();
            $table->string('endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->integer('cep')->nullable();
            $table->string('estado')->nullable();
            $table->text('descEmp')->nullable();
            $table->text('detalhes')->nullable();
            $table->text('imagem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
