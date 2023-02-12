<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class SharedController extends Controller
{
    public function getDataMenu(){
        $slide = DB::table('slide')->skip(0)->take(5)->get();
        $category = Category::all();
        return [
            'slide' => $slide,
            'category' => $category
        ];
    }
}
