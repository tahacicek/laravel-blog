<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logins;
use Illuminate\Support\Facades\Auth;

class Authe extends Controller
{
    public function login()
    {
        return view("admin.auth.login");
    }

    public function loginPost(Request $request)
    {
        if (Auth::attempt(["email"=>$request->email, "password"=>$request->password])) {
            toastr()->success('Girişiniz sağlandı.', "Başarılı");

        return view("admin.dashboard");
        }
        toastr()->error("E-posta veya şifre hatalı!", "Dikkat!");
        return redirect()->route("login");
    }
    public function logout(){
        Auth::logout();
        toastr()->success('Çıkışınız sağlandı.', "Başarılı");

        return redirect()->route("login");
    }
}
