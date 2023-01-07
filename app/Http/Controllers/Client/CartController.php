<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
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
        $category = Category::all();
        $dataCartUser = [];
        if(!empty($getData['cart'])){
            $getDataCart = $getData['cart'];
            $dataCartUser = $getDataCart[Auth::id()];
        }
        return view('client.pages.cart.index', compact('category', 'dataCartUser'));
    }
}
