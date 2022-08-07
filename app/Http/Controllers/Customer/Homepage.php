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
use App\Models\Page;
class Homepage extends Controller
{
    public function __construct()
    {   
        view()->share("pages", Page::orderBy("order", "ASC")->get());
        view()->share("categories", Category::inRandomOrder()->get());

    }
    public function index()
    {
        $data["post"] = Post::inRandomOrder("created_at", "DESC")->paginate(4);
        return view("customer.homepage", $data);
    }

    public function blog_detail($category, $slug)
    {
        $category = Category::whereSlug($category)->first() ?? abort(403, "Böyle bir kategori bulunumadı");
        $post = Post::where("slug", $slug)->whereCategoryId($category->id)->first() ?? abort(403, "Böyle bir yazı bulunumadı");
        $post->increment("hit");
        $data["post"] = $post;
        return view("customer.blog-detail", $data);
    }

    public function category($slug){

        $category = Category::whereSlug($slug)->first() ?? abort(403, "Böyle bir kategori bulunumadı");
        $data["post"]=Post::where("category_id", $category->id)->inRandomOrder()->paginate(2);
        $data["category"]=$category;
        return view("customer.category", $data);

    }

    public function page($slug){
        $page=Page::whereSlug($slug)->first() ?? abort(403, "Böyle bir kategori bulunumadı");
        $data["page"]=$page;
        return view("customer.page", $data );

    }
   
}
