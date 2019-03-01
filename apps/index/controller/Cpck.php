<?php

namespace app\index\controller;

use app\index\controller\Base;
use think\Request;
use think\Db;
use \think\Session;

class Cpck extends Base
{
    public function index()
    {
        $count = Db::table('cpck')->where('status', 0)->order('id asc')->count();//计算总页面
        $this->assign('count', $count);
        if (request()->isPost()) {
            $px = input('request.px');
        } else {
            $px = '';
        }
        if ($px == '') {

            $list =
                Db::table('cpck')
                    ->field('ordernum,model,figure,tp,count(model) as cnt')
                    ->where('status', 0)
                    ->group('ordernum')
                    ->paginate(10);
        } else {
            $list = Db::table('cpck')
                ->field('ordernum,model,figure,tp,count(model) as cnt')
                ->where('status', 0)
                ->order('cnt', $px)
                ->group('ordernum')
                ->paginate(10);
        }


        // 把分页数据赋值给模板变量list
        $this->assign(array('list' => $list, 'px' => $px));
// 渲染模板输出
        return $this->fetch();
    }


//单条码查询系统 -----------------------------
    public function query()
    {

        if (request()->isGet()) {
            $code = input('get.code');
        } else {
            $code = '';
        }

        //计算总页面
        $count = Db::table('cpck')
            ->where('status', 0)
            ->whereOr('code', 'in', $code)
            ->whereOr('model', 'in', $code)
            ->whereOr('ordernum', 'in', $code)
            ->count();
        $this->assign('count', $count);
        //查询并分页

        $list =
            Db::table('cpck')
                ->where('status', 0)
                ->whereOr('code', 'in', $code)
                ->whereOr('model', 'in', $code)
                ->whereOr('ordernum', 'in', $code)
                ->paginate(10, false, ['query' => request()->param()]);

        $currentPage = $list->currentPage();
        $page = $list->render();
        // 把分页数据赋值给模板变量list
        $this->assign(array('count' => $count, 'list' => $list, 'currentPage' => $currentPage, 'page' => $page));
        return $this->fetch();

    }


//多条码查询模块-----------------------
    public function batchQuery()
    {
        if (request()->isGet()) {
            $code = input('get.code');
            $groupCode = explode("\r\n", $code);


        } else {
            $groupCode = '';
        }

        //计算总页面
        $count = Db::table('cpck')
            ->where('status', 0)
            ->where('code', 'in', $groupCode)
            ->count();
        $this->assign('count', $count);
        //查询并分页

        $list =
            Db::table('cpck')
                ->where('status', 0)
                ->where('code', 'in', $groupCode)
                ->paginate(10, false, ['query' => request()->param()]);
        // 把分页数据赋值给模板变量list
        $currentPage = $list->currentPage();
        $page = $list->render();
        // 把分页数据赋值给模板变量list
        $this->assign(array('count' => $count, 'list' => $list, 'currentPage' => $currentPage, 'page' => $page));
        return $this->fetch('');
    }

    //成品出库模块-------------------------

    public function wareHousing()
    {
        if (request()->isGet()) {
            $code = input('get.code');
            $groupCode = explode("\r\n", $code);


        } else {
            $groupCode = '';
        }

        //计算总页面
        $count = Db::table('cpk')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->count();

        //查询并分页

        $list =
            Db::table('cpk')
                ->where('code', 'in', $groupCode)
                ->where('status', 0)
                ->paginate(10, false, ['query' => request()->param()]);
        $currentPage = $list->currentPage();
        $page = $list->render();
        // 把分页数据赋值给模板变量list
        Session::set('groupCode', $groupCode);
        $this->assign(array('count' => $count, 'list' => $list, 'currentPage' => $currentPage, 'page' => $page));

        return $this->fetch('');

    }

