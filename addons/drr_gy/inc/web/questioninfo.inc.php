<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('lhyzhnc_sun_question',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));

if(checksubmit('submit')){

    $data['question'] =  $_GPC['question'];
    $data['answer'] =  $_GPC['answer'];
    $data['sort'] =  $_GPC['sort'];
    $data['uniacid'] =  $_W['uniacid'];

	if(empty($_GPC['id'])){
        $res = pdo_insert('lhyzhnc_sun_question', $data,array('uniacid'=>$_W['uniacid']));
        if($res){
            message('添加成功',$this->createWebUrl('question',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_question', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('修改成功',$this->createWebUrl('question',array()),'success');
        }else{
            message('修改失败','','error');
        }
    }
}
include $this->template('web/questioninfo');