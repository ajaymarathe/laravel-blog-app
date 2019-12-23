<?php

use Illuminate\Database\Seeder;
use App\post;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Post::class, 100)->create();
        factory(Category::class, 50)->create();
    }
}
