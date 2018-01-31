<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieTestController extends Controller
{
    //
    public function add(Request $request){
        return response('这货在设置cookie')->cookie('name','mary',1);
    }

    public function get(Request $request){
        $value = $request->cookie('name');
        return '获取到的cookie name的值是'.$value;
    }
}
