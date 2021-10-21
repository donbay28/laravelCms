<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
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
            'name' => 'Donny',
            'email' =>  'donny@gmail.com',
            'telp' =>  '00000000000',
            'alamat' =>  'pamulang',
            'password' =>  password_hash("root", PASSWORD_DEFAULT),
            'active' => true
        ]);
    }
}
