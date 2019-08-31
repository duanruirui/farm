<?php
global $_GPC, $_W;

$GLOBALS['frames'] = $this->getMainMenu();
$item=pdo_get('lhyzhnc_sun_prointroduce',array('uniacid'=>$_W['uniacid']));
if(checksubmit('submit')){
    $data['detail']=html_entity_decode($_GPC['detail']);

    if($_GPC['id']==''){                
        $data['uniacid']=trim($_W['uniacid']);
        $res=pdo_insert('lhyzhnc_sun_prointroduce',$data,array('uniacid'=>$_W['uniacid']));
        if($res){
            message('添加成功',$this->createWebUrl('detail',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_prointroduce', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('编辑成功',$this->createWebUrl('detail',array()),'success');
        }else{
            message('编辑失败','','error');
        }
    }
}
include $this->template('web/detail');