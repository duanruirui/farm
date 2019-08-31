<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$uniacid = $_W['uniacid'];
$data[':uniacid']=$_W['uniacid'];

if($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_store',array('id'=>$_GPC['id'],'uniacid'=>$uniacid));
    if($res){
        message('删除成功！', $this->createWebUrl('store'), 'success');
    }else{
        message('删除失败！','','error');
    }
}elseif($_GPC['op']=='top'){
    $istop = intval($_GPC["istop"]);
    $res=pdo_update('lhyzhnc_sun_store',array('istop'=>$istop),array('id'=>$_GPC['id'],'uniacid'=>$uniacid));
    if($res){
        message('置顶成功！', $this->createWebUrl('store'), 'success');
    }else{
        message('置顶失败！','','error');
    }
}elseif($_GPC['op']=='pass'){
    $res=pdo_update('lhyzhnc_sun_store',array('status'=>2),array('id'=>$_GPC['id'],'uniacid'=>$uniacid));
    if($res){
        message('通过成功！', $this->createWebUrl('store'), 'success');
    }else{
        message('通过失败！','','error');
    }
}elseif($_GPC['op']=='nopass'){
    $res=pdo_update('lhyzhnc_sun_store',array('status'=>3),array('id'=>$_GPC['id'],'uniacid'=>$uniacid));
    if($res){
        message('拒绝成功！', $this->createWebUrl('store'), 'success');
    }else{
        message('拒绝失败！','','error');
    }
}else{
    $where=" WHERE a.uniacid=".$uniacid;
    // $data[':uniacid']=$_W['uniacid']
    $type=isset($_GPC['type'])?$_GPC['type']:'all';
    $pageindex = max(1, intval($_GPC['page']));
    if($_GPC['status']){
        $status=$_GPC['status'];
        $data[':status']=$status;
        $where .=" and a.status={$_GPC['status']} ";
    }
    $pagesize=10;
    // $sql="SELECT b.*,s.id as slid,s.lt_day FROM ".tablename('lhyzhnc_sun_store')." as b left join ".tablename('lhyzhnc_sun_storelimit')." as s on b.lt_id=s.id ".$where." order by b.id desc ";
    $sql="SELECT a.*,b.name as username from ".tablename('lhyzhnc_sun_store').'a left join '.tablename('lhyzhnc_sun_user').'b on b.openid = a.bind_openid '.$where." order by a.sort asc ";
    $total=pdo_fetchcolumn("SELECT  count(*) as wname FROM ".tablename('lhyzhnc_sun_store').'a left join '.tablename('lhyzhnc_sun_user').'b on b.openid = a.bind_openid '.$where." order by a.sort asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    // $crowd=pdo_get('lhyzhnc_sun_crowd',array('uniacid'=>$_W['uniacid'],'status'=>2),array('id'));
    // $cid=$crowd['id'];
    foreach ($list as $key => $value) {
        $sid=$value['id'];

        // $count=count(pdo_fetchall('select a.id from '.tablename('lhyzhnc_sun_crowdorder')."a left join ".tablename('lhyzhnc_sun_choosestore')."b on b.ordernum=a.ordernum where  b.sid=".$value['id']." and a.cid = ".$cid." and a.uniacid = ".$_W['uniacid']." and b.uniacid=".$_W['uniacid']));

        // $list[$key]['count']=$count;

        $dynamic=pdo_get('lhyzhnc_sun_storedynamic',array('uniacid'=>$_W['uniacid'],'sid'=>$value['id']));
        if($dynamic){
            $list[$key]['dynamic']=$dynamic['id'];
        }else{
            $list[$key]['dynamic']=0;
        }
        
    }
    // p($list);
    // foreach($list as $k=> $v){
    //     $list[$k]["paytime"] = $v["paytime"]>0?date("Y-m-d",$v["paytime"]):'';
    // }
    $pager = pagination($total, $pageindex, $pagesize);
}


include $this->template('web/store');