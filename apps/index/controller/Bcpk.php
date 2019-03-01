<?php

namespace app\index\controller;

use app\index\controller\Base;
use think\Request;
use think\Db;
use \think\Session;


class Bcpk extends Base
{
    public function index()
    {
        if (request()->isGet()) {
            $px = input('request.px');

            $count = Db::table('bcpk')->where('status', 0)->order('id asc')->count();//计算总页面
            $this->assign('count', $count);
            if ($px == '') {
                $list =
                    Db::table('bcpk')
                        ->field('ordernum,model,figure,tp,count(model) as cnt')
                        ->group('ordernum')
                        ->where('status', 0)
                        ->paginate(10);
            } else {

                $list =
                    Db::table('bcpk')
                        ->field('ordernum,model,figure,tp,count(model) as cnt')
                        ->order('cnt', $px)
                        ->group('ordernum')
                        ->where('status', 0)
                        ->paginate(10, false, ['query' => request()->param()]);
            }
        } else {
            $px = '';
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
        $count = Db::table('bcpk')
            ->where('status', 0)
            ->where('code|ordernum|model', 'in', $code)
            ->count();
        $this->assign('count', $count);
        //查询并分页

        $list =
            Db::table('bcpk')
                ->where('status', 0)
                ->where('code|ordernum|model', 'in', $code)
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
        $count = Db::table('bcpk')
            ->where('status', 0)
            ->where('code', 'in', $groupCode)
            ->count();
        $this->assign('count', $count);
        //查询并分页

        $list =
            Db::table('bcpk')
                ->where('status', 0)
                ->where('code', 'in', $groupCode)
                ->paginate(10, false, ['query' => request()->param()]);
        // 把分页数据赋值给模板变量list
        $currentPage = $list->currentPage();
        $page = $list->render();
        // 把分页数据赋值给模板变量list
        Session::set('groupCode', $groupCode);
        $this->assign(array('count' => $count, 'list' => $list, 'currentPage' => $currentPage, 'page' => $page));
        return $this->fetch('');
    }
    public function exportbcp()
    {
        $head = '半成品名细表';
        $excel = new Excel();
        $groupCode = Session::get('groupCode');
        $data = Db::table('bcpk')
            ->field('id,ordernum,model,figure,tp,code,pd')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->select();

        $key = ['商品ID', '商品编码', '产品型号', '花纹', '规格', '条形码', '母胎日期'];

        $excel->outdata('订单表', $data, $head, $key);
        return alert_success('导出成功', 'wareHousing');

    }
    //半成品入库模块-------------------------

    public function wareHousing()
    {
        if (request()->isGet()) {
            $code = input('get.code');
            $groupCode = explode("\r\n", $code);


        } else {
            $groupCode = '';
        }

        //计算总页面
        $count = Db::table('mtk')
            ->where('status', 0)
            ->where('code', 'in', $groupCode)
            ->count();

        //查询并分页

        $list =
            Db::table('mtk')
                ->where('status', 0)
                ->where('code', 'in', $groupCode)
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
            $workshop = input('request.workshop');
            $pdline = input('request.pdline');
            $lyr = input('request.lyr');
            $lydate = input('request.lydate');
            $lybc = input('request.lybc');

        } else {
            $workshop = '';
            $pdline = '';
            $lyr = '';
            $lydate = '';
            $lybc = '';
        }

        $groupCode = Session::get('groupCode');

        $data = Db::table('mtk')
            ->field('id,ordernum,model,figure,tp,code,pd')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->select();
        Db::name('bcpk')->insertAll($data);
        Db::table('bcpk')
            ->where('code', 'in', $groupCode)
            ->update(['workshop' => $workshop, 'pdline' => $pdline, 'lyr' => $lyr, 'lydate' => $lydate, 'lybc' => $lybc,'status' => 0 ]);
        Db::table('mtk')
            ->where('code', 'in', $groupCode)
            ->update(['status' => '1']);

        return alert_success('入库成功', 'wareHousing');

    }

    public function export()
    {
        $head = '半成品名细表';
        $excel = new Excel();
        $groupCode = Session::get('groupCode');
        $data = Db::table('mtk')
            ->field('id,ordernum,model,figure,tp,code,pd')
            ->where('code', 'in', $groupCode)
            ->where('status', 0)
            ->select();

        $key = ['商品ID', '商品编码', '产品型号', '花纹', '规格', '条形码', '母胎日期'];

        $excel->outdata('订单表', $data, $head, $key);
        return alert_success('导出成功', 'wareHousing');

    }
}