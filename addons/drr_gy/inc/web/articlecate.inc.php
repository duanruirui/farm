<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$template = "web/articlecate";

if($_GPC['op']=='add'){
    $template = "web/articlecate_add";
}elseif($_GPC['op']=='save'){
    // $id=intval($_GPC['id']);
    $data['name']=$_GPC['name'];
    $data['img']=$_GPC['img'];
    $data['num']=1;
    $data['sort']=$_GPC['sort'];
    $data['addtime']=time();
    $data['detail'] = html_entity_decode($_GPC['detail']);
    
    if($_GPC['id']==''){
        $data['uniacid']=$_W['uniacid'];
        // $data['hongdian']=1;

        $res=pdo_insert('lhyzhnc_sun_articlecate',$data);
        if($res){
            message('添加成功',$this->createWebUrl('articlecate'),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_articlecate', $data, array('id' => $_GPC['id']));
        if($res){
            message('修改成功',$this->createWebUrl('articlecate'),'success');
        }else{
            message('修改失败','','error');
        }
    }
}elseif($_GPC['op']=='edit'){
    $id=intval($_GPC['id']);
    $info=pdo_get('lhyzhnc_sun_articlecate',array('uniacid'=>$_W['uniacid'],'id'=>$id));

    $template = "web/articlecate_add";
}elseif($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_articlecate',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        
        message('删除成功！', $this->createWebUrl('articlecate'), 'success');
    }else{
        message('删除失败！','','error');
    }
}
else{
    $data[':uniacid']=$_W['uniacid'];
    $where=" WHERE num = 1 and  uniacid=".$_W['uniacid'];
    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from " . tablename("lhyzhnc_sun_articlecate") ." ".$where." order by sort asc,id desc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_articlecate") . " " .$where." order by sort asc,id desc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    $pager = pagination($total, $pageindex, $pagesize);

}

include $this->template($template);