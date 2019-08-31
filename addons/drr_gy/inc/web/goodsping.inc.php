<?php

global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
// $orderNum=$_GPC['orderNum'];
$gid=$_GPC['gid'];
$data[':gid']=$gid;

$goods=pdo_get('lhyzhnc_sun_goods',array('uniacid'=>$_W['uniacid'],'id'=>$gid));

// p($id);
$where = " WHERE  a.uniacid=:uniacid and a.gid=:gid and b.uniacid=:uniacid";
// $where = " WHERE  a.uniacid=".$_W['uniacid'] . ' and a.orderNum='.$orderNum;
$data[':uniacid']=$_W['uniacid'];

if(!empty($_GPC['keywords'])){
    $op=$_GPC['keywords'];
    $where .=" and b.name LIKE concat('%', :name,'%') ";
    $data[':name']=$op;
}

if(!empty($_GPC['status'])){
    $status=$_GPC['status'];
    $where.=" and a.status = :status";
    $data[':status']=$status;

}
if(!empty($_GPC['state1'])){
    $state1=$_GPC['state1'];
    $where.=" and a.state = :state1";
    $data[':state1']=$state1;

}
// p($data);
$state=$_GPC['state'];
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$type=isset($_GPC['type'])?$_GPC['type']:'all';

// $sql="SELECT a.`id`,a.`orderNum`,a.`status`,a.`time`,b.`name` FROM ".tablename('lhyzhnc_sun_sijiaoappointment')."a left join ".tablename('lhyzhnc_sun_mall')."b on b.id = a.mid ".$where." ORDER BY a.status asc";
// p($sql);
$sql="SELECT a.*,b.`name` FROM ".tablename('lhyzhnc_sun_goodsping')."a left join ".tablename('lhyzhnc_sun_user')."b on b.id = a.uid ".$where." ORDER BY a.status asc";
// p($sql);

$total=pdo_fetchcolumn("select count(*) from " .tablename('lhyzhnc_sun_goodsping')."a left join ".tablename('lhyzhnc_sun_user')."b on b.id = a.uid ".$where,$data);
// $total=pdo_fetchcolumn("select count(*) from " .tablename('lhyzhnc_sun_sijiaoappointment')."a left join ".tablename('lhyzhnc_sun_mall')."b on b.id = a.mid ".$where,$data);

$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;

$list=pdo_fetchall($select_sql,$data);
foreach ($list as $key => $value) {
    $list[$key]['time']=date("Y-m-d H:i:s",$value['time']);
    $list[$key]['zan']=pdo_get('lhyzhnc_sun_goodszan',array('uniacid'=>$_W['uniacid'],'gpid'=>$value['id']),array('count(id) as count'))['count'];
}

$pager = pagination($total, $pageindex, $pagesize);


if($_GPC['op']=='delete'){
    $gid=$_GPC['gid'];
    $res=pdo_delete('lhyzhnc_sun_goodsping',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('goodsping',array('gid'=>$gid)), 'success');
    }else{
        message('删除失败！','','error');
    }
}

if($_GPC['op']=='tg'){
    $gid=$_GPC['gid'];

    $res=pdo_update('lhyzhnc_sun_goodsping',array('status'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('操作成功',$this->createWebUrl('goodsping',array('gid'=>$gid)),'success');
    }else{
        message('操作失败','','error');
    }
}
if($_GPC['op']=='jj'){
    $gid=$_GPC['gid'];

    $res=pdo_update('lhyzhnc_sun_goodsping',array('status'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('操作成功',$this->createWebUrl('goodsping',array('gid'=>$gid)),'success');
    }else{
        message('操作失败','','error');
    }
}
if($_GPC['op']=='tj'){
    $gid=$_GPC['gid'];
    $ping=pdo_get('lhyzhnc_sun_goodsping',array('uniacid'=>$_W['uniacid'],'state'=>2), array('count(id) as count'));
    if($ping['count']>=3){
        message('操作失败,当前已推荐三个评论！','','error');
    }else{
        $res=pdo_update('lhyzhnc_sun_goodsping',array('state'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('操作成功',$this->createWebUrl('goodsping',array('gid'=>$gid)),'success');
        }else{
            message('操作失败','','error');
        }
    }
}
if($_GPC['op']=='qx'){
    $gid=$_GPC['gid'];

    $res=pdo_update('lhyzhnc_sun_goodsping',array('state'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('操作成功',$this->createWebUrl('goodsping',array('gid'=>$gid)),'success');
    }else{
        message('操作失败','','error');
    }
}



include $this->template('web/goodsping');