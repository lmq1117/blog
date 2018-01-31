<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionTestController extends Controller
{
    //
    public function get(Request $request)
    {
        //$value =  $request->session()->get('name');
        //$value =  $request->session()->get('name','monkey king');
        //$value = session('name');
        //$value = session('name1','monkey king');


        $value = $request->session()->all();

        //$value = $request->session()->pull('goods.goods_name','123');
        return $value;
    }

    public function put(Request $request){
        //$request->session()->put('name','jack');
        //session(['name'=>'mary2']);

        //$request->session()->push('goods.goods_name','macbook pro');
        //$request->session()->push('goods.goods_name','iphone8x');


    }
}
