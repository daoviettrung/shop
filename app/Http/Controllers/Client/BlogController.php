<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Post;


class BlogController extends Controller
{
    public function index(){
        $category = Category::all();
        $blog = DB::table('post')->simplePaginate(9);
        $blogRight = DB::table('post')->orderBy('created_at', 'desc')->limit(5)->get();
        return view('client.pages.blog.index', compact('category', 'blog', 'blogRight'));
    }

    public function show($slug){
        $category = Category::all();
        $blog = DB::table('post')->where('slug', $slug)->get();   
        $blog = $blog[0];
        $bl = Post::find($blog->id);
        $bl->view = $bl->view + 1;
        $bl->update();
        return view('client.pages.blog.detail', compact('category', 'blog'));
    }
}
