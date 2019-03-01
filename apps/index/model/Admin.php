<?php
namespace app\index\model;
use think\Model;
use think\Controller;
use think\Db;

class Admin extends Model
{
 public function login($data)
  {
    $captcha = new \think\captcha\Captcha();
    if (!$captcha->check($data['captcha'])) {
    return 4;
    } else {
   
 
   $user=Db::name('admin')->where('username','=',$data['username'])->find();
  
   if($user){
        if ($user['password']== md5($data['password'])) {
          session('username',$user['username']);
          session('id',$user['id']);
          
        return 3;


        }
        else
          { return 2;}
   }
   else{
      return 1;
   }
  }
   }
}
