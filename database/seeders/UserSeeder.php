<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'permission' => 1,
            'email' => 'admin@hotmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'mesa1',
            'permission' => 0,
            'email' => 'mesa1@hotmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'mesa2',
            'permission' => 0,
            'email' => 'mesa2@hotmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'mesa3',
            'permission' => 0,
            'email' => 'mesa3@hotmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'mesa4',
            'permission' => 0,
            'email' => 'mesa4@hotmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'mesa5',
            'permission' => 0,
            'email' => 'mesa5@hotmail.com',
            'password' => Hash::make('12345678'),
        ]);

        
    }
}
