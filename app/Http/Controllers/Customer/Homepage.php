<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\NoCodeCoverageDriverWithPathCoverageSupportAvailableException;

class Homepage extends Controller
{
    public function index()
    {
        $data["post"] = Post::inRandomOrder("created_at", "DESC")->paginate(4);
        $data["categories"] = Category::inRandomOrder()->get();
        $data["post"]->withPath("yazilar/sayfa");

        return view("customer.homepage", $data);
    }

    public function blog_detail($category, $slug)
    {
        $category = Category::whereSlug($category)->first() ?? abort(403, "Böyle bir kategori bulunumadı");
        $post = Post::where("slug", $slug)->whereCategoryId($category->id)->first() ?? abort(403, "Böyle bir yazı bulunumadı");
        $post->increment("hit");
        $data["post"] = $post;
        $data["categories"] = Category::inRandomOrder()->get();
        return view("customer.blog-detail", $data);
    }

    public function category($slug){
        $data["categories"] = Category::inRandomOrder()->get();

        $category = Category::whereSlug($slug)->first() ?? abort(403, "Böyle bir kategori bulunumadı");
        $data["post"]=Post::where("category_id", $category->id)->inRandomOrder()->paginate(2);
        $data["category"]=$category;
        return view("customer.category", $data);

    }
}
