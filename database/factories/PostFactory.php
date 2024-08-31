<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\ContentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'             =>  $this->faker->title ,
            'slug'              =>  $this->faker->slug ,
            'admin_id'          =>  1 ,
            'category_id'       =>  $this->faker->randomElement( Category::all()->pluck('id')->toArray() ) ,
            'content_type_id'   =>  $this->faker->randomElement( ContentType::all()->pluck('id')->toArray() ) ,
            'image'             =>  rand(1,3).'jpg' ,
            'status'            =>  $this->faker->randomElement([1,0]) ,
            'description'       =>  $this->faker->text,
            'excerpt'           =>  $this->faker->sentence(5),
            'read_time'         =>  '5 min',
        ];
    }
}
