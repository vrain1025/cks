<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
use think\Db;
use \think\Session;

class Thk extends Base
{
    public function index()
    {
    $count = Db::table('thk')->where('status',0)->order('id asc')->count();//计算总页面
    $this->assign('count', $count);
   $list =
   	Db::table('thk')
   	->field('ordernum,model,figure,tp,count(model) as cnt') 
    ->group('ordernum')
    ->where('status',0)
    ->paginate(10);
   // 把分页数据赋值给模板变量list
    $this->assign('list', $list);
// 渲染模板输出
    return $this->fetch();
}


//单条码查询系统 -----------------------------
	public function query(){

if(request()->isGet()){
    $code = input('get.code');
   }
   else {
    $code='';
   }

  //计算总页面
  $count = Db::table('thk') 
      
   ->whereOr('code','in',$code)
    ->whereOr('model','in',$code)
    ->whereOr('ordernum','in',$code)
    ->where('status',0)
    ->count();
    $this->assign('count', $count);
    //查询并分页
  
   $list =
    Db::table('thk')   
         
    ->whereOr('code','in',$code)
    ->whereOr('model','in',$code)
    ->whereOr('ordernum','in',$code)
    ->where('status',0)
    ->paginate(10,false,['query' => request()->param()]);

      $currentPage=$list->currentPage(); 
      $page=$list->render();  
   // 把分页数据赋值给模板变量list
    $this->assign (array('count'=>$count,'list'=> $list,'currentPage'=>$currentPage,'page'=>$page));
	return $this->fetch();

	}






//多条码查询模块-----------------------
	public function batchQuery(){
		if(request()->isGet()){
		$code=input('get.code');
    $groupCode = explode("\r\n",$code);
    
		
	}
	else{
		$groupCode='';
	}
	
	//计算总页面
	$count = Db::table('thk') 
   ->where('code','in',$groupCode)
    ->where('status',0)
    ->count();
    $this->assign('count', $count);
    //查询并分页

   $list =
   	Db::table('thk')     
    ->where('code','in',$groupCode)
    ->where('status',0) 
    ->paginate(10,false,['query' => request()->param()]);
   // 把分页数据赋值给模板变量list
      $currentPage=$list->currentPage(); 
      $page=$list->render();  
   // 把分页数据赋值给模板变量list
    $this->assign (array('count'=>$count,'list'=> $list,'currentPage'=>$currentPage,'page'=>$page));
		return $this->fetch('');
	}

  //母胎入库模块-------------------------

	public function wareHousing(){
        if(request()->isGet()){
    $code=input('get.code');
    $groupCode = explode("\r\n",$code);
    
    
  }
  else{
    $groupCode='';
  }
  
  //计算总页面
  $count = Db::table('cpck') 
   ->where('code','in',$groupCode)
    ->where('status',0)
    ->count();
 
    //查询并分页

   $list =
    Db::table('cpck')     
    ->where('code','in',$groupCode)
    ->where('status',0) 
    ->paginate(10,false,['query' => request()->param()]);
    $currentPage=$list->currentPage(); 
    $page=$list->render();  
   // 把分页数据赋值给模板变量list
    Session::set('groupCode',$groupCode);
    $this->assign (array('count'=>$count,'list'=> $list,'currentPage'=>$currentPage,'page'=>$page));
    
		return $this->fetch('');

	}

  public function wareHousingResult(){
      $rkdate=input('request.rkdate'); 
      $reason=input('request.reason'); 
      $groupCode=Session::get('groupCode');
        
      $data=Db::table('cpck')
      ->where('code','in',$groupCode)
      ->where('status',0)    
      ->select();
      Db::name('thk')->insertAll($data);      
      Db::table('thk')
      ->where('code','in',$groupCode)   
      ->update(['rkdate'=>$rkdate,'reason'=>$reason]);
      Db::table('cpck')
      ->where('code','in',$groupCode)
      ->update(['status'=>'1']);

      return alert_success('入库成功','wareHousing');

}
}