<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $request){
        Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
        // return response()->json($status);
    }
}
