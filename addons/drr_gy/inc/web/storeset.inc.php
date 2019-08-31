<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$item=pdo_get('lhyzhnc_sun_system',array('uniacid'=>$_W['uniacid']));
if(checksubmit('submit')){
    $id = intval($_GPC['id']);
    $data['store_open']=intval($_GPC['store_open']);
    $data['store_in_notice']=html_entity_decode($_GPC['store_in_notice']);
    if($id==0){
        $data['uniacid']=$_W['uniacid'];                 
        $res=pdo_insert('lhyzhnc_sun_system',$data);
        if($res){
            message('添加成功',$this->createWebUrl('storeset',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_system', $data, array('id' => $id));
        if($res){
            message('编辑成功',$this->createWebUrl('storeset',array()),'success');
        }else{
            message('编辑失败','','error');
        }
    }
}
include $this->template('web/storeset');