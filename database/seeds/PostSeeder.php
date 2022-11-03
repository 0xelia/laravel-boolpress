<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::all()->pluck('id');

        $categories = Category::all();
        $categories_id = $categories->pluck('id');

        $tags = Tag::all();

        for($i = 0; $i < 40; $i++){

            $p = new Post;
            $p->title = $faker->words(rand(5, 10), true);
            $p->content = $faker->text($minNbChars = 750, $maxNbChars = 1000);
            $p->slug = str_replace( ' ', '-', $p->title );
            $p->category_id = $faker->optional()->randomElement($categories_id);
            $p->user_id = $faker->randomElement($user_ids);

            $p->save();

            $random_tags = $tags->shuffle()->take(3);
                
            $p->tags()->sync($random_tags);
        }
    }
}
    