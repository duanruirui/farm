<?php

global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
// $id=$_GPC['id'];
$id=$_GPC['id'];
$uniacid=$_W['uniacid'];
$data[':id']=$id;
$store=pdo_get('lhyzhnc_sun_store',array("uniacid"=>$_W['uniacid'],'id'=>$id));
$crowd=pdo_get('lhyzhnc_sun_crowd',array('uniacid'=>$_W['uniacid'],'status'=>2),array('id'));
$cid=$crowd['id'];
// $crowd=pdo_fetch("SELECT b.name,c.name as uname  FROM ".tablename('lhyzhnc_sun_choosestore') .  " a"  . " left join " . tablename("lhyzhnc_sun_crowd")."b on a.cid = b.id left join ".tablename('lhyzhnc_sun_user') ."c on c.id = a.uid where a.id = $id and a.uniacid = $uniacid and b.uniacid = $uniacid and c.uniacid=$uniacid ");

$where = " WHERE  a.uniacid=:uniacid and b.sid=:id and b.uniacid=:uniacid and a.cid=$cid and c.uniacid=:uniacid";
if($_GPC['keywords']){
    $op=$_GPC['keywords'];
    $where .=" and c.name LIKE concat('%', :name,'%') ";
    $data[':name']=$op;
}
if($_GPC['ear']){
    $ear=$_GPC['ear'];
    $where .=" and b.ear LIKE concat('%', :ear,'%') ";
    $data[':ear']=$ear;
}
$data[':uniacid']=$_W['uniacid'];

$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$type=isset($_GPC['type'])?$_GPC['type']:'all';


// $sql="SELECT a.*,b.`name` FROM ".tablename('lhyzhnc_sun_choosestore')."a left join ".tablename('lhyzhnc_sun_user')."b on b.id = a.uid ".$where." ORDER BY a.id asc";
$sql='select b.*,c.name from '.tablename('lhyzhnc_sun_crowdorder')."a left join ".tablename('lhyzhnc_sun_choosestore')."b on b.ordernum=a.ordernum left join ".tablename('lhyzhnc_sun_user')."c on c.id = b.uid ".$where ." order by b.id asc ";

// p($sql);
$total=pdo_fetchcolumn("select count(*) from " .tablename('lhyzhnc_sun_crowdorder')."a left join ".tablename('lhyzhnc_sun_choosestore')."b on b.ordernum=a.ordernum left join ".tablename('lhyzhnc_sun_user')."c on c.id = b.uid ".$where,$data);

$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;

$list=pdo_fetchall($select_sql,$data);
// p($list);
// foreach ($list as $key => $value) {
//     $list[$key]['time']=date("Y-m-d H:i:s",$value['time']);
//     // $list[$key]['erweima']= $this->scerweima($value['ear']);

// }

$pager = pagination($total, $pageindex, $pagesize);

include $this->template('web/storeorderinfo');