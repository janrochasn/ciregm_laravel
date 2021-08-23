<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciregm_atividades', function (Blueprint $table) {
            $table->unsignedBigInteger('id_atividade')->autoIncrement()->primary();
            $table->unsignedBigInteger('usuario_id');
            $table->string('tipo_carimbo', 120);
            $table->string('data_hora', 20);
            $table->string('nm_ocorrencia', 45);
            $table->text('carimbo');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciregm_atividades');
    }
}
