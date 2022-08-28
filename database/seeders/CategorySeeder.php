<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Genel", "İslam", "Tarih", "Psikoloji", "Felsefe", "Şiir"];
        foreach ($categories as $category) {
            # code...
            FacadesDB::table('categories')->insert([

                "name" => $category,
                "slug" => Str::slug($category),
                "created_at" => now(),
                "updated_at" => now()



            ]);
        }
    }
}
