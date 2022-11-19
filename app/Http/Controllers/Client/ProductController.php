<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
    public function viewDetailProduct($id){
        $category = Category::all();
        $product = Product::find($id);
        return view('client.pages.product.detail', compact('category', 'product'));
    }
}
