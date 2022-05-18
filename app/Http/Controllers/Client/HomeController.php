<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;


class HomeController extends Controller
{
    public function index(){
        $slide = DB::table('slide')->skip(0)->take(5)->get();
        $category = Category::all();
        return view('client.pages.home', compact('slide', 'category'));
    }
}