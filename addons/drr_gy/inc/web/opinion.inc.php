<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

if($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_opinion',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('opinion'), 'success');
    }else{
        message('删除失败！','','error');
    }
}else if($_GPC['op']=='reply'){
    $id=$_GPC['id'];

    $data1['reply']=$_GPC['reply'];
    $data1['replytime']=time();
    $data1['status']=2;
    // p($_GPC);
    $res=pdo_update('lhyzhnc_sun_opinion',$data1,array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['id']));
    if($res){
        $result=pdo_update('lhyzhnc_sun_user',array('hongdian'=>1),array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['uid']));
        
        message('回复成功！', $this->createWebUrl('opinion'), 'success');
    }else{
        message('回复失败！','','error');
    }
}else if($_GPC['op']=='call'){

    // $data1['reply']=$_GPC['reply'];
    $data2['replytime']=time();
    $data2['status']=2;
    // p($_GPC);
    $res=pdo_update('lhyzhnc_sun_opinion',$data2,array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['id']));
    if($res){
        $result=pdo_update('lhyzhnc_sun_user',array('hongdian'=>1),array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['uid']));
        message('修改成功！', $this->createWebUrl('opinion'), 'success');
    }else{
        message('修改失败！','','error');
    }
}else{
    $where=" WHERE a.uniacid=:uniacid ";
    if($_GPC['keywords']){
        $op=$_GPC['keywords'];
        $where .=" and a.question LIKE concat('%', :name,'%') ";
        $data[':name']=$op;
    }
    if($_GPC['status']){
        $status=$_GPC['status'];
        $data[':status']=$status;
        $where .=" and a.status =:status ";
    }

    $type=isset($_GPC['type'])?$_GPC['type']:'all';
    $data[':uniacid']=$_W['uniacid'];

    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select a.*,b.name from " . tablename("lhyzhnc_sun_opinion"). "a left join  ".tablename('lhyzhnc_sun_user')."b on b.id = a.uid ".$where." order by a.status asc,a.replytime asc ";
    $total=pdo_fetchcolumn("select count(*) from " . tablename("lhyzhnc_sun_opinion"). "a left join  ".tablename('lhyzhnc_sun_user')."b on b.id = a.uid ".$where,$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    foreach ($list as $key => $value) {
        $list[$key]['time']=date('Y-m-d H:i:s',$value['time']);
        if($value['replytime']){
        $list[$key]['replytime']=date('Y-m-d H:i:s',$value['replytime']);
        }
    }
    $pager = pagination($total, $pageindex, $pagesize);
}
include $this->template('web/opinion');