<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Filesystem\Filesystem;
class PageController extends Controller
{
    public function index(){
        $pages = Page::all();
        return view("admin.pages.index", compact("pages"));
    }

    public function switch(Request $request)
    {
        $page = Page::findOrFail($request->id);
        $page->status = $request->status == "true"  ? 1 : 0;
        $page->save();
    }

    public function create(){
        return view("admin.pages.create");
    }


    public function insert(Request $request){
        $request->validate([
            'title' => 'required|min:3|',

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $last=Page::latest()->first("order");
        $imagesname = Str::slug($request->title) . "-" . time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads/post/'), $imagesname);
        $insert = Page::insert([
            "title" => $request->title,
            "image" => "uploads/post/" . $imagesname,
            "content" => $request->content,
            "slug" => Str::slug($request->title),
            "order" => $request->order=$last->order+1


        ]);
        if ($insert) {
            toastr()->success($request->title . ' sayfası başarıyla kaydedildi!', 'Sayfa Yönetimi');
            return redirect()->back();
        } else {
            toastr()->error('Bir sorun oluştu!', 'Sayfa Yönetimi');
            return redirect()->back();
        }
    }

    public function edit($id){
        $page=Page::findOrFail($id);
        return view("admin.pages.edit", compact("page"));

    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|min:3|',

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $last=Page::latest()->first("order");

        $imagesname = Str::slug($request->title) . "-" . time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads/post/'), $imagesname);

        $update = Page::where('id', $id)->update([
            "title" => $request->title,
            "image" => $request->image = "uploads/post/" . $imagesname,
            "content" => $request->content,
            "slug" => Str::slug($request->title),
            "order" => $request->order=$last->order+1
        ]);
        if ($update) {
            toastr()->success($request->title . 'sayfası başarıyla güncellendi.', 'Sayfa Yönetimi');
            return redirect()->back();
        } else {
            toastr()->error('Bir sorun oluştu!', 'Sayfa Yönetimi');
            return redirect()->back();
        }
    }

    public function delete($id){

        $page = Page::find($id);
        $photo = file_exists(($page->image));
        if($photo){
            file_exists(unlink(public_path($page->image)));


        }
         $page->delete();
         toastr()->success('Başarıyla silindi!', 'Sayfa Yönetimi');
            return redirect()->back();
            toastr()->error('Bir sorun oluştu!', 'Sayfa Yönetimi');
            return redirect()->back();
    }

    public function orders(Request $request){

        foreach ($request->get("orders") $key=>$order) {
            # code...
        }
    }

}
