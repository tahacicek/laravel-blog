<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logins')->insert([
            "name"=>"Taha Çiçek",
            "email"=>"ttahacicek@gmail.com",
            "password"=>bcrypt(102030),
        ]);
    }
}
