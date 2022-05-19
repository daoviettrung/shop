<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    public function index(){
        $category = Category::all();
        $blog = DB::table('post')->simplePaginate(9);
        $blogRight = DB::table('post')->orderBy('created_at', 'desc')->limit(5)->get();
        return view('client.pages.blog', compact('category', 'blog', 'blogRight'));
    }
}
