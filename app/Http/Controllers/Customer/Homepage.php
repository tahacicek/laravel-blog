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
        $data["post"]=Post::orderBy("created_at", "DESC")->get();
        $data["categories"]=Category::inRandomOrder()->get();
        return view("customer.homepage", $data);
    }

}
