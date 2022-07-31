<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class Homepage extends Controller
{
    public function index(){
        $data["categories"]=Category::inRandomOrder()->get();
        return view("customer.homepage", $data);
    }

}
