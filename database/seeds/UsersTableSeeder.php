<?php

use App\Photo;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::truncate();
        Post::truncate();
        User::truncate();

        $user1 = App\User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(5),
            'email' => 'minh@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
