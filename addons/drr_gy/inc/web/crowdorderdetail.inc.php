<?php

global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
// $orderNum=$_GPC['orderNum'];
$ordernum=$_GPC['ordernum'];
$uniacid=$_W['uniacid'];
$data[':ordernum']=$ordernum;

$crowd=pdo_fetch("SELECT b.name,c.name as uname  FROM ".tablename('lhyzhnc_sun_crowdorder') .  " a"  . " left join " . tablename("lhyzhnc_sun_crowd")."b on a.cid = b.id left join ".tablename('lhyzhnc_sun_user') ."c on c.id = a.uid where a.ordernum = $ordernum and a.uniacid = $uniacid and b.uniacid = $uniacid and c.uniacid=$uniacid ");

$where = " WHERE  a.uniacid=:uniacid and a.ordernum=:ordernum and b.uniacid=:uniacid";

$data[':uniacid']=$_W['uniacid'];

$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$type=isset($_GPC['type'])?$_GPC['type']:'all';

$sql="SELECT a.*,b.`storename` FROM ".tablename('lhyzhnc_sun_choosestore')."a left join ".tablename('lhyzhnc_sun_store')."b on b.id = a.sid ".$where." ORDER BY a.id asc";


$total=pdo_fetchcolumn("select count(*) from " .tablename('lhyzhnc_sun_choosestore')."a left join ".tablename('lhyzhnc_sun_store')."b on b.id = a.sid ".$where,$data);

$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;

$list=pdo_fetchall($select_sql,$data);
foreach ($list as $key => $value) {
    $list[$key]['time']=date("Y-m-d H:i:s",$value['time']);
    // $list[$key]['erweima']= $this->scerweima($value['ear']);

}

$pager = pagination($total, $pageindex, $pagesize);

if($_GPC['op']=='sc'){
    $res=$this->scerweima($_GPC['ear']);
    // message('操作成功',$this->createWebUrl('crowdorderdetail',array('ordernum'=>$aid['ordernum'])),'success');
    // p($res);
}




include $this->template('web/crowdorderdetail');