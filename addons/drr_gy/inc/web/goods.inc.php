<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

if($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_goods',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('goods'), 'success');
    }else{
        message('删除失败！','','error');
    }
}elseif($_GPC['op']=='pass'){
    $res=pdo_update('lhyzhnc_sun_goods',array('status'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
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
        message('通过成功！', $this->createWebUrl('goods'), 'success');
    }else{
        message('通过失败！','','error');
    }
}elseif($_GPC['op']=='nopass'){
    $res=pdo_update('lhyzhnc_sun_goods',array('status'=>3),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('拒绝成功！', $this->createWebUrl('goods'), 'success');
    }else{
        message('拒绝失败！','','error');
    }
}
elseif($_GPC['op']=='pass1'){
    $res=pdo_update('lhyzhnc_sun_goods',array('isrecommend'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('通过成功！', $this->createWebUrl('goods'), 'success');
    }else{
        message('通过失败！','','error');
    }
}elseif($_GPC['op']=='nopass1'){
    $res=pdo_update('lhyzhnc_sun_goods',array('isrecommend'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('拒绝成功！', $this->createWebUrl('goods'), 'success');
    }else{
        message('拒绝失败！','','error');
    }
}elseif($_GPC['op']=='pass2'){
    $res=pdo_update('lhyzhnc_sun_goods',array('comment'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('通过成功！', $this->createWebUrl('goods'), 'success');
    }else{
        message('通过失败！','','error');
    }
}elseif($_GPC['op']=='nopass2'){
    $res=pdo_update('lhyzhnc_sun_goods',array('comment'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('拒绝成功！', $this->createWebUrl('goods'), 'success');
    }else{
        message('拒绝失败！','','error');
    }
}elseif($_GPC['op']=='pass3'){
    $res=pdo_update('lhyzhnc_sun_goods',array('isshow'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('通过成功！', $this->createWebUrl('goods'), 'success');
    }else{
        message('通过失败！','','error');
    }
}elseif($_GPC['op']=='nopass3'){
    $res=pdo_update('lhyzhnc_sun_goods',array('isshow'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('拒绝成功！', $this->createWebUrl('goods'), 'success');
    }else{
        message('拒绝失败！','','error');
    }
}else{
    $uniacid=$_W['uniacid'];
    $where=" WHERE uniacid=".$_W['uniacid'];
    if($_GPC['keywords']){
        $op=$_GPC['keywords'];
        $where.=" and gname LIKE  '%$op%'";
        $data[':name']=$op;
    }
    if($_GPC['status']){
        $status=$_GPC['status'];
        $data[':status']=$status;

        $where.=" and status={$_GPC['status']} ";
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
    // $sql="select a.*,b.name as sc_name from " . tablename("lhyzhnc_sun_goods") ."a left join ".tablename('lhyzhnc_sun_articlecate')."b on b.id = a.cid ".$where." order by a.sort asc ";
    $sql="select * from " . tablename("lhyzhnc_sun_goods") .$where." order by sort asc ";

    $total=pdo_fetchcolumn("select count(*) as wname from " . tablename("lhyzhnc_sun_goods") .$where." order by sort asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    foreach ($list as $key => $value) {
        $num=0;
        $order=pdo_fetchall('select num from '.tablename('lhyzhnc_sun_goodsorder')." where (status=2 or status = 1 or status = 3) and gid = ".$value['id']." and uniacid=$uniacid ");
        foreach ($order as $k => $v) {
            $num += $v['num'];
        };
        $list[$key]['buynum']=$num+$value['num'];
        $sc_name=pdo_get('lhyzhnc_sun_articlecate',array("uniacid"=>$_W['uniacid'],'id'=>$value['cid']));
        $list[$key]['sc_name']=$sc_name['name'];
    }
    $pager = pagination($total, $pageindex, $pagesize);
}
include $this->template('web/goods');