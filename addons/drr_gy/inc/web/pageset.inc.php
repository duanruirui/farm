<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
 $item=pdo_get('lhyzhnc_sun_pageset',array('uniacid'=>$_W['uniacid']));

if(checksubmit('submit')){
    $data['img1']=$_GPC['img1'];
    $data['img2']=$_GPC['img2'];
    $data['img3']=$_GPC['img3'];
    $data['name1'] = html_entity_decode($_GPC['name1']);
    $data['name2'] = html_entity_decode($_GPC['name2']);
    $data['name3'] = html_entity_decode($_GPC['name3']);


    if($_GPC['id']==''){      
        $data['uniacid']=$_W['uniacid'];          
        $res=pdo_insert('lhyzhnc_sun_pageset',$data);
        if($res){
            message('添加成功',$this->createWebUrl('pageset',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_pageset', $data, array('id' => $_GPC['id']));
        if($res){
            message('编辑成功',$this->createWebUrl('pageset',array()),'success');
        }else{
            message('编辑失败','','error');
        }
    }
}
include $this->template('web/pageset');