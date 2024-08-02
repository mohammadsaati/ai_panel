<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Banner;
use App\Models\Category;
use App\Models\ContentType;
use App\Models\Post;
use Database\Factories\NullCategoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class
        ]);

     /*   Category::factory(20)->create();
        ContentType::factory(20)->create();
        Post::factory(50)->create();
        Banner::factory(20)->create();*/

    }
}
