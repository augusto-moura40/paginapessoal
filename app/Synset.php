<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Synset extends Model
{
    protected $fillable = ['definicao', 'funcao_sintatica_id'];
	
	public function palavras(){
		return $this->belongsToMany('App\Palavra');
	}

	public function funcaoSintatica(){
		return $this->belongsTo('App\FuncaoSintatica');
	}
}
