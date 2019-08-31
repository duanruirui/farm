<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('lhyzhnc_sun_recommen',array('uniacid'=>$_W['uniacid']));

if(checksubmit('submit')){


    // $data['state1'] =  $_GPC['state1'];
    // $data['id1'] =  $_GPC['id1'];
    // $data['state2'] =  $_GPC['state2'];
    // $data['id2'] =  $_GPC['id2'];
    // $data['state3'] =  $_GPC['state3'];
    // $data['id3'] =  $_GPC['id3'];

    // $data['articlestate'] =  $_GPC['articlestate'];
    // $data['goodsstate'] =  $_GPC['goodsstate'];
    // $data['activitystate'] =  $_GPC['activitystate'];
    $data['activityadd'] =  $_GPC['activityadd'];
    
    $data['uniacid'] =  $_W['uniacid'];

	if(empty($_GPC['id'])){

        $res = pdo_insert('lhyzhnc_sun_recommen', $data,array('uniacid'=>$_W['uniacid']));
        if($res){
            message('添加成功',$this->createWebUrl('recommen',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_recommen', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('修改成功',$this->createWebUrl('recommen',array()),'success');
        }else{
            message('修改失败','','error');
        }
    }
}
include $this->template('web/recommen');