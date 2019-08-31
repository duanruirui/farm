<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$template = "web/service";

if($_GPC['op']=='add'){
    $template = "web/service_add";
}elseif($_GPC['op']=='save'){
    // $id=intval($_GPC['id']);
    $data['title']=$_GPC['title'];
    $data['content']=$_GPC['content'];
    // $data['notice']=$_GPC['notice'];
    $data['sort']=$_GPC['sort'];
    // $data['addtime']=time();
    // $data['detail'] = html_entity_decode($_GPC['detail']);
    
    if($_GPC['id']==''){
        $data['uniacid']=$_W['uniacid'];
        $res=pdo_insert('lhyzhnc_sun_service',$data);
        if($res){
            message('添加成功',$this->createWebUrl('service'),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_service', $data, array('id' => $_GPC['id']));
        if($res){
            message('修改成功',$this->createWebUrl('service'),'success');
        }else{
            message('修改失败','','error');
        }
    }
}elseif($_GPC['op']=='edit'){
    $id=intval($_GPC['id']);
    $info=pdo_get('lhyzhnc_sun_service',array('uniacid'=>$_W['uniacid'],'id'=>$id));

    $template = "web/service_add";
}elseif($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_service',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('service'), 'success');
    }else{
        message('删除失败！','','error');
    }
}
else{
    $data[':uniacid']=$_W['uniacid'];
    $where=" WHERE uniacid=".$_W['uniacid'];
    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from " . tablename("lhyzhnc_sun_service") ." ".$where." order by sort asc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_service") . " " .$where." order by sort asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    $pager = pagination($total, $pageindex, $pagesize);

}

include $this->template($template);