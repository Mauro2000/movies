<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => "Mauro Mendes",
            'email' => 'mauromendes123@gmail.com@gmail.com',
            'level'=>'1',
            'password' => Hash::make('AWDqse123#'),
        ]);
    }
}
