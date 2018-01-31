<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUpController extends Controller
{
    //

    public function form(){
        return view('form');
    }

    public function fileup(Request $request){
        //var_dump($request);
        $fileobj = $request->file('pic');
        //var_dump($fileobj);exit;
        dd($fileobj);
        //判断文件是否上传成功
        if($fileobj->isValid()){
            //获取原文件名
            $originalName = $fileobj->getClientOriginalName();
            //扩展名
            $ext = $fileobj->getClientOriginalExtension();
            //文件类型
            $type = $fileobj->getClientMimeType();
            //临时绝对路径
            $realPath = $fileobj->getRealPath();
            $filename = date('Y-m-d-H-i-S').'-'.uniqid().'.'.$ext;
            var_dump($realPath);
            var_dump($filename);
            $bool = \Storage::disk('uploads')->put($originalName, file_get_contents($realPath));
            echo $bool ? '上传成功' : '上传失败';
        }
        //var_dump($request->file('pic'));
    }
}
