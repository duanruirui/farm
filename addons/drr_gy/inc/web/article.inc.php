<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$template = "web/article";

if($_GPC['op']=='change'){
    $id = intval($_GPC["id"]);
    // $uptype = $_GPC["uptype"];
    $data['status'] = intval($_GPC["status"]);
    $where["uniacid"] = $_W['uniacid'];
    $where["id"] = $id;
    // if($uptype=="top"){
    //     $data["istop"] = $status;
    // }elseif($uptype=="show"){
    //     $data["isshow"] = $status;
    // }
    if(!$data){
        message('修改失败，参数错误','','error');
    }
    $res = pdo_update('lhyzhnc_sun_article', $data,$where);
    if($res){
        message('修改成功',$this->createWebUrl('article'),'success');
    }else{
        message('修改失败','','error');
    }
    
}elseif($_GPC['op']=='pass'){
    $res=pdo_update('lhyzhnc_sun_article',array('status'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        // $result=pdo_update('lhyzhnc_sun_articlecate',array('hongdian'=>1),array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['cid']));
        // $result=pdo_update('lhyzhnc_sun_user',array('hongdian1'=>1),array('uniacid'=>$_W['uniacid']));
        $user=pdo_getall('lhyzhnc_sun_user',array('uniacid'=>$_W['uniacid']),array('id'));
        // p($user);
        foreach ($user as $key => $value) {
            $hongdian=pdo_get('lhyzhnc_sun_hongdian',array('uniacid'=>$_W['uniacid'],'cid'=>$_GPC['cid'],'uid'=>$value['id']));
            // p($hongdian);
            if($hongdian){
                $data['state']=1;
                $result=pdo_update('lhyzhnc_sun_hongdian',$data,array('uniacid'=>$_W['uniacid'],'uid'=>$value['id'],'cid'=>$_GPC['cid']));
            }else{
                $data['uid']=$value['id'];
                $data['cid']=$_GPC['cid'];
                $data['uniacid']=$_W['uniacid'];
                $data['state']=1;
                $result=pdo_insert('lhyzhnc_sun_hongdian',$data);
            }
        }
        message('通过成功！', $this->createWebUrl('article'), 'success');
    }else{
        message('通过失败！','','error');
    }
}elseif($_GPC['op']=='nopass'){
    $res=pdo_update('lhyzhnc_sun_article',array('status'=>3),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('拒绝成功！', $this->createWebUrl('article'), 'success');
    }else{
        message('拒绝失败！','','error');
    }
}
elseif($_GPC['op']=='pass1'){
    $res=pdo_update('lhyzhnc_sun_article',array('isrecommend'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('article'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='nopass1'){
    $res=pdo_update('lhyzhnc_sun_article',array('isrecommend'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('article'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='pass2'){
    $res=pdo_update('lhyzhnc_sun_article',array('comment'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('article'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='nopass2'){
    $res=pdo_update('lhyzhnc_sun_article',array('comment'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('article'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='pass3'){
    $res=pdo_update('lhyzhnc_sun_article',array('isshow'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('article'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='nopass3'){
    $res=pdo_update('lhyzhnc_sun_article',array('isshow'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('article'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_article',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('article'), 'success');
    }else{
        message('删除失败！','','error');
    }
}else{

    $where=" WHERE s.uniacid=".$_W['uniacid'];
    $data[':uniacid']=$_W['uniacid'];
    $pageindex = max(1, intval($_GPC['page']));
    $type=isset($_GPC['type'])?$_GPC['type']:'all';
    if($_GPC['status']){
        $status=$_GPC['status'];
        $data[':status']=$status;
        
        $where .=" and s.status={$_GPC['status']} ";
    }
    $pagesize=10;
    // $sql="select s.*,b.storename,g.gname from " . tablename("lhyzhnc_sun_article") ." as s left join " . tablename("lhyzhnc_sun_store") ." as b on b.id=s.sid left join " . tablename("lhyzhnc_sun_goods") ." as g on g.gid=s.gid ".$where." order by s.id desc ";
    // $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_article") . " as s left join " . tablename("lhyzhnc_sun_store") ." as b on b.id=s.sid " .$where." order by s.id desc ",$data);
    $sql="select s.*,b.name as sc_name from " . tablename("lhyzhnc_sun_article") ." as s left join " . tablename("lhyzhnc_sun_articlecate") ." as b on b.id=s.cid ".$where." order by s.sort asc ";
    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_article") . " as s left join " . tablename("lhyzhnc_sun_articlecate") ." as b on b.id=s.cid " .$where." order by s.sort asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);

    $pager = pagination($total, $pageindex, $pagesize);
}

include $this->template($template);