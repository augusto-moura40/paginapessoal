<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palavra extends Model
{
	protected $fillable = ['texto'];
	
	public function synsets(){
		return $this->belongsToMany('App\Synset');
	}

	public function getFuncoesSintaticasAttribute(){
		return $this->synsets->reduce(function($funcoesSintaticas, $synset){
			return $funcoesSintaticas->push($synset->funcaoSintatica);
		}, collect([]))
		->unique('id')
		->values()
		->all();
	}
}
