<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciregm_usuarios', function (Blueprint $table) {
            /*
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            */

            $table->unsignedBigInteger('id')->unique();
            $table->string('password', 200);
            $table->string('nivel', 255);
            $table->string('nome_usuario', 255);
            //$table->rememberToken();
            //$table->timestamps();
            //$table->softDeletes();

            $table->primary('id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciregm_usuarios');
    }
}
