<?php
namespace app\index\controller;
use think\Controller;
use think\Request;


class Base extends Controller
{
   public function _initialize()
    {
       if (!session('username')) {
       	$this->error('请先登陆系统','index\login\login');

        
       }
     
        $auth=new Auth();
        $request=Request::instance();
        $con=$request->controller();
        $action=$request->action();
        $name=$con.'/'.$action;  

        $notCheck=array('Index/index','Login/logout','Login/login','bcpk/export','cpk/export','cpck/export');
            if(session('id')!=1){
            if(!in_array($name, $notCheck)){
            if(!$auth->check($name,session('id'))){
          
          $this->error('没有操作权限，如需要操作权限请联系管理员',url('Index/index')); 
                    }
          }
          
        }

    }
}
