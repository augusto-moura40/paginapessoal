<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncaoSintatica extends Model
{
	protected $table = 'funcao_sintatica';
	protected $fillable = ['definicao'];
	public $timestamps = false;
	
	public function synsets(){
		return $this->hasMany('App\Synset');
	}

	public function getPalavrasAttribute(){
		return $this->synsets->reduce(function($palavras, $synset){
			return $palavras->concat($synset->palavras);
		}, collect([]))
		->unique('id')
		->values()
		->all();
	}
}
