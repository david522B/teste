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
        $products=['Computador', 'Casa', 'Celta', 'Violao'];
        $i = 1;
        foreach($products as $product) {
            DB::table('products')->insert([ 
                'category_id' => $i,
                'name' => $product,
                'description' => $this->faker->text,
                'price' => $this->faker->numberBetween($min = 1500, $max = 6000),
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(), 
            ]);
            $i++;
        }
    }
}
