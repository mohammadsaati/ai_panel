<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement([1,2,3]);
        $data = $this->dataWithType($type);

        return [
            'image'             =>  rand(1,3).'.jpg' ,
            'type'              =>  $type ,
            'post_id'           =>  $data['post_id'] ,
            'category_id'       =>  $data['category_id'] ,
            'link'              =>  $data['link'] ,
            'status'            =>  $this->faker->randomElement([0,1])
        ];
    }

    private function dataWithType(int $type) : array
    {
        if ($type == 1)
        {
            return [
                'post_id'           => $this->faker->randomElement( Post::all()->pluck('id')->toArray() ) ,
                'category_id'       =>  null ,
                'link'              =>  null
            ];
        } else if ($type == 2) {
            return [
                'post_id'           =>  null ,
                'category_id'       =>  $this->faker->randomElement( Category::all()->pluck('id')->toArray() ) ,
                'link'              =>  null
            ];
        } else {
            return [
                'post_id'           =>  null ,
                'category_id'       =>  null ,
                'link'              =>  'http://www.aipcdata.com'
            ];
        }
    }

}
