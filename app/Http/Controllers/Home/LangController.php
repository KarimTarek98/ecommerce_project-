<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function english()
    {
        session()->get('lang');
        session()->forget('lang');
        Session::put('lang', 'en');
        return redirect()->back();
    }

    public function arabic()
    {
        session()->get('lang');
        session()->forget('lang');
        Session::put('lang', 'ar');
        return redirect()->back();
    }
}
