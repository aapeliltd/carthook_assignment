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
        factory(App\Model\User::class, 20)->create();
        //create 100 fake posts
        factory(App\Model\Post::class, 100)->create();
        //create 500 fake comments
        factory(App\Model\Comment::class, 500)->create();

    }
}
