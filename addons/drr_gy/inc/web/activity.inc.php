<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

if($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_activity',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('activity'), 'success');
    }else{
        message('删除失败！','','error');
    }
}elseif($_GPC['op']=='pass'){
    // p($_GPC['cid']);
    $res=pdo_update('lhyzhnc_sun_activity',array('status'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        // $result=pdo_update('lhyzhnc_sun_articlecate',array('hongdian'=>1),array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['cid']));
        $user=pdo_getall('lhyzhnc_sun_user',array('uniacid'=>$_W['uniacid']),array('id'));
        foreach ($user as $key => $value) {
            $hongdian=pdo_get('lhyzhnc_sun_hongdian',array('uniacid'=>$_W['uniacid'],'cid'=>$_GPC['cid'],'uid'=>$value['id']));
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
        

        message('通过成功！', $this->createWebUrl('activity'), 'success');
    }else{
       message('通过失败！','','error');
    } 
}elseif($_GPC['op']=='nopass'){
    $res=pdo_update('lhyzhnc_sun_activity',array('status'=>3),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    
    if($res){
        message('拒绝成功！', $this->createWebUrl('activity'), 'success');
    }else{
        message('拒绝失败！','','error');
    }
}
elseif($_GPC['op']=='pass1'){
    $res=pdo_update('lhyzhnc_sun_activity',array('isrecommend'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('activity'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='nopass1'){
    $res=pdo_update('lhyzhnc_sun_activity',array('isrecommend'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('activity'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='pass2'){
    $res=pdo_update('lhyzhnc_sun_activity',array('comment'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('activity'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='nopass2'){
    $res=pdo_update('lhyzhnc_sun_activity',array('comment'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('activity'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='pass3'){
    $res=pdo_update('lhyzhnc_sun_activity',array('isshow'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('activity'), 'success');
    }else{
        message('修改失败！','','error');
    }
}elseif($_GPC['op']=='nopass3'){
    $res=pdo_update('lhyzhnc_sun_activity',array('isshow'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('activity'), 'success');
    }else{
        message('修改失败！','','error');
    }
}else{
    $uniacid=$_W['uniacid'];
    $where=" WHERE a.uniacid=:uniacid ";
    if($_GPC['keywords']){
        $op=$_GPC['keywords'];
        $where .=" and a.name LIKE concat('%', :name,'%') ";
        $data[':name']=$op;
    }
    if($_GPC['status']){
        $status=$_GPC['status'];
        $data[':status']=$status;

        $where .=" and a.status=:status ";
    }
    // if(!empty($_GPC['time'])){
    //     $start=strtotime($_GPC['time']['start']);
    //     $end=strtotime($_GPC['time']['end']);
    //     $where.=" and ime >={$start} and time<={$end}";
    // }

    $type=isset($_GPC['type'])?$_GPC['type']:'all';
    $data[':uniacid']=$_W['uniacid'];

    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select a.*,b.name as sc_name from " . tablename("lhyzhnc_sun_activity") ."a left join ".tablename('lhyzhnc_sun_articlecate')."b on b.id = a.cid ".$where." order by a.sort asc ";
    $total=pdo_fetchcolumn("select count(*) from " . tablename("lhyzhnc_sun_activity") ."a left join ".tablename('lhyzhnc_sun_spec')."b on b.id = a.cid " .$where." order by a.sort asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    foreach ($list as $key => $value) {
        $num=0;
        $order=pdo_fetchall('select num from '.tablename('lhyzhnc_sun_activityorder')." where (status=2 or status = 1) and aid = ".$value['id']." and uniacid=$uniacid ");
        foreach ($order as $k => $v) {
            $num += $v['num'];
        };
        $list[$key]['buynum']=$num+$value['vir'];
    }
    $pager = pagination($total, $pageindex, $pagesize);
}
include $this->template('web/activity');