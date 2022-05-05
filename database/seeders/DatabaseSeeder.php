<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('admins')->insert([
            'name' => "Mauro Mendes",
            'email' => 'mauromendes123@gmail.com@gmail.com',
            'level'=>'1',
            'password' => Hash::make('AWDqse123#'),
        ]);
    }
}
