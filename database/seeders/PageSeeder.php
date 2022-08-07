<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ["Hakkımızda", "Kariyer", "Vizyon", "Misyon" ];
        $count=0;
        foreach ($pages as $page) {
            $count++;
            FacadesDB::table('pages')->insert([

                "title" => $page,
                "image"=>json_encode("https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60"),
                "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis quis quo modi mollitia a iusto ut necessitatibus explicabo nostrum praesentium repellendus officia esse rem aperiam iste, nam est reiciendis ipsum?",
                "slug" => Str::slug($page),
                "order" => $count,
                "created_at" => now(),
                "updated_at" => now()



            ]);
        }
    }
}
