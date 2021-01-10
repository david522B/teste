<?php

namespace Database\Factories;

use App\Models\ProductImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            for($i = 1; $i <= 4; $i+)
            'product_id' => $this->faker->numberBetween(1,4),
            'path' => $faker->imageUrl($width = 200, $height = 200),
        ];
    }
}
