<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

if($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_crowd',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('crowd'), 'success');
    }else{
        message('删除失败！','','error');
    }
}elseif($_GPC['op']=='pass'){

        $res=pdo_update('lhyzhnc_sun_crowd',array('status'=>2,'time'=>time()),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('操作成功！', $this->createWebUrl('crowd'), 'success');
        }else{
            message('操作失败！','','error');
        }

    
}elseif($_GPC['op']=='nopass'){
    $res=pdo_update('lhyzhnc_sun_crowd',array('status'=>3),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('操作成功！', $this->createWebUrl('crowd'), 'success');
    }else{
        message('操作失败！','','error');
    }
}else{
    $uniacid=$_W['uniacid'];
    $where=" WHERE uniacid=:uniacid ";
    if($_GPC['keywords']){
        $op=$_GPC['keywords'];
        $where .=" and name LIKE concat('%', :name,'%') ";
        $data[':name']=$op;
    }
    if($_GPC['status']){
        $status=$_GPC['status'];
        $data[':status']=$status;

        $where .=" and status=:status ";
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
    $sql="select * from " . tablename("lhyzhnc_sun_crowd"). " ".$where." order by sort asc ,status asc ";
    $total=pdo_fetchcolumn("select count(*) from " . tablename("lhyzhnc_sun_crowd")." " .$where." order by sort asc ,status asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    
    foreach ($list as $key => $value) {
        $num=0;
        $crowdorder=pdo_fetchall('select num from '.tablename('lhyzhnc_sun_crowdorder')." where status!=1 and cid = ".$value['id']." and uniacid=$uniacid and status!=5 and status!=6 ");
        foreach ($crowdorder as $k => $v) {
            $num += $v['num'];
        };
        $list[$key]['buynum']=$num+$value['vir'];
        $list[$key]['time']=date('Y-m-d H:i:s',$value['time']);
        $list[$key]['endtime']=date('Y-m-d H:i:s',$value['time']+$value['day']*24*60*60);
        
        if($value['storeid']!=0){
            $storename=pdo_get('lhyzhnc_sun_store',array('uniacid'=>$_W['uniacid'],'id'=>$value['storeid']),array('storename'));
            $list[$key]['storename']=$storename['storename'];
        }else{
            $list[$key]['storename']='平台发布';
        }
    }
    
    $pager = pagination($total, $pageindex, $pagesize);
}
include $this->template('web/crowd');