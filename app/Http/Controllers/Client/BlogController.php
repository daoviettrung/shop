<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Client\SharedController;


class BlogController extends Controller
{
    private $result;

    public function __construct(SharedController $sharedController) {
        if(empty(Cache::get('cate_menu'))){
            Cache::put('cate_menu', $sharedController->getDataMenu());
        }
        $this->result = Cache::get('cate_menu');
    }
    public function index(){
        $blog = DB::table('post')->simplePaginate(9);
        $blogRight = DB::table('post')->orderBy('created_at', 'desc')->limit(5)->get();
        $this->result['blog'] = $blog;
        $this->result['blog_right'] = $blogRight;
        return view('client.pages.blog.index', ['data' => $this->result]);
    }

    public function show($slug){
        $blog = DB::table('post')->where('slug', $slug)->get();   
        $blog = $blog[0];
        $bl = Post::find($blog->id);
        $bl->view = $bl->view + 1;
        $bl->update();
        $this->result['blog'] = $blog;
        return view('client.pages.blog.detail', ['data' => $this->result]);
    }
}
