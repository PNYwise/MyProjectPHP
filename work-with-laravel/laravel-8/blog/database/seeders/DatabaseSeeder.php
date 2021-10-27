<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Bunayya Wahyu',
            'username'=>'bunayyawahyu',
            'email'=>'bunayya12345@gmail.com',
            'password'=>bcrypt('password')
        ]);
        User::factory(5)->create();
        Post::factory(20)->create();
        Category::create([
            'name'=>'Web Programming',
            'slug'=>'web-programming'
        ]);
        Category::create([
            'name'=>'Web Design',
            'slug'=>'web-design'
        ]);
        Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);
    }
}
