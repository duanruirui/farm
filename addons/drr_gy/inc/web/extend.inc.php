<?php
global $_GPC, $_W;

$GLOBALS['frames'] = $this->getMainMenu();
$item=pdo_get('lhyzhnc_sun_extend',array('uniacid'=>$_W['uniacid']));
if(checksubmit('submit')){
    $data['text']=html_entity_decode($_GPC['text']);
    $data['img']=$_GPC['img'];
    $data['status']=$_GPC['status'];
    $data['userprice']=$_GPC['userprice'];
    $data['usertime']=$_GPC['usertime'];
    $data['yewuprice']=$_GPC['yewuprice'];
    $data['ratio']=$_GPC['ratio'];

    if($_GPC['id']==''){                
        $data['uniacid']=trim($_W['uniacid']);
        $res=pdo_insert('lhyzhnc_sun_extend',$data,array('uniacid'=>$_W['uniacid']));
        if($res){
            message('添加成功',$this->createWebUrl('extend',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_extend', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('编辑成功',$this->createWebUrl('extend',array()),'success');
        }else{
            message('编辑失败','','error');
        }
    }
}
include $this->template('web/extend');