<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

if($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_extendlist',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('extendlist'), 'success');
    }else{
        message('删除失败！','','error');
    }
}
else if($_GPC['op']=='clear'){
    $res=pdo_update('lhyzhnc_sun_extendlist',array('money'=>0),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('清空成功！', $this->createWebUrl('extendlist'), 'success');
    }else{
        message('清空失败！','','error');
    }
}else if($_GPC['op']=='sc'){
    $res=$this->GetwxCode($_GPC['id'],$_GPC['eid']);
    // message('操作成功',$this->createWebUrl('crowdorderdetail',array('ordernum'=>$aid['ordernum'])),'success');
    // p($res);
}
else{
    $where=" WHERE uniacid=".$_W['uniacid'];
    if($_GPC['keywords']){
        $op=$_GPC['keywords'];
        $where.=" and name LIKE  '%$op%'";
        $data[':name']=$op;
    }
$order=' order by id asc ';
    
    if($_GPC['op']=='commissiondao'){
        $op=$_GPC['op'];
        $order =" order by money desc";
        $data[':commissiondao']=$op;
    }
    if($_GPC['op']=='commissionzheng'){
        $op=$_GPC['op'];
        $order =" order by money asc";
        $data[':commissionzheng']=$op;
    }
    

    $type=isset($_GPC['type'])?$_GPC['type']:'all';
    $data[':uniacid']=$_W['uniacid'];

    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from" . tablename("lhyzhnc_sun_extendlist") .$where.$order;
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_extendlist") .$where." order by time asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    foreach ($list as $key => $value) {
        $list[$key]['time']=date('Y-m-d H:i:s',$value['time']);
    }
    $pager = pagination($total, $pageindex, $pagesize);
}
include $this->template('web/extendlist');