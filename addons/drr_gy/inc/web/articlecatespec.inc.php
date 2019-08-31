<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$template = "web/articlecatespec";

if($_GPC['op']=='save'){
    // $id=intval($_GPC['id']);
    $data['state']=$_GPC['state'];
    $data['sort']=$_GPC['sort'];
    $data['aid']=$_GPC['aid'];
    // $data['addtime']=time();
    if($_GPC['id']==''){
        $data['uniacid']=$_W['uniacid'];
        $res=pdo_insert('lhyzhnc_sun_spec',$data);
        if($res){
            message('添加成功',$this->createWebUrl('articlecatespec'),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_spec', $data, array('id' => $_GPC['id']));
        if($res){
            message('修改成功',$this->createWebUrl('articlecatespec'),'success');
        }else{
            message('修改失败','','error');
        }
    }
}
elseif($_GPC['op']=='specedit'){
    $id=intval($_GPC['id']);
    $info=pdo_get('lhyzhnc_sun_spec',array('uniacid'=>$_W['uniacid'],'id'=>$id));
    $template = "web/articlecatespec_add";
}
elseif($_GPC['op']=='specdelete'){
    $res=pdo_delete('lhyzhnc_sun_spec',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('articlecatespec',array('op'=>'spec')), 'success');
    }else{
        message('删除失败！','','error');
    }
}

else{
    $data[':uniacid']=$_W['uniacid'];
    $where=" WHERE uniacid=".$_W['uniacid'];
    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from " . tablename("lhyzhnc_sun_spec") ." ".$where." order by sort asc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_spec") . " " .$where." order by sort asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    foreach ($list as $key => $value) {
        if($value['state']==1){
            $result=pdo_get('lhyzhnc_sun_article',array('uniacid'=>$_W['uniacid'],'id'=>$value['aid']));
            $list[$key]['name']=$result['name'];
        }else if($value['state']==2){
            $result=pdo_get('lhyzhnc_sun_goods',array('uniacid'=>$_W['uniacid'],'id'=>$value['aid']));
            $list[$key]['name']=$result['gname'];
        }else{
            $result=pdo_get('lhyzhnc_sun_activity',array('uniacid'=>$_W['uniacid'],'id'=>$value['aid']));
            $list[$key]['name']=$result['name'];

        }
    }
    $pager = pagination($total, $pageindex, $pagesize);

    $template = "web/articlecatespec";

}

include $this->template($template);