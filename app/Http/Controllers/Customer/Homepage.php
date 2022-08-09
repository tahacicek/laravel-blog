<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PostRequest;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\NoCodeCoverageDriverWithPathCoverageSupportAvailableException;
use Illuminate\Support\Facades\Validator;

//models
use App\Models\Page;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Promise\all;

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

    public function contact(){
        return view("customer.contact");
    }
   
    public function contact_post(Request $request){
      
        $rules = [
            "name"=>"required|min:5"
          
        ];

        $validated=Validator::make($request->all(), $rules);
        
        if ($validated->fails()) {
            toastr()->error("İsim alanı boş bırakılamaz ve en az beş karakter olmalıdır.", "Dikkat!");
            return redirect()->route("contact");
           
        }
           
        
        $contact = new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();

        
        toastr()->success("Başarılı", 'Mesajınız başarıyla gönderildi, en kısa zamanda dönüş sağlanacaktır.');

        return redirect()->route("contact");

    }
}
