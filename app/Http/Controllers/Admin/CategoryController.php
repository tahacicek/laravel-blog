<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Symfony\Component\Console\Helper\Helper;
use App\Models\Post;
use Yoeunes\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("admin.category.index", compact("categories"));
    }
    public function switch(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->status == "true"  ? 1 : 0;
        $category->save();
    }

    public function delete(Request $request, $id)
    {
        $category=Category::findOrFail($request->id);
        if($category->id==1){
            toastr()->error("Bu kategori silinemez");
            return redirect()->back();
        }
        $message="";
        $count=$category->categoryCount();
        if($count>0){
            Post::where("category_id", $category->id)->update(["category_id"=>1]);
            $defaultCategory=Category::find(1);
            $message="Bu kategoriye ait $count makale '$defaultCategory->name' kategorisine taşındı.";
        }
        $category->delete();
        toastr()->success($message, "Kategori başarıyla silindi");
        return redirect()->back();
    }
    public function insert(Request $request)
    {
        $isSlug = Category::whereSlug(Str::slug($request->slug))->first();
        $isName = Category::whereName(Str::slug($request->name))->first();
        if ($isSlug or $isName) {
            toastr()->error($request->name . ' adlı kategori zaten mevcut!', 'Kategori Yönetimi');
            return redirect()->back();
        }


        $insert = Category::insert([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
        ]);
        if ($insert) {
            toastr()->success($request->name . ' isimli kategori başarıyla eklendi!', 'Kategori Yönetimi');
            return redirect()->back();
        } else {
            toastr()->error('Bir sorun oluştu!', 'Kategori Yönetimi');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $category = Category::where("id", $id)->first();
        return view("admin.category.edit", compact("category"));
    }

    public function update(Request $request, $id)
    {
        $isSlug = Category::whereSlug(Str::slug($request->slug))->whereNotIn("id", [$request->id])->first();
        $isName = Category::whereName(Str::slug($request->name))->whereNotIn("id", [$request->id])->first();
        if ($isSlug or $isName) {
            toastr()->error($request->name . ' adlı kategori zaten mevcut!', 'Kategori Yönetimi');
            return redirect()->back();
        }

        $update = Category::where('id', $id)->update([
            "name" => $request->name,
            "slug" => Str::slug($request->slug),

        ]);
        if ($update) {
            toastr()->success($request->name . ' Güncellendi.', 'Kategori Yönetimi');
            return redirect(route("category.index"));
        } else {
            toastr()->error('Bir sorun oluştu!', 'Kategori Yönetimi');
            return redirect()->back();
        }
    }

    public function getData(Request $request)
    {
        $category = Category::findOrFail($request->id);
        return response()->json($category);
    }
    public function getDelete(Request $request)
    {
        $category = Category::findOrFail($request->id);
        if ($category->id==1) {
            toastr()->error('Bir sorun oluştu!', 'Kategori Yönetimi');
            return redirect()->back();
        }
        if ($category->postCount()>0) {
            return "evet";
        }
    }
}
