<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "name" => "EL MOT",
            "email" => "lyelmot@gmail.com",
            "country_id" => 37,
            "gender" => "male",
            "status" => "active",
            "type" => "admin",
            "birthdate" => "1995-03-10",
            "password" => Hash::make(md5("qwertyuiop")),
            "token" => encrypt(md5("qwertyuiop")),
            "code" => null,
            "is_reset" => "no",
            "profile" => null,
        ]);
    }
}
