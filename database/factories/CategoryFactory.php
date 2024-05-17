<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "name"          =>  $this->faker->title ,
            "slug"          =>  $this->faker->slug ,
            "parent_id"     =>  null ,
            'priority'      =>  rand(1,30) ,
            "image"         =>  $this->faker->biasedNumberBetween(1 , 4).".jpg" ,
            'status'        =>  1
        ];
    }
}
