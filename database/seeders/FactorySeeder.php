<?php

namespace Database\Seeders;

use App\Models\Loja;
use App\Models\LojaProduto;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Loja::factory()->count(1)->create();
        LojaProduto::factory()->count(5)->create();
    }
}
