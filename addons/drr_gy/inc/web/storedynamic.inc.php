<?php

global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();


$where = " WHERE  a.uniacid=:uniacid and b.uniacid=:uniacid";
$data[':uniacid']=$_W['uniacid'];
if(!empty($_GPC['keywords'])){
    $op=$_GPC['keywords'];
    $where .=" and b.storename LIKE concat('%', :name,'%') ";
    $data[':name']=$op;
}
if(!empty($_GPC['status'])){
    $status=$_GPC['status'];
    $where.=" and a.status = :status";
    $data[':status']=$status;

}

// p($data);
// $state=$_GPC['state'];
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$type=isset($_GPC['type'])?$_GPC['type']:'all';

$sql="SELECT a.*,b.`storename` FROM ".tablename('lhyzhnc_sun_storedynamic')."a left join ".tablename('lhyzhnc_sun_store')."b on b.id = a.sid ".$where." ORDER BY b.sort asc";
$total=pdo_fetchcolumn("select count(*) from " .tablename('lhyzhnc_sun_storedynamic')."a left join ".tablename('lhyzhnc_sun_store')."b on b.id = a.sid ".$where,$data);

$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;

$list=pdo_fetchall($select_sql,$data);


$pager = pagination($total, $pageindex, $pagesize);


if($_GPC['op']=='delete'){
    // $sid=$_GPC['sid'];
    $res=pdo_delete('lhyzhnc_sun_storedynamic',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('storedynamic',array()), 'success');
    }else{
        message('删除失败！','','error');
    }
}

if($_GPC['op']=='tg'){
    // $sid=$_GPC['sid'];

    $res=pdo_update('lhyzhnc_sun_storedynamic',array('status'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('操作成功',$this->createWebUrl('storedynamic',array()),'success');
    }else{
        message('操作失败','','error');
    }
}
if($_GPC['op']=='jj'){
    // $sid=$_GPC['sid'];

    $res=pdo_update('lhyzhnc_sun_storedynamic',array('status'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('操作成功',$this->createWebUrl('storedynamic',array()),'success');
    }else{
        message('操作失败','','error');
    }
}
include $this->template('web/storedynamic');