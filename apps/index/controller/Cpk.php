<?php

namespace app\index\controller;

use app\index\controller\Base;
use think\Request;
use think\Db;
use \think\Session;

class Cpk extends Base
{
    public function index()
    {
        $count = Db::table('cpk')->where('status', 0)->order('id asc')->count();//计算总页面
        $countyst = Db::table('cpk')->where('yst', 1)->order('id asc')->count();//计算总页面
        $countnoyst = Db::table('cpk')->where('yst', 0)->where('status', 0)->order('id asc')->count();//计算总页面
        if (request()->isGet()) {

            $px = input('request.px');


            if ($px == '') {
                $list =
                    Db::table('cpk')
                        ->field('ordernum,model,figure,tp,count(model) as cnt')
                        ->group('ordernum')
                        ->where('status', 0)
                        ->paginate(10, false, ['query' => request()->param()]);
            } else {
                $list = Db::table('cpk')
                    ->field('ordernum,model,figure,tp,count(model) as cnt')
                    ->group('ordernum')
                    ->order('cnt', $px)
                    ->where('status', 0)
                    ->paginate(10, false, ['query' => request()->param()]);
            }
        } else {
            $px = '';
        }
        // 把分页数据赋值给模板变量list
        $this->assign(array('count' => $count, 'countyst' => $countyst, 'countnoyst' => $countnoyst, 'list' => $list, 'px' => $px));
// 渲染模板输出
        return $this->fetch();
    }

//日报表模块 -----------------------------

    public function daliySheet()
    {

        $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
        $count = Db::table('cpk')->where('status', 0)->whereTime('create_time', 'between', [$beginToday, $endToday])->order('id asc')->count();//计算总页面
        $countyst = Db::table('cpk')->where('yst', 1)->where('status', 0)->whereTime('create_time', 'between', [$beginToday, $endToday])->order('id asc')->count();
        $countnoyst = $count - $countyst;

        if (request()->isPost()) {
            $px = input('request.px');
        } else {
            $px = '';
        }
        if ($px == '') {
            $list =
                Db::table('cpk')
                    ->whereTime('create_time', 'between', [$beginToday, $endToday])
                    ->where('status', 0)
                    ->order('ordernum', 'asc')
                    ->paginate(10, false, ['query' => request()->param()]);
        } else {
            Db::table('cpk')
                ->whereTime('create_time', 'between', [$beginToday, $endToday])
                ->where('status', 0)
                ->order('ordernum', $px)
                ->paginate(10, false, ['query' => request()->param()]);
        }

        $currentPage = $list->currentPage();
        $page = $list->render();
        // 把分页数据赋值给模板变量list
        $this->assign(array('count' => $count, 'countyst' => $countyst, 'countnoyst' => $countnoyst, 'list' => $list, 'currentPage' => $currentPage, 'page' => $page, 'px' => $px));


// 渲染模板输出
        return $this->fetch();
    }

//信息检索查询模块 -----------------------------
    public function query()
    {

        if (request()->isGet()) {
            $code = input('get.code');
            $yst = input('request.yst');
        } else {
            $code = '';
        }
        $key = '%' . $code . '%';
        //计算总页面
        if ($yst == 1) {


            $count = Db::table('cpk')
                ->where('yst', 1)
                ->where('status', 0)
                ->where('code|ordernum|model', 'in', $code)
                ->count();
            //查询并分页
            $list =
                Db::table('cpk')
                    ->where('yst', 1)
                    ->where('status', 0)
                    ->where('code|ordernum|model', 'in', $code)
                    ->paginate(10, false, ['query' => request()->param()]);
        } elseif ($yst == 0) {
            $count = Db::table('cpk')
                ->where('status', 0)
                ->where('yst', 0)                
                ->where('code|ordernum|model', 'in', $code)               
                ->count();

            //查询并分页

            $list =
                Db::table('cpk')
                    ->where('status', 0)
                    ->where('yst', 0)
                    ->where('status', 0)
                ->where('code|ordernum|model', 'in', $code)
                ->paginate(10, false, ['query' => request()->param()]);


        } else {
            $count = Db::table('cpk')
                ->where('status', 0)
                ->where('code|ordernum|model', 'in', $code)              
                ->count();

            //查询并分页

            $list =
                Db::table('cpk')
                ->where('status', 0)
                ->where('code|ordernum|model', 'in', $code)
                ->paginate(10, false, ['query' => request()->param()]);

        }


        $currentPage = $list->currentPage();
        $page = $list->render();
        // 把分页数据赋值给模板变量list
        $this->assign(array('count' => $count, 'list' => $list, 'currentPage' => $currentPage, 'page' => $page, 'yst' => $yst));
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
        $count = Db::table('cpk')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->count();
        $this->assign('count', $count);
        //查询并分页

        $list =
            Db::table('cpk')
                ->where('code', 'in', $groupCode)
                ->where('status', 0)
                ->paginate(10, false, ['query' => request()->param()]);
        // 把分页数据赋值给模板变量list
        $currentPage = $list->currentPage();
        $page = $list->render();
        // 把分页数据赋值给模板变量list
        Session::set('groupCode', $groupCode);
        $this->assign(array('count' => $count, 'list' => $list, 'currentPage' => $currentPage, 'page' => $page));
        return $this->fetch('');
    }

