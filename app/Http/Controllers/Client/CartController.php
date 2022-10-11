<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $request->session()->flush();
        $getProduct = DB::table('product')->find($request->id);
        $data = [
            'id' => $getProduct->id,
            'name' => $getProduct->name,
            'price_sale' => $getProduct->price_sale,
            'cost' => $getProduct->cost,
            'category' => $getProduct->category,
            'description' => $getProduct->description,
            'price' => $getProduct->price,
        ];
        $request->session()->push('cart.' . Auth::id() . $getProduct->id, $data);
        return response()->json('true');
    }

    public function show(Request $request){
        $getData = $request->session()->all();
        $getDataCart = $getData['cart'];
        dd($getDataCart);
    }
}
