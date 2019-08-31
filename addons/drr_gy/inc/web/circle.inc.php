<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$template = "web/circle";

if($_GPC['op']=='change'){
    $uptype = $_GPC["uptype"];
    $status = intval($_GPC["status"]);
    $id = intval($_GPC["id"]);
    if($uptype=="show"){
        $data['isshow']=$status;
        $res = pdo_update('lhyzhnc_sun_circle', $data, array('uniacid' => $_W['uniacid'],'id' => $id));
    }elseif($uptype=="homeshow"){
        $data['is_homeshow_circle']=intval($_GPC['is_homeshow_circle']);
        $res = pdo_update('lhyzhnc_sun_system', $data, array('uniacid' => $_W['uniacid']));
    }else{
        $data['is_open_circle']=intval($_GPC['is_open_circle']);
        $res = pdo_update('lhyzhnc_sun_system', $data, array('uniacid' => $_W['uniacid']));
    }
    if($res){
        message('设置成功',$this->createWebUrl('circle'),'success');
    }else{
        message('设置失败','','error');
    }
    
}elseif($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_circle',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        //删除所有评论
        pdo_delete('lhyzhnc_sun_circlecomment',array('cid'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
        message('删除成功！', $this->createWebUrl('circle'), 'success');
    }else{
        message('删除失败！','','error');
    }
}elseif($_GPC['op']=='deletecom'){
    $circle = pdo_get('lhyzhnc_sun_circle',array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['rcid']),array("commentnum","id"));
    $res=pdo_delete('lhyzhnc_sun_circlecomment',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        if($circle["commentnum"]>0){
            //更新评论数量
            pdo_update('lhyzhnc_sun_circle',array("commentnum -="=>1),array('id'=>$circle['id'],'uniacid'=>$_W['uniacid']));
        }
        message('删除成功！', $this->createWebUrl('circle', array('op' => 'comment','id' => $_GPC['id'],'cid' => $_GPC['cid'])), 'success');
    }else{
        message('删除失败！','','error');
    }
}elseif($_GPC['op']=='comment'){
    $cid = intval($_GPC["cid"]);
    $where=" WHERE uniacid=".$_W['uniacid']." ";
    if($cid>0){
        $where .= " and cid=".$cid." ";
    }
    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from " . tablename("lhyzhnc_sun_circlecomment") ." ".$where." order by id desc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_circlecomment") . " " .$where." order by id desc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    
    $pager = pagination($total, $pageindex, $pagesize);
    $template = "web/circlecomment";
}else{
    $sinfo=pdo_get('lhyzhnc_sun_system',array('uniacid'=>$_W['uniacid']),array("is_open_circle","is_homeshow_circle"));

    $where=" WHERE c.uniacid=".$_W['uniacid']." ";
    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select c.*,u.id as uid,u.name from " . tablename("lhyzhnc_sun_circle") ." as c left join " . tablename("lhyzhnc_sun_user") ." as u on c.openid=u.openid ".$where." order by c.id desc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_circle") . " as c " .$where." order by c.id desc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    foreach($list as $k => $v){
        if(!empty($v["img"])){
            $img = explode(",",$v["img"]);
            $list[$k]["img"] = $img;
        }else{
            $list[$k]["img"] = "";
        }
    }
    
    $pager = pagination($total, $pageindex, $pagesize);
}

include $this->template($template);