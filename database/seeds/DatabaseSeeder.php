<?php

use Illuminate\Database\Seeder;
use Database\Seeds\FuncaoSintaticaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FuncaoSintaticaSeeder::class);
    }
}
