<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* Criar tabelas básicas do Text Adventure*/
class CreateTextAdventureTables extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palavra', function (Blueprint $table) {
			$table->increments('id');
			$table->string('texto', 60);
			$table->timestamps();
		});

		Schema::create('funcao_sintatica', function (Blueprint $table) {			
			$table->increments('id');
			$table->string('definicao', 60);
		});

		Schema::create('synset', function (Blueprint $table) {
			$table->increments('id');
			$table->text('definicao');
			$table->unsignedInteger('funcao_sintatica_id');
			$table->timestamps();
			$table->foreign('funcao_sintatica_id')->references('id')->on('funcao_sintatica');
		});

		Schema::create('palavra_synset', function (Blueprint $table) {			
			$table->unsignedInteger('palavra_id');
			$table->unsignedInteger('synset_id');
			$table->foreign('palavra_id')->references('id')->on('palavra')->onDelete('cascade');
			$table->foreign('synset_id')->references('id')->on('synset')->onDelete('cascade');
		});		

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('palavra_synset', function(Blueprint $table){
			$table->dropForeign(['palavra_id', 'synset_id']);
		});
		Schema::table('synset', function(Blueprint $table){
			$table->dropForeign(['funcao_sintatica_id']);
		});
        Schema::dropIfExists('palavra');
        Schema::dropIfExists('palavra_synset');
        Schema::dropIfExists('synset');
        Schema::dropIfExists('funcao_sintatica');
    }
}
