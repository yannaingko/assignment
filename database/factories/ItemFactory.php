<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucwords($this->faker->text(10)),
            'category_id' => rand(1,10),
            'price' => rand(50,100),
            'description' => $this->faker->sentence,
            'condition_id' => rand(1,2),
            'type_id' => rand(1,3),
            'image' => 'product-'.rand(1,7).'.jpg',
            'owner_name' => ucwords($this->faker->sentence),
            'phone' => 770000000,
            'status' => rand(0,1),
            'address' => 'Yangon',
            'lat' => '16.7872',
            'lon' => '96.1633'
        ];
    }
}
