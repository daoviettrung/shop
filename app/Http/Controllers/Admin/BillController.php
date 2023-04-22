<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class BillController extends Controller
{
    public function listOrder(){
        $bills = Bills::where('user_order_id', Auth::id())->get();
        return view('admin.pages.bill.list-order', compact('bills'));
    }
}