    public function exportcp()
    {
        $head = '成品库名细表';
        $excel = new Excel();
        $groupCode = Session::get('groupCode');
        $data = Db::table('cpk')
            ->field('id,ordernum,model,figure,tp,code,pd')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->select();

        $key = ['商品ID', '商品编码', '产品型号', '花纹', '规格', '条形码', '母胎日期', '胶号'];

        $excel->outdata('订单表', $data, $head, $key);
        return alert_success('导出成功', 'wareHousing');
    }

    //成品入库模块-------------------------

    public function wareHousing()
    {
        if (request()->isGet()) {
            $code = input('get.code');
            $groupCode = explode("\r\n", $code);


        } else {
            $groupCode = '';
        }

        //计算总页面
        $count = Db::table('bcpk')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->count();


        //查询并分页

        $list =
            Db::table('bcpk')
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
        $groupCode = Session::get('groupCode');
        if (request()->isGet()) {
            $rknum = input('request.rknum');
            $dglue = input('request.dglue');
            $glue = input('request.glue');
            $date = input('request.date');
            $ckgly = input('request.ckgly');
            $zjy = input('request.zjy');
            $yst = input('request.yst');
            $bc = input('request.bc');

        } else {
            $rknum = '';
            $dglue = '';
            $glue = '';
            $date = '';
            $ckgly = '';
            $zjy = '';
            $yst = '';
            $bc = '';
        }


        $groupCode = Session::get('groupCode');

        $data = Db::table('bcpk')
            ->field('id,ordernum,model,figure,tp,code,pd,workshop,pdline')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->select();
        Db::name('cpk')->insertAll($data);
        Db::table('cpk')
            ->where('code', 'in', $groupCode)
            ->update(['rknum' => $rknum, 'dglue' => $dglue, 'glue' => $glue, 'date' => $date, 'ckgly' => $ckgly, 'zjy' => $zjy, 'yst' => $yst, 'bc' => $bc,'status'=>0]);
        Db::table('bcpk')
            ->where('code', 'in', $groupCode)
            ->update(['status' => '1']);

        return alert_success('入库成功', 'wareHousing');
    }

    public function export()
    {
        $head = '成品库名细表';
        $excel = new Excel();
        $groupCode = Session::get('groupCode');
        $data = Db::table('bcpk')
            ->field('id,ordernum,model,figure,tp,code,pd')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->select();

        $key = ['商品ID', '商品编码', '产品型号', '花纹', '规格', '条形码', '母胎日期', '胶号'];

        $excel->outdata('订单表', $data, $head, $key);
        return alert_success('导出成功', 'wareHousing');

    }


}