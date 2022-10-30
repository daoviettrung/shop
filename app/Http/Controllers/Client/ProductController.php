<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class ProductController extends Controller
{
    public function viewDetailProduct($id){
        $category = Category::all();
        return view('client.pages.product.detail', compact('category'));
    }
}
