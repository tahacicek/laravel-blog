<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
class ConfigController extends Controller
{
    public function index(){
        $config=Config::find(1);
        return view("admin.config.index", compact("config"));
    }
}
