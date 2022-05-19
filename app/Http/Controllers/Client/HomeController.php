<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;


class HomeController extends Controller
{
    public function index(){
        $slide = DB::table('slide')->skip(0)->take(5)->get();
        $category = Category::all();
        $product = DB::table('product')->simplePaginate(9);
        return view('client.pages.home', compact('slide', 'category', 'product'));
    }

    public function searchByCategory($slug){
        $slide = DB::table('slide')->skip(0)->take(5)->get();
        $category = Category::all();
        $idCate = DB::table('category')
        ->where('slug', 'like', '%'.$slug.'%')
        ->pluck('id');
        $product = DB::table('product')
        ->where('category', $idCate)
        ->simplePaginate(9);
        return view('client.pages.home', compact('slide', 'category', 'product'));
    }
}