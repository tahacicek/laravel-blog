<?php

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Customer\Homepage;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Controllers\Admin\PostController;

/*
|--------------------------------------------------------------------------
|Back Route
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->middleware("isLogin")->group(function () {
    Route::get("/login", "Authe@login")->name("login");
    Route::post("/login.ln", "Authe@loginPost")->name("login.post");
});

Route::namespace('Admin')->middleware("isAdmin")->group(function () {
    Route::get("/admin", "Dashboard@index")->name("dashboard");
    Route::resource("yazilar", "PostController");
    Route::get("/recoverpost/{id}", "PostController@cover" )->name("recover");
    Route::get("/deletepost/{id}", "PostController@harddel" )->name("harddelete");
    Route::get("/switch", "PostController@switch" )->name("switch");
    Route::get("/trash", "PostController@softdel" )->name("softdel");

    Route::get("/logout", "Authe@logout")->name("logout");
});

/*
|--------------------------------------------------------------------------
|Front Route
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Customer')->group(function () {
    Route::get("/", "Homepage@index")->name("homepage");
    Route::get("/kategori/{category}", "Homepage@category")->name("kategori");
    Route::get("/iletisim", "Homepage@contact")->name("contact");
    Route::post("/iletisim", "Homepage@contact_post")->name("contact_post");
    Route::get("/{category}/{slug}", "Homepage@blog_detail")->name("blog_detail");
    Route::get("/{sayfa}", "Homepage@page")->name("page");
    Route::get("/iletisim", "Homepage@contact")->name("contact");
});
