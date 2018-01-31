<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReqController extends Controller
{
    //

    public function req(Request $request)
    {
        //
        //return 'this a req!';

        //获取 -- 请求方法
        $method = $request->method();
        echo $method;
    }

}
