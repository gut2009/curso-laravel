<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venda;

class VendasSeeder extends Seeder
{
    public function run(): void
    {
        Venda::create(
            [
                'numero_da_venda' => 01,
                'cliente_id' => '1',
                'produto_id' => '10'
            ],
            
        );
        Venda::create(
            [
                'numero_da_venda' => 02,
                'cliente_id' => '2',
                'produto_id' => '13'
            ],
            
        );
        Venda::create(
            [
                'numero_da_venda' => 03,
                'cliente_id' => '4',
                'produto_id' => '20'
            ],
            
        );
        Venda::create(
            [
                'numero_da_venda' => 04,
                'cliente_id' => '5',
                'produto_id' => '22'
            ],
            
        );
    }
}