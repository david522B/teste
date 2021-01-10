<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=['Tecnologia', 'Imoveis', 'Veiculos', 'Hobbies'];
        foreach($products as $pr) {
            DB::table('categories')->insert([ 
                'category' => $category,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(), 
            ]);
        }
    }
}
