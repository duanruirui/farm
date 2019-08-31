<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$template = "web/admin";

if($_GPC['op']=='add'){
    $template = "web/adminadd";
}elseif($_GPC['op']=='save'){
    $data['uid']=$_GPC['uid'];

    $data['time']=time();
    if($_GPC['id']==''){
        $data['uniacid']=$_W['uniacid'];
        $res=pdo_insert('lhyzhnc_sun_admin',$data);
        if($res){
            message('添加成功',$this->createWebUrl('admin'),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_admin', $data, array('id' => $_GPC['id']));
        if($res){
            message('修改成功',$this->createWebUrl('admin'),'success');
        }else{
            message('修改失败','','error');
        }
    }
}elseif($_GPC['op']=='edit'){
    $id=intval($_GPC['id']);
    // $info=pdo_get('lhyzhnc_sun_admin',array('uniacid'=>$_W['uniacid'],'id'=>$id));
    $info=pdo_fetch("select a.*,b.name from " . tablename("lhyzhnc_sun_admin") ."a left join ".tablename('lhyzhnc_sun_user')."b on b.id = a.uid where a.id =$id and a.uniacid=".$_W['uniacid']);

    $template = "web/adminadd";
}elseif($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_admin',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('admin'), 'success');
    }else{
        message('删除失败！','','error');
    }
}elseif($_GPC['op']=='search'){
    $name=$_GPC['name'];
    $where=" WHERE uniacid=".$_W['uniacid'];
    $sql="select id,openid,name as uname from " . tablename("lhyzhnc_sun_user") ." ".$where." and name like'%".$name."%' ";
    $list=pdo_fetchall($sql);
    echo json_encode($list);
    exit();
}
else{
    $data[':uniacid']=$_W['uniacid'];
    $where=" WHERE a.uniacid=".$_W['uniacid'];
    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select a.*,b.openid,b.name from " . tablename("lhyzhnc_sun_admin") ."a left join ".tablename('lhyzhnc_sun_user')."b on b.id = a.uid".$where." order by a.id desc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_admin") ."a left join ".tablename('lhyzhnc_sun_user')."b on b.id = a.uid ".$where." order by a.id desc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    foreach ($list as $key => $value) {
        $list[$key]['time']=date('Y-m-d H:i:s',$value['time']);
    }
    $pager = pagination($total, $pageindex, $pagesize);

}

include $this->template($template);