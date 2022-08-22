<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Carbon\Carbon;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::orderBy("created_at", "ASC")->get();
        return view("admin.post.index", compact("post"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories=Category::all();
        return view("admin.post.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|',

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagesname = Str::slug($request->title) . "-" . time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads/post/'), $imagesname);
        $insert = Post::insert([
            "title" => $request->title,
            "category_id" => $request->category_id,
            "author" => $request->author,
            "slug" => Str::slug($request->title),
            "descr" => $request->descr,
            "image" => "uploads/post/" . $imagesname,

        ]);
        if ($insert) {
            toastr()->success($request->title . ' Yazı başarıyla kaydedildi!', 'Yazı Yönetimi');
            return redirect()->back();
        } else {
            toastr()->error('Bir sorun oluştu!', 'Yazı Yönetimi');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
