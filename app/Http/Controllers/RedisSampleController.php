<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisSampleController extends Controller
{
    //
    public function rt(){
        $user = Redis::set('date','2018-02-26');
        var_dump($user);
    }
}
