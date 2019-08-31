<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
//
$info=pdo_get('lhyzhnc_sun_extendlist',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
// $ship_type = $info["ship_type"]?explode(",",$info["ship_type"]):array();

// $brand=pdo_getall('lhyzhnc_sun_store',array('uniacid'=>$_W['uniacid']));
// $storecate=pdo_getall('lhyzhnc_sun_articlecate',array('uniacid'=>$_W['uniacid']));


if(checksubmit('submit')){

    $data['uniacid']=$_W['uniacid'];
    $data['name']=$_GPC['name'];
    $data['time']=time();

	if(empty($_GPC['id'])){
        $data['money']=0;
        $res = pdo_insert('lhyzhnc_sun_extendlist', $data);
        // p($data);

        if($res){
            message('添加成功',$this->createWebUrl('extendlist',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_extendlist', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('修改成功',$this->createWebUrl('extendlist',array()),'success');
        }else{
            message('修改失败','','error');
        }
    }
	
}
include $this->template('web/extendadd');