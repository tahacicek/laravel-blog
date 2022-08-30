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
Route::get("aktif-degil", function(){
    return view("customer.deactive");
});
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

    Route::get("/kategoriler", "CategoryController@index")->name("category.index");
    Route::get("/kategori/status", "CategoryController@switch" )->name("category.switch");
    Route::get("/kategori/getData", "CategoryController@getData" )->name("category.getdata");
    Route::get("/kategori/getDelete", "CategoryController@getDelete" )->name("category.getdelete");

    Route::get("/kategori/{id}", "CategoryController@delete" )->name("category.delete");
    Route::post("/kategori/olustur", "CategoryController@insert" )->name("category.insert");
    // Route::get("/kategori/duzenle/{id}", "CategoryController@edit" )->name("category.edit");
    Route::post("/kategori/guncelle/{id}", "CategoryController@update" )->name("category.update");

    //PAGE'S ROUTE'S
    Route::get("/sayfalar", "PageController@index")->name("page.index");
    Route::get("sayfa/switch", "PageController@switch" )->name("page.switch");
    Route::get("sayfa/olustur", "PageController@create" )->name("page.create");
    Route::post("sayfalar/olustur", "PageController@insert" )->name("page.insert");
    Route::get("/sayfalar/edit/{id}", "PageController@edit" )->name("page.edit");
    Route::post("/sayfalar/guncelle/{id}", "PageController@update" )->name("page.update");
    Route::get("/sayfalar/siralama", "PageController@orders" )->name("page.orders");
    Route::get("/sayfalar/{id}", "PageController@delete" )->name("page.delete");

    //SETTING'S ROUTE'S
    Route::get("/ayarlar", "ConfigController@index" )->name("config.index");
    Route::post("/ayarlar/update", "ConfigController@update" )->name("config.update");




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
