<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncaoSintatica extends Model
{
	protected $fillable = ['definicao'];
	
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
