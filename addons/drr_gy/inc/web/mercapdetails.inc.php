<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

if($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_mercapdetails',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('mercapdetails'), 'success');
    }else{
        message('删除失败！','','error');
    }
}else{
    $where=" WHERE uniacid=:uniacid ";
    $keyword = $_GPC['keyword'];
    if($_GPC['keyword']){
        $op=$_GPC['keyword'];
        $where.=" and bname LIKE  '%$op%'";
    }
    $type=isset($_GPC['type'])?$_GPC['type']:'all';
    if($_GPC["type"]=='s'){
        $status = intval($_GPC['status']);
        if($status!=999){
            $where .= " and mcd_type=:status ";
            $data[':status']=$status;
        }
    }else{
        $status = 999;
    }
    $data[':uniacid']=$_W['uniacid'];

    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from " . tablename("lhyzhnc_sun_mercapdetails") ." ".$where." order by id desc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_mercapdetails") . " " .$where." ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    $pager = pagination($total, $pageindex, $pagesize);

    //提现方式
    $widthdraw = array("","订单收入","提现","线下付款");
}
include $this->template('web/mercapdetails');