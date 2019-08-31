<?php
global $_GPC, $_W;

$GLOBALS['frames'] = $this->getMainMenu();
$id=$_GPC['id'];
$item=pdo_get('lhyzhnc_sun_opinion',array('uniacid'=>$_W['uniacid'],'id'=>$id));
// p($item);
if(checksubmit('submit')){
    // p($)
    $data['reply']=html_entity_decode($_GPC['reply']);
    $data['replytime']=time();
    $data['status']=2;


    $res = pdo_update('lhyzhnc_sun_opinion', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
    if($res){
        $result=pdo_update('lhyzhnc_sun_user',array('hongdian'=>1),array('uniacid'=>$_W['uniacid'],'id'=>$item['uid']));
        message('编辑成功',$this->createWebUrl('opinion',array()),'success');
    }else{
        message('编辑失败','','error');
    }
    
}
include $this->template('web/reply');