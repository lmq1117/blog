<?php
    class UserController
    {
        public function add(){}

        public function index(Request $request,DB $db){
            $request->all();
            $request->only();
            $db->get();
        }
    }

    class Request
    {
        public function all(){
            echo '获取所有参数的all方法..';
        }

        public function only(){
            echo '获取部分参数的only方法...';
        }
    }

    class DB
    {
        public function get(){
            echo "获取所有的结果集";
        }
    }


    ###################################
    $request = new Request;

    //利用php反射机制
    $request = new ReflectionClass('Request');
    $obj = $request->newInstance();
























