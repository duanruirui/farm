<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

if($_GPC['op']=='delete'){
    $res=pdo_delete('lhyzhnc_sun_dynamic',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('删除成功！', $this->createWebUrl('dynamic'), 'success');
    }else{
        message('删除失败！','','error');
    }
}elseif($_GPC['op']=='pass'){
    $res=pdo_update('lhyzhnc_sun_dynamic',array('status'=>2,'time'=>time()),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        
        message('修改成功！', $this->createWebUrl('dynamic'), 'success');
    }else{
        message('修改失败！','','error');
    }
}
elseif($_GPC['op']=='nopass'){
    $res=pdo_update('lhyzhnc_sun_dynamic',array('status'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));

    // $res=pdo_delete('lhyzhnc_sun_dynamic',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('修改成功！', $this->createWebUrl('dynamic'), 'success');
    }else{
        message('修改失败！','','error');
    }
}else{

    // $storename=pdo_fetchall('select id,storename from '.tablename('lhyzhnc_sun_store')." where uniacid=".$_W['uniacid']." and status = 2 order by sort asc");
    // var_dump($store);

    $where=" WHERE uniacid=:uniacid ";
    if($_GPC['status']){
        $status=$_GPC['status'];
        $where .=" and status =:status ";
        $data[':status']=$status;
    }
    // if($_GPC['storeid']){
    //     $storeid=$_GPC['storeid'];
    //     $where .=" and storeid =:storeid ";
    //     $data[':storeid']=$storeid;
    // }

    $type=isset($_GPC['type'])?$_GPC['type']:'all';
    $data[':uniacid']=$_W['uniacid'];

    $pageindex = max(1, intval($_GPC['page']));
    $pagesize=10;
    $sql="select * from " . tablename("lhyzhnc_sun_dynamic").$where." order by status asc,time asc ";
    $total=pdo_fetchcolumn("select count(*) from " . tablename("lhyzhnc_sun_dynamic").$where." order by status asc,time asc ",$data);
    $select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
    $list=pdo_fetchall($select_sql,$data);
    foreach ($list as $key => $value) {
        $list[$key]['time']=date('Y-m-d H:i:s',$value['time']);
        if($value['state']==1){
            $res=pdo_get('lhyzhnc_sun_adopt',array('uniacid'=>$_W['uniacid'],'id'=>$value['pid']),array('id','name','storeid'));
            if(!empty($res['storeid'])){
                $store=pdo_get('lhyzhnc_sun_store',array('uniacid'=>$_W['uniacid'],'id'=>$res['storeid']),array('storename','phone'));
                $res['storename']=$store['storename'];
                $res['phone']=$store['phone'];
            }else{
                $res['storename']='平台发布';
                $res['phone']='无';
            }

            
        }else{
            $res=pdo_get('lhyzhnc_sun_crowd',array('uniacid'=>$_W['uniacid'],'id'=>$value['pid']),array('id','name','storeid'));
            if(!empty($res['storeid'])){
                $store=pdo_get('lhyzhnc_sun_store',array('uniacid'=>$_W['uniacid'],'id'=>$res['storeid']),array('storename','phone'));
                $res['storename']=$store['storename'];
                $res['phone']=$store['phone'];
            }else{
                $res['storename']='平台发布';
                $res['phone']='无';
            }

        }
        $list[$key]['res']=$res;
    }
    // p($list);
    $pager = pagination($total, $pageindex, $pagesize);
}

//三维数组去掉重复值 
    function array_unique_fb($array3D) {
        $tmp_array = array();
        $new_array = array();
        // 1. 循环出所有的行. ( $val 就是某个行)
        foreach($array3D as $k => $val){
            $hash = md5(json_encode($val));
            if (in_array($hash, $tmp_array)) {
                // '这个行已经有过了';
            }else{
                // 2. 在 foreach 循环的主体中, 把每行数组对象得hash 都赋值到那个临时数组中.
                $tmp_array[] = $hash;
                $new_array[] = $val;
            }
        }
        return ($new_array);
    } 
include $this->template('web/dynamic');