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
        $dataSession = empty($request->session()->all()['cart'][Auth::id()]) ? [] : $request->session()->all()['cart'][Auth::id()];
        if(empty($dataSession)){
            $request->session()->push('cart.' . Auth::id(), $data);
            return response()->json('true');
        }
        $checkDataAlreadyExist = $this->checkDataSessionAlreadyExist($dataSession, $request->id);
        if($checkDataAlreadyExist){
            $request->session()->push('cart.' . Auth::id(), $data);
        }
        return response()->json('true');
    }

    public function show(Request $request){
        $this->result['data_cart'] = [];
        if(!empty($request->session()->all()['cart'][Auth::id()])){
            $this->result['data_cart'] = $request->session()->all()['cart'][Auth::id()];
        }
        return view('client.pages.cart.index', ['data' =>$this->result]);
    }

    public function removeItemCart(Request $request, $id){
        $data = $request->session()->all()['cart'][Auth::id()];
        $request->session()->forget('cart.' . Auth::id());
        foreach ($data as $key => $value){
            if($value['id'] != $id){
                $request->session()->push('cart.' . Auth::id(), $value);
            }
        }
        return redirect('detail-cart');
    }

    function checkDataSessionAlreadyExist($data, $id){
        dd($data);
        foreach($data as $value){
            if($value['id'] == $id){
                return false;
            }
        }
        return true;
    }
}
