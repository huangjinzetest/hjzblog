<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \Illuminate\Database\Eloquent\Model::unguard();
        $this->call('PostTableSeeder');
        $this->call('UserTableSeeder');
    }
}

class PostTableSeeder extends Seeder
{
    public function run()
    {
        App\Post::truncate();
        factory(App\Post::class, 20)->create();
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        App\User::truncate();
        factory(App\User::class, 1)->create();
    }
}


