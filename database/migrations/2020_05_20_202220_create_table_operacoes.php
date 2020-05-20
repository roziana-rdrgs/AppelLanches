<?php

use Illuminate\Database\Eloquent\SoftDeletes;
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
        /**pessoaId, valor, flagtipo, data_operacao, histórico */
        Schema::create('operacoes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pessoa_id', false, false)->nullable();
            $table->double('valor', 15, 2, true)->nullable()->default(123.4567);
            $table->date('data_operacao')->default(new DateTime());
            $table->string('historico', 100);
            $table->tinyInteger('flag_tipo');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('pessoa_id')->references('id')->on('users')->onDelete('restrict');
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
