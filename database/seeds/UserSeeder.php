<?php

use Illuminate\Database\Seeder;

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
            'role' =>'admin',
            'name' => 'Irfan Riady',
            'email' => 'irfan@gmail.com',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(60),
        ]);
    }
}
