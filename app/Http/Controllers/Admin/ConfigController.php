<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::find(1);
        return view("admin.config.index", compact("config"));
    }

    public function update(Request $request)
    {
        $config = Config::find(1);
        $config->title = $request->title;
        $config->active = $request->active;
        $config->google = $request->google;
        $config->facebook = $request->facebook;
        $config->twitter = $request->twitter;
        $config->youtube = $request->youtube;
        $config->github = $request->github;
        $config->instagram = $request->instagram;
        $config->linkedin = $request->linkedin;
        $config->tumblr = $request->tumblr;
        if ($request->hasFile("logo")) {
            $logo = Str::slug($request->title) . "-logo." . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/post/'), $logo);

            $config->logo = "uploads/post/" . $logo;

        }

        if ($request->hasFile("favicon")) {
            $favicon = Str::slug($request->title) . "-favicon." . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('uploads/post/'), $favicon);
            $config->favicon = "uploads/post/" . $favicon;
        }

        $config->save();
        toastr()->success('Site Ayarları Başaryıla!', 'Site Yönetimi');
        return redirect()->back();

    }
}
