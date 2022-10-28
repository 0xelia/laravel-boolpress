<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['football', 'soccer', 'computers', 'crypto', 'blockchain', 'fashion week', 'oscars', 'golden globe'];

        foreach($tags as $t){
            $newTag = new Tag;
            $newTag->name = $t;
            $newTag->slug = Str::slug($t);

            $newTag->save();
        }
    }
}
