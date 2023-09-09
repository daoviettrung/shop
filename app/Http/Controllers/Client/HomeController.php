<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Client\SharedController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    private $result;
    public function __construct(SharedController $sharedController) {
        if(empty(Cache::get('cate_menu'))){
            Cache::put('cate_menu', $sharedController->getDataMenu());
        }
        $this->result = Cache::get('cate_menu');
    }

    public function index(){
        if(!empty(Auth::user()->id)){
            $user = DB::table('users')
            ->where('id', Auth::user()->id)->first();
            if(empty($user->email_verified_at) && $user->level != 0){ /* check email verify */
                return redirect()->route('login')->withErrors('Cần xác thực email trước khi đăng nhập');
            }
        }
        $product = DB::table('product')->simplePaginate(9);
        $this->result['products'] = $product;
        return view('client.pages.home', ['data' => $this->result]);
    }

    public function searchByCategory($slug){
        $idCate = DB::table('category')
        ->where('slug', 'like', '%'.$slug.'%')
        ->pluck('id');
        $product = DB::table('product')
        ->where('category', $idCate)
        ->simplePaginate(9);
        $this->result['products'] = $product;
        return view('client.pages.home', ['data' => $this->result]);
    }

    public function testEmail() {
        $data['name'] = 'Hello Trung dep trai';
        Mail::send('client.pages.email.verify', $data, function ($message) {
            $message->subject('Gui de test');
            $message->to('viettrung662000@gmail.com', 'Trung dep trai');
        });
    }
}