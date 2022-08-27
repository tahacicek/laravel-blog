<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Symfony\Component\Console\Helper\Helper;
class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view("admin.category.index", compact("categories"));
    }
    public function switch(Request $request){
        $category = Category::findOrFail($request->id);
        $category->status = $request->status == "true"  ? 1 : 0;
        $category->save();
    }

    public function delete($id){
        $delete = Category::where("id", $id)->delete();
        if ($delete) {
            toastr()->success('Başarıyla geri dönüşüm kutusuna atıldı!', 'Blog Yazıları');
            return redirect()->back();
        } else {
            toastr()->error('Geri dönüşüme atılırken bir hata oluştu!', 'Blog Yazıları');
        }
    }
    public function insert(Request $request){
        $isExist=Category::whereSlug(Str::slug($request->name))->first();
        if ($isExist) {
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

    public function edit($id){
        $category = Category::where("id", $id)->first();
        return view("admin.category.edit", compact("category"));
    }

    public function update(Request $request, $id){
        $update = Category::where('id', $id)->update([
            "name" => $request->name,
            "slug" => Str::slug($request->name),

        ]);
        if ($update) {
            toastr()->success($request->name . ' Güncellendi.', 'Kategori Yönetimi');
            return redirect(route("category.index"));
        } else {
            toastr()->error('Bir sorun oluştu!', 'Kategori Yönetimi');
            return redirect()->back();
        }
    }
}
