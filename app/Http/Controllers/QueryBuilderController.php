<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    //从一张表中获取所有行
    public function get(){
        $test = DB::table('test')->get();
        dd($test);
    }

    //从一张表中获取一行
    public function first ()
    {
        $test = DB::table('test')->where('id',4)->first();
        dd($test);
    }

    //从一张表中获取一行 value 获取单个值
    public function value (){
        $name = DB::table('test')->where('id',4)->value('name');
        dd($name);
    }

    public function pluck () {
        $names = DB::table('test')->pluck('name');
        dd($names);
    }

    public function pluckvk () {
        //$names = DB::table('test')->pluck('##value##','##key##');
        $names = DB::table('test')->pluck('money','name');
        dd($names);
    }

    public function chunk () {
        DB::table('test')->orderBy('id')->chunk(2,function ($tests) {
            foreach ($tests as $test){
                echo $test->id;
            };
            echo "<hr>";
        });
    }

    public function chunkcancel () {
        echo '111';
        DB::table('test')->orderBy('id')->chunk(2,function ($tests) {
            return false;
        });
    }

    //5个聚合函数
    public function count () {
        $res = DB::table('test')->count();
        dd($res);
    }

    public function max () {
        $res = DB::table('test')->max('money');
        dd($res);
    }

    public function min () {
        $res = DB::table('test')->min('money');
        dd($res);
    }

    public function avg () {
        $res = DB::table('test')->avg('money');
        dd($res);
    }

    public function sum () {
        $res = DB::table('test')->sum('money');
        dd($res);
    }

    public function avg34 () {
        $res = DB::table('test')->where('id', '>', '2')->avg('money');
        dd($res);
    }

}
