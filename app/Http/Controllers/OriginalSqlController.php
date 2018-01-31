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

    //增 占位
    public function insert(){
        $res = DB::insert('insert into test (id,name) values (?,?)',[6,'mary']);
        var_dump($res);//成功 返回布尔true 失败报错
    }

    //删 返回受影响的行数
    public function delete(){
        $deleted = DB::delete('delete from test where id = ?',[5]);
        var_dump($deleted);
    }

    //改 返回受影响的行数
    public function update(){
        $affected = DB::update('update test set name=? where id=4',['杰克']);
        var_dump($affected);//
    }
}
