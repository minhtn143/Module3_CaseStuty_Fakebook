<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $minh = App\User::create([
            'first_name' => 'admin user',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
    }
}
