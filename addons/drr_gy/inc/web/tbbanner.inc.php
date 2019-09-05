<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
//调用
include IA_ROOT . '/addons/drr_gy/inc/func/func.php';
$template = "web/tbbanner";
$typearr = GetPositon();
$typearr_noinput = GetNoShowinput();

if($_GPC['op']=='add'){
    $typearr = GetPositon();
    $template = "web/tbbanner_add";
}elseif($_GPC['op']=='save'){
    $id=intval($_GPC['id']);
    $pop_title = $_GPC['pop_title'];
    $pop_img = $_GPC['pop_img'];

    $data['pop_title']=$pop_title;
    $data['pop_urltype']=$_GPC['pop_urltype'];
    $data['pop_urltxt']=$_GPC['pop_urltxt'];
    $data['pop_img']=$pop_img;
    $data['sort']=intval($_GPC['sort']);
    $data['position']=8;//1弹窗，2首页轮播（默认主题），3砍价列表，4集卡列表，5抢购列表，6拼团列表，7免单列表，8营销图标，9底部导航，10广告1（主题2），11广告2（主题2）
    
    if($id==0){
        $data['uniacid']=$_W['uniacid'];
        $res=pdo_insert('lhyzhnc_sun_popbanner',$data);
        if($res){
            message('添加成功',$this->createWebUrl('tbbanner'),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_popbanner', $data, array('id' => $id));
        if($res){
            message('修改成功',$this->createWebUrl('tbbanner'),'success');
        }else{
            message('修改失败','','error');
        }
    }
}elseif($_GPC['op']=='edit'){
    $id=intval($_GPC['id']);
    $info=pdo_get('lhyzhnc_sun_popbanner',array('uniacid'=>$_W['uniacid'],'id'=>$id));

    $template = "web/tbbanner_add";
}elseif($_GPC['op']=='change'){
    $uptype = $_GPC["uptype"];
    $status = intval($_GPC["status"]);
    $id = intval($_GPC["id"]);
    if($uptype=="show"){
        $data['isshow']=$status;
        $res = pdo_update('lhyzhnc_sun_popbanner', $data, array('uniacid' => $_W['uniacid'],'id' => $id));
    }else{
        $data['is_open_pop']=intval($_GPC['is_open_pop']);
        $res = pdo_update('lhyzhnc_sun_system', $data, array('uniacid' => $_W['uniacid']));
    }
    if($res){
        message('修改成功',$this->createWebUrl('tbbanner'),'success');
    }else{
        message('修改失败','','error');
    }
    
}elseif($_GPC['op']=='search'){
    $tid=$_GPC['tid'];
    $name=$_GPC['name'];
    $list = SearchProductLikename($name,$tid);
    echo json_encode($list);
    exit();
}elseif($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_popbanner',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('tbbanner'), 'success');
    }else{
        message('删除失败！','','error');
    }
}else{
    $where=" WHERE uniacid=".$_W['uniacid']." and position =8";
    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from " . tablename("lhyzhnc_sun_popbanner") ." ".$where." order by id desc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_popbanner") . " " .$where." order by id desc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    $pager = pagination($total, $pageindex, $pagesize);
}

include $this->template($template);