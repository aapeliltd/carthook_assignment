<?php

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
        //create 20 fake users
        factory(App\Model\User::class, 5)->create();
        //create 100 fake posts
        factory(App\Model\Post::class, 15)->create();
        //create 500 fake comments
        factory(App\Model\Comment::class, 30)->create();

    }
}
