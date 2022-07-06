<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToLojaProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loja_produtos', function (Blueprint $table) {
            $table->foreign(['loja_id'], 'fk_loja_produtos__loja_id')->references(['id'])->on('lojas')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loja_produtos', function (Blueprint $table) {
            $table->dropForeign('fk_loja_produtos__loja_id');
        });
    }
}
