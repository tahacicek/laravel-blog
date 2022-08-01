<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
       
        for ($i=0; $i <4 ; $i++) { 
           
           DB::table('post')->insert([
                "category_id"=>rand(1,7),
                "title"=>"Deneme Yazıları",
                "descr"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit magni aliquid iure sed aliquam maiores fugiat illum, animi consequuntur distinctio nesciunt provident quaerat vel ipsa eos mollitia quod! Amet, dolorum?",
                "image"=>json_encode("https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60"),
                "author"=> "Taha Çiçek",
                "slug"=>Str::slug("Deneme Yazıları", "-"),
                "created_at"=>now(),
                "updated_at"=>now()
            ]);
        }
     
    }
}
