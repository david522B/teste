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
        $products=['Computador', 'Casa', 'Celta', 'Violao'];
        $i = 1;
        foreach($products as $product) {
            DB::table('products')->insert([ 
                'category_id' => $i,
                'name' => $product,
                'description' => $this->faker->text,]
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(), 
            ]);
            $i++;
        }
    }
}
