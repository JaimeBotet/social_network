<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'yordle' . mt_rand(1,99999999),
            'email' => Str::random(10).'@bandle.com',
            'password' => '$2y$10$YjyKblwQXPCE.yPs.PuwRu1ZSBcj.mu3nuWrB14Uk6XBcOY5h/Jxm', //12345678
        ]);
    }
}
