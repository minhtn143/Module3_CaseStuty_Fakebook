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

        $user1 = App\User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(5),
            'email' => 'minh@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $user2 = App\User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(5),
            'email' => 'hieu@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $user3 = App\User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(5),
            'email' => 'tung@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
