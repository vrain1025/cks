<?php

namespace app\index\controller;

use app\index\controller\Base;
use think\Request;
use think\Db;
use \think\Session;

class Index extends Base
{
    public function index()
    {
        $beginLastweek = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - date('w') + 1 - 7, date('Y')));
        $endLastweek = date('Y-m-d', mktime(23, 59, 59, date('m'), date('d') - date('w') + 7 - 7, date('Y')));

        $countmtklw = Db::name('mtk')
            ->whereTime('rkdate', 'between', [$beginLastweek, $endLastweek])
            ->where('status', '0')
            ->count();
        $countmtk = Db::table('mtk')->where('status', 0)->order('id asc')->count();
        $countbcpk = Db::table('bcpk')->where('status', 0)->order('id asc')->count();
        $countcpk = Db::table('cpk')->where('status', 0)->order('id asc')->count();
        $countcpck = Db::table('cpck')->where('status', 0)->order('id asc')->count();
        $countmtkb = $countmtk / ($countbcpk + $countcpk + $countmtk) * 100;
        $countbcpkb = $countbcpk / ($countbcpk + $countcpk + $countmtk) * 100;
        $countcpkb = $countcpk / ($countbcpk + $countcpk + $countmtk) * 100;
        $countcpckb = $countcpck / ($countbcpk + $countcpk + $countmtk) * 100;
        $zkc = $countmtk + $countbcpk + $countcpk;
        $zcountmtk = Db::table('mtk')
            ->field('ordernum,model,figure,tp,count(model) as cnt')
            ->where('status', 0)
            ->group('ordernum')
            ->order('cnt')
            ->select();
        $zcountbcpk = Db::table('bcpk')
            ->field('ordernum,model,figure,tp,count(model) as cnt')
            ->where('status', 0)
            ->group('ordernum')
            ->order('cnt')
            ->select();
        $zh = array_merge($zcountmtk, $zcountbcpk);

        //三仓汇总开始
        $zhlist=Db::query("select mtk.ordernum,mtk.model,mtk.tp,mtk.figure,
        count(mtk.ordernum)  +(select count(1) from cpk where cpk.ordernum=mtk.ordernum AND `status`=0)+
        (select count(1) from bcpk where bcpk.ordernum=mtk.ordernum AND `status`=0) AS cnt from  mtk WHERE `status`=0
        group by mtk.ordernum, mtk.model");
       

        //三仓汇总结束

        $this->assign(array('zkc' => $zkc, 'countmtk' => $countmtk, 'countmtkb' => $countmtkb, 'countbcpkb' => $countbcpkb, 'countcpkb' => $countcpkb, 'countcpckb' => $countcpckb, 'countbcpk' => $countbcpk, 'countcpk' => $countcpk,'zhlist' => $zhlist,'yjlist' => $zhlist, 'qhlist' => $zhlist, 'countcpck' => $countcpck));
        return $this->fetch('index');
    }
}
