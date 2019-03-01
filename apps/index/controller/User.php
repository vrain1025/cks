<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
use think\Db;
use \think\Session;

class User extends Base
{
	   public function userGrouplist()
    {



        return $this->fetch('userGroup_list');
    }
    public function userList()
    {

    $userList =
    Db::table('admin')     
    ->paginate(10);

    $this->assign(array('list' => $userList));
        return $this->fetch('user_list');
    }
   public function add()
    {
        $userList =
    $groupList=Db::table('auth_group')->select();

  $this->assign(array('groupList' => $groupList));

       return $this->fetch('user/add');  
    }


    public function addResult()
    {

    if(request()->isPost()){
        $username = input('request.username');
        $password = md5(input('request.password'));
        $groupid = input('request.groupid');
        Db::table('admin') 
        ->insert(['username' => $username, 'password' => $password, 'group_id' => $groupid,'status'=>1]);
         return alert_success('添加成功','user_list');
       }
       else {
       return alert_error('用户信息添写不完整，添加失败','user_list');
       }
       
    }
}