<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

# 基本路由
# 请求方式 get post put patch options delete
# 一对多 match， 一对所有 any


# 基本路由
Route::get('hello',function (){
    return "基本路由就是这么用的！";
});

# 支持的请求方式 get post put delete patch options

# 一条路由响应多种HTTP请求动作 match
Route::match(['get','post'],'foo',function (){
    return "一对多，get or post！";
});

# 一条路由响应所有HTTP请求动作 any
Route::any('bar',function (){
    return "请求from any！";
});

# 路由重定向
# 1 定义一个there路由
Route::get('/there',function (){
    return "从here过来到there";
});

## 配置重定向
Route::redirect('/here','/there',301);

## 路由视图

###################################

# 路由参数、命名以及分组
## 路由参数

### 必选参数
Route::get('user/{id}',function ($id){
    return "当前请求 User 的id是： ". $id;
});

### 多个参数
Route::get('posts/{post}/comments/{comment}',function ($postId, $commentId){
    return $postId . ' - ' . $commentId;
});

/**
 * 路由命名总结
 * 路由参数名称不能包含 - ，需要用到的话 可以用_代替
 * 路由参数注入到回调或者控制器，取决于他们的顺序，与回调/控制器名称无关
 */

### 可选参数 需要给相应的变量取默认值

Route::get("category/{name?}",function ($name = '手机'){
    return $name;
});

### 正则约束
//正则约束避免了 goods/{goods_name} 和 goods/{goods_id}的混淆
Route::get('goods/{goods_name}',function ($goods_name){
    //必须是字母不能是数字
    return $goods_name;
})->where(['goods_name'=>'[A-Za-z]+']);

Route::get('goods/{goods_id}',function ($goods_id){
    //goods_id只能是数字
    return "商品id是： ".$goods_id;
})->where(['goods_id'=>'[0-9]+']);

Route::get('member/{id}/{name}',function ($id, $name){
    //同时指定id和name的格式
    return "ID是： {$id},NAME是： {$name}";
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);

### 全局约束
//pattern 方法
//在 RouteServiceProvider的boot方法中定义约束模式
        //Route::pattern([
        //    '_id'=>'[0-9]+',
        //    '_name'=>'[A-Za-z]+',
        //]);
//一单定义全局约束模式，将会自动应用于所有包含该参数名称的路由中
Route::get('order/{_id}/{_name}',function ($id, $name){
    //这里没有使用where定义参数正则约束，使用了全局约束
    return "这里没有使用where定义参数正则约束，使用了全局约束<br />订单ID是： {$id},NAME是： {$name}";
});

## 命名路由
/**
 * name方法
 * 1 为url重定向提供了方便
 * 2 为已命名的路由生成url
 * 3 检查当前路由
 */

## 路由分组 -- 在多个路由中共享相同的路由属性，比如 中间件和命名空间
### 中间件
### 命名空间
### 子域名路由
### 路由前缀

# 路由模型绑定
## 隐式绑定
## 显式绑定

# Cookie
Route::get('cookie/add','CookieTestController@add');
Route::get('cookie/get','CookieTestController@get');


# Session
Route::get('session/get','SessionTestController@get');
Route::get('session/put','SessionTestController@put');




####ReqController#################################
Route::get('req','ReqController@req');


####FileUpController##############################
Route::get('form','FileUpController@form');
Route::post('upload','FileUpController@fileup');


####OriginalSqlController##########################
//原生sql执行增删改查
Route::get('oselect','OriginalSqlController@select');
Route::get('oselect2','OriginalSqlController@select2');
Route::get('oinsert','OriginalSqlController@insert');
Route::get('odelete','OriginalSqlController@delete');
Route::get('oupdate','OriginalSqlController@update');
Route::get('ostatement','OriginalSqlController@statement');

//监听查询事件??

//数据库事务
Route::get('otransaction','OriginalSqlController@transaction');
//处理死锁


####QueryBuilderController##########################
//从一张表中取出所有行
Route::get('qbget','QueryBuilderController@get');
//从一张表中取出一行/一列
Route::get('qbfirst','QueryBuilderController@first');
Route::get('qbvalue','QueryBuilderController@value');
//获取数据列值列表
Route::get('qbpluck','QueryBuilderController@pluck');
Route::get('qbpluckvk','QueryBuilderController@pluckvk');
//组块结果集 chunk
Route::get('qbchunk','QueryBuilderController@chunk');
Route::get('qbchunkcancel','QueryBuilderController@chunkcancel');
//聚合函数
Route::get('qbcount','QueryBuilderController@count');
Route::get('qbmax','QueryBuilderController@max');
Route::get('qbmin','QueryBuilderController@min');
Route::get('qbavg','QueryBuilderController@avg');
Route::get('qbavg34','QueryBuilderController@avg34');
Route::get('qbsum','QueryBuilderController@sum');

//查询 select
Route::get('qbselect','QueryBuilderController@select');
Route::get('qbdistinct','QueryBuilderController@distinct');
Route::get('qbraw','QueryBuilderController@raw');
//内连接
Route::get('qbjoin','QueryBuilderController@join');
Route::get('qbleftjoin','QueryBuilderController@leftjoin');
Route::get('qbwhere','QueryBuilderController@where');
Route::get('qbwhereor','QueryBuilderController@whereor');
Route::get('qbwherebetween','QueryBuilderController@whereBetween');
Route::get('qbincrement','QueryBuilderController@increment');



####RedisSampleController############################
Route::get('rt','RedisSampleController@rt');




