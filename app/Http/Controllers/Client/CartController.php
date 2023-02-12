<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Client\SharedController;
use Illuminate\Support\Facades\Cache;

class CartController extends Controller
{
    private $result;

    public function __construct(SharedController $sharedController) {
        if(empty(Cache::get('cate_menu'))){
            Cache::put('cate_menu', $sharedController->getDataMenu());
        }
        $this->result = Cache::get('cate_menu');
    }

    public function addToCart(Request $request){
        $getProduct = DB::table('product')->find($request->id);
        $data = [
            'id' => $getProduct->id,
            'name' => $getProduct->name,
            'price_sale' => $getProduct->price_sale,
            'cost' => $getProduct->cost,
            'category' => $getProduct->category,
            'description' => $getProduct->description,
            'price' => $getProduct->price,
            'image' => $getProduct->image,
        ];
        $request->session()->push('cart.' . Auth::id(), $data);
        return response()->json('true');
    }

    public function show(Request $request){
        $getData = $request->session()->all();
        $dataCartUser = [];
        if(!empty($getData['cart'])){
            $getDataCart = $getData['cart'];
            $dataCartUser = $getDataCart[Auth::id()];
        }
        $this->result['data_cart'] = $dataCartUser;
        return view('client.pages.cart.index', ['data' =>$this->result]);
    }
}
