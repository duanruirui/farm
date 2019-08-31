<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

$template = "web/notice";

if($_GPC['op']=='add'){
    $template = "web/notice_add";
}elseif($_GPC['op']=='save'){
    $id=intval($_GPC['id']);

    $data['sort']=intval($_GPC['sort']);
    $data['text']=$_GPC['text'];
    if($id==0){
        $data['uniacid']=$_W['uniacid'];
        $data['status']=1;
        $res=pdo_insert('lhyzhnc_sun_notice',$data);
        if($res){
            message('添加成功',$this->createWebUrl('notice'),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_notice', $data, array('id' => $id));
        if($res){
            message('修改成功',$this->createWebUrl('notice'),'success');
        }else{
            message('修改失败','','error');
        }
    }
}elseif($_GPC['op']=='edit'){
    $id=intval($_GPC['id']);

    $info=pdo_get('lhyzhnc_sun_notice',array('uniacid'=>$_W['uniacid'],'id'=>$id));

    $template = "web/notice_add";
}elseif($_GPC['op']=='change'){
    $status = intval($_GPC["status"]);
    $id = intval($_GPC["id"]);
    $res = pdo_update('lhyzhnc_sun_notice', $data, array('uniacid' => $_W['uniacid'],'id' => $id));

    if($res){
        message('修改成功',$this->createWebUrl('notice'),'success');
    }else{
        message('修改失败','','error');
    }
    
}elseif($_GPC['op']=='pass'){
    $res=pdo_update('lhyzhnc_sun_notice',array('status'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('通过成功！', $this->createWebUrl('notice'), 'success');
    }else{
        message('通过失败！','','error');
    }
}elseif($_GPC['op']=='nopass'){
    $res=pdo_update('lhyzhnc_sun_notice',array('status'=>3),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('拒绝成功！', $this->createWebUrl('notice'), 'success');
    }else{
        message('拒绝失败！','','error');
    }
}elseif($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_notice',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('notice'), 'success');
    }else{
        message('删除失败！','','error');
    }
}else{
    
    $data[':uniacid']=$_W['uniacid'];

    $where=" WHERE uniacid= :uniacid";
    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from " . tablename("lhyzhnc_sun_notice") .$where." order by sort asc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_notice") .$where." order by sort asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    $pager = pagination($total, $pageindex, $pagesize);
}

include $this->template($template);