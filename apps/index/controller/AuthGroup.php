<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
use think\Db;
use \think\Session;

class AuthGroup extends Base
{

    public function userGroupList()
    {

    $groupList =
    Db::table('auth_group')     
    ->paginate(10);

  $this->assign(array('list' => $groupList));
        return $this->fetch('');
    }
  
}
