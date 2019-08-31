<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$template = "web/storeprice";

if($_GPC['op']=='add'){
    $template = "web/storeprice_add";
}elseif($_GPC['op']=='save'){
    $id=intval($_GPC['id']);
    $data['lt_name']=$_GPC['lt_name'];
    $data['lt_day']=$_GPC['lt_day'];
    $data['money']=$_GPC['money'];
    $data['sort']=$_GPC['sort'];
    if($id==0){
        $data['uniacid']=$_W['uniacid'];
        $res=pdo_insert('lhyzhnc_sun_storelimit',$data);
        if($res){
            message('添加成功',$this->createWebUrl('storeprice'),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_storelimit', $data, array('id' => $id));
        if($res){
            message('修改成功',$this->createWebUrl('storeprice'),'success');
        }else{
            message('修改失败','','error');
        }
    }
}elseif($_GPC['op']=='edit'){
    $id=intval($_GPC['id']);
    $info=pdo_get('lhyzhnc_sun_storelimit',array('uniacid'=>$_W['uniacid'],'id'=>$id));

    $template = "web/storeprice_add";
}elseif($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_storelimit',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('storeprice'), 'success');
    }else{
        message('删除失败！','','error');
    }
}else{
    $where=" WHERE uniacid=".$_W['uniacid'];
    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from " . tablename("lhyzhnc_sun_storelimit") ." ".$where." order by sort asc,id desc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_storelimit") . " " .$where." order by sort asc,id desc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    $pager = pagination($total, $pageindex, $pagesize);


}

include $this->template($template);