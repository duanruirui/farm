<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$template = "web/message";

if($_GPC['op']=='pass'){
    $res=pdo_update('lhyzhnc_sun_message',array('status'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('通过成功！', $this->createWebUrl('message'), 'success');
    }else{
        message('通过失败！','','error');
    }
}elseif($_GPC['op']=='nopass'){
    $res=pdo_update('lhyzhnc_sun_message',array('status'=>3),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('拒绝成功！', $this->createWebUrl('message'), 'success');
    }else{
        message('拒绝失败！','','error');
    }
}
elseif($_GPC['op']=='pass1'){
    $res=pdo_update('lhyzhnc_sun_message',array('isrecommend'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('message'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='nopass1'){
    $res=pdo_update('lhyzhnc_sun_message',array('isrecommend'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('message'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='pass2'){
    $res=pdo_update('lhyzhnc_sun_message',array('comment'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('message'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='nopass2'){
    $res=pdo_update('lhyzhnc_sun_message',array('comment'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('message'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_message',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('message'), 'success');
    }else{
        message('删除失败！','','error');
    }
}else{

    $where=" WHERE uniacid=".$_W['uniacid'];
    $data[':uniacid']=$_W['uniacid'];
    $pageindex = max(1, intval($_GPC['page']));
    $type=isset($_GPC['type'])?$_GPC['type']:'all';
    if($_GPC['status']){
        $status=$_GPC['status'];
        $data[':status']=$status;
        
        $where .=" and status={$_GPC['status']} ";
    }
    $pagesize=10;
    // $sql="select s.*,b.storename,g.gname from " . tablename("lhyzhnc_sun_message") ." as s left join " . tablename("lhyzhnc_sun_store") ." as b on b.id=s.sid left join " . tablename("lhyzhnc_sun_goods") ." as g on g.gid=s.gid ".$where." order by s.id desc ";
    // $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_message") . " as s left join " . tablename("lhyzhnc_sun_store") ." as b on b.id=s.sid " .$where." order by s.id desc ",$data);
    $sql="select * from " . tablename("lhyzhnc_sun_message").$where." order by sort asc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_message").$where." order by sort asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);

    $pager = pagination($total, $pageindex, $pagesize);
}

include $this->template($template);