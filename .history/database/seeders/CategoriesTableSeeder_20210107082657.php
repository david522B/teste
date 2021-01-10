<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Tecnologia', 'Imoveis', 'Veiculos', 'Hobb']
        DB::table('categories')->insert([ 
            
        ]);
    }
}
