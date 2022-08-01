<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;


class Homepage extends Controller
{
    public function index(){
        $data["post"]=Post::inRandomOrder("created_at", "DESC")->get();
        $data["categories"]=Category::inRandomOrder()->get();
        return view("customer.homepage", $data);
    }

    public function blog_detail($slug){
        $data["post"]=Post::where("slug", $slug)->first() ?? abort(403, "Böyle bir yazı bulunumadı");
        
        $data["categories"]=Category::inRandomOrder()->get();

        return view("customer.blog-detail", $data);

    }

}