    public function wareHousingResult()
    {
        if (request()->isGet()) {
            $dls = input('request.dls');
            $ddnum = input('request.ddnum');
            $fhdate = input('request.fhdate');
            $shname = input('request.shname');
            $shphone = input('request.shphone');
            $shaddr = input('request.shaddr');
            $fhgly = input('request.fhgly');
        } else {
            $dls = '';
            $ddnum = '';
            $fhdate = '';
            $shname = '';
            $shphone = '';
            $shaddr = '';
            $fhgly = '';
        }
        $groupCode = Session::get('groupCode');

        $data = Db::table('cpk')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->select();
        Db::name('cpck')->insertAll($data);
        Db::table('cpck')
            ->where('code', 'in', $groupCode)
            ->update(['dls' => $dls, 'ddnum' => $ddnum, 'fhdate' => $fhdate, 'shname' => $shname, 'shphone' => $shphone, 'shaddr' => $shaddr, 'fhgly' => $fhgly]);
        Db::table('cpk')
            ->where('code', 'in', $groupCode)
            ->update(['status' => '1']);

        return alert_success('出库成功', 'wareHousing');

    }

//成品出库信息查询
    public function outBound()
    {


        if (request()->isGet()) {
            $code = input('get.code');
            $dls = input('get.dls');
            $ddnum = input('get.ddnum');
            $fhdate = input('get.fhdate');
            $shname = input('get.shname');
            $shphone = input('get.shphone');
            $shaddr = input('get.shaddr');
            $fhgly = input('get.fhgly');
        } else {
            $code = '';
            $dls = '';
            $ddnum = '';
            $fhdate = '';
            $shname = '';
            $shphone = '';
            $shaddr = '';
            $fhgly = '';
        }

        //计算总页面
        $count = Db::table('cpck')
            ->whereOr('code', 'in', $code)
            ->whereOr('dls', 'in', $dls)
            ->whereOr('ddnum', 'in', $ddnum)
            ->whereOr('fhdate', 'in', $fhdate)
            ->whereOr('shname', 'in', $shname)
            ->whereOr('shphone', 'in', $shphone)
            ->whereOr('shname', 'like', $shaddr)
            ->whereOr('shphone', 'in', $shphone)
            ->where('status', 1)
            ->count();
        $this->assign('count', $count);
        //查询并分页

        $list =
            Db::table('cpck')
                ->whereOr('code', 'in', $code)
                ->whereOr('dls', 'in', $dls)
                ->whereOr('ddnum', 'in', $ddnum)
                ->whereOr('fhdate', 'in', $fhdate)
                ->whereOr('shname', 'in', $shname)
                ->whereOr('shphone', 'in', $shphone)
                ->whereOr('shname', 'like', $shaddr)
                ->whereOr('shphone', 'in', $shphone)
                ->where('status', 1)
                ->paginate(10, false, ['query' => request()->param()]);

        $currentPage = $list->currentPage();
        $page = $list->render();


        //加载代理商信息
        $dls = Db::table('dls')
            ->select();
        if(Request::instance()->isPost()){
//获取楼号
            $data=$request->post();
            $dlsName=$data['dls'];
            $ss=Db::table('dls')
                ->where(['dls'=>$dlsName])
                ->select();
//二级联动
            $opt = '<input type="text" class="form-control mx-3" placeholder="请输收货人姓名"  id="ss"
                name="shname" value="" >';
            foreach($ss as $key=>$val){
                $opt .= "<input type='text' class='form-control mx-3' placeholder='请输收货人姓名'  id='ss'
                name='shname' value='{$val['contacts1']}' >";
            }
            dump($opt);die;
            echo json_encode($opt);
//选择栋数
        }else{
            $this->assign('dls',$dls);

        }

        // 把分页数据赋值给模板变量list
        $this->assign(array('count' => $count, 'list' => $list, 'currentPage' => $currentPage, 'page' => $page));

        return $this->fetch();

    }
        public function export()
    {
        $head = '成品出库名细表';
        $excel = new Excel();
        $groupCode = Session::get('groupCode');
        $data = Db::table('cpk')
            ->field('id,ordernum,model,figure,tp,code,pd')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->select();

        $key = ['商品ID', '商品编码', '产品型号', '花纹', '规格', '条形码', '母胎日期'];

        $excel->outdata('订单表', $data, $head, $key);
        return alert_success('导出成功', 'wareHousing');

    }


}
