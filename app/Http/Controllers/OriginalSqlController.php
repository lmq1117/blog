<?php
/**
 * Laravel框架运行原生sql语句实例
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OriginalSqlController extends Controller
{
    //查 ?占位符 :name 命名绑定
    public function select(){

        //返回的$res是个数组，每一个元素是一个PHP StdClass 对象
        $res = DB::select('select * from test where id >= ?',[1]);
        //var_dump($res);
        //dd($res);

        //可以这样访问$res
        foreach ($res as $key=>$val){
            echo $val->id . '---'. $val->name . '</br>';
        }

    }

    //查2 命名绑定
    public function select2(){
        //命名绑定
        $res = DB::select('select * from test where id = :id and name=:name',['id'=>2,'name'=>'元始天尊']);
        dd($res);
    }

    //增
    public function insert(){

    }

    //删
    public function del(){

    }

    //改
    public function update(){

    }
}
