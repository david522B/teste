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
        $categories=['Tecnologia', 'Imoveis', 'Veiculos', 'Hobbies'];
        foreach($categories as $category) {
            DB::table('categories')->insert([ 
                'category' => $category,
                
                "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                "updated_at" => \Carbon\Carbon::now(), 
            ]);
        }
    }
}
