<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Admin;

class Login extends Controller
{
    public function login()
    {
	
    if (request()->isPost()) {
    		$login=new Admin();
            $data=input('post.');
            $num =$login-> login($data);
            if ($num==4) {
                return alert_error('验证码错误','login');
            }
    		elseif ($num==1) {
    			alert_error('用户名错误');

    		}
    		elseif($num==2){
          
    			return alert_error('密码错误');
    		}
    		elseif($num==3){
    		 	return alert_success('登陆成功', '../index/index');
    		}
    	}	
    
    	return $this->fetch('login');
    }
     public function logout()
    {
        session(null);
        return alert_success('退出成功', 'login');
        }
    }
