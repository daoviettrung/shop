<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function getInfor($social){
        return Socialite::driver($social)->redirect();
    }

    public function checkInfor($social){
        $infor =  Socialite::driver($social)->user();
        dd($infor);
    }
}
