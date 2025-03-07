<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $products=['Computador', 'Casa', 'Celta', 'Violao'];
        $i = 1;
        foreach($products as $product) {
            DB::table('products')->insert([ 
                'category_id' => $i,
                'name' => $product,
                'description' => $faker->text,
                'price' => $faker->numberBetween(1500,6000),
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(), 
            ]);
            $i++;
        }
    }
}
