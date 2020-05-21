<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOperacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operacoes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pessoa_id', false, true)->nullable();
            $table->double('valor', 15, 2, true);
            $table->date('data_operacao');
            $table->string('historico', 100);
            $table->tinyInteger('flag_tipo');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operacoes');
    }
}
