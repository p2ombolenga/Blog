<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\Comment;
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
        // Post::factory()->create();
        Comment::factory(5)->create();



    //     $personal = Category::create([
    //         'name'=>'Personal',
    //         'slug'=>'personal'
    //     ]);
    //    $family = Category::create([
    //         'name'=>'Family',
    //         'slug'=>'family'
    //     ]);
    //     $work = Category::create([
    //         'name'=>'Work',
    //         'slug'=>'work'
    //     ]);
    //     Post::create([
    //         'user_id' => $user->id,
    //         'category_id' => $personal->id,
    //         'slug' => 'personal-post',
    //         'title' => 'Personal Post Title',
    //         'excerpt' => 'personal excerpt',
    //         'body' => 'ipsum dolor sit amet consectetur adipisicing elit',
    //         'published_at' => now()
    //     ]);
    //     Post::create([
    //         'user_id' => $user->id,
    //         'category_id' => $family->id,
    //         'slug' => 'family-post',
    //         'title' => 'Family Post Title',
    //         'excerpt' => 'Family excerpt',
    //         'body' => 'ipsum dolor sit amet consectetur adipisicing elit',
    //         'published_at' => now()
    //     ]);
    //     Post::create([
    //         'user_id' => $user->id,
    //         'category_id' => $work->id,
    //         'slug' => 'work-post',
    //         'title' => 'Work Post Title',
    //         'excerpt' => 'Work excerpt',
    //         'body' => 'ipsum dolor sit amet consectetur adipisicing elit',
    //         'published_at' => now()
    //     ]);
    }
}