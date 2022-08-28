<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{
    public function index(){
        $pages = Page::all();
        return view("admin.pages.index", compact("pages"));
    }
}
