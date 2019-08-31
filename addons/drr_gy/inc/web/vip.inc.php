<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
//$list = pdo_getall('lhyzhnc_sun_type',array('uniacid' => $_W['uniacid']),array(),'','num ASC');
$info = pdo_getall('lhyzhnc_sun_vip',array('uniacid'=>$_W['uniacid']));

global $_W, $_GPC;

if($_GPC['op']=='delete'){
    if($_W['ispost']){
        //先查看是否存在激活码，有择不能删除

        $res=pdo_delete('lhyzhnc_sun_vip',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('操作成功',$this->createWebUrl('vip',array()),'success');
        }else{
            message('操作失败','','error');
        }
    }
}
if($_GPC['op']=='change'){
    $res=pdo_update('lhyzhnc_sun_vip',array('state'=>$_GPC['state']),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        message('操作成功',$this->createWebUrl('vip',array()),'success');
    }else{
        message('操作失败','','error');
    }
}

include $this->template('web/vip');