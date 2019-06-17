<?php

use Illuminate\Database\Seeder;
use App\FuncaoSintatica;

class FuncaoSintaticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuncaoSintatica::firstOrCreate(['definicao' => 'verbo']);
        FuncaoSintatica::firstOrCreate(['definicao' => 'objeto_direto']);
        FuncaoSintatica::firstOrCreate(['definicao' => 'objeto_indireto']);
        FuncaoSintatica::firstOrCreate(['definicao' => 'adverbio']);
    }
}
