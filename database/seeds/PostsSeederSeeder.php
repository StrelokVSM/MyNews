<?php

use Illuminate\Database\Seeder;
use App\Posts;

class PostsSeederSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=1;
        while ($i<26){ Posts::insert([
                'user_id' => 2,
                'title' => Str::random(30),
                'body' => Str::random(800),
                'slug' => Str::random(5),
                'active' => 1,
            ]);
        $i++;
        }
    }
}
