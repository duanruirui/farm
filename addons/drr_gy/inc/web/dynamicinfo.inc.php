<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('lhyzhnc_sun_dynamic',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));

$adopt=pdo_getall('lhyzhnc_sun_adopt',array('uniacid'=>$_W['uniacid'],'status'=>2),array('id','name'));
$crowd=pdo_getall('lhyzhnc_sun_crowd',array('uniacid'=>$_W['uniacid'],'status'=>2),array('id','name'));
if($info['img']){
    if(strpos($info['img'],',')){
        $img= explode(',',$info['img']);
    }else{
        $img=array(
            0=>$info['img']
        );
    }
}
if(checksubmit('submit')){

    $data['state'] = $_GPC['state'];
    if($_GPC['state']==1){

        $data['pid']=$_GPC['aid'];
        if($_GPC['aid']==0){
            message('请您选择认养项目！', '', 'error');
        }
    }else{
        $data['pid']=$_GPC['cid'];
        if($_GPC['cid']==0){
            message('请您选择众筹项目！', '', 'error');
        }
    }
    $data['content'] =  $_GPC['content'];
    $data['img']=implode(",",$_GPC['img']);
    $data['video']=$_GPC['video'];
    $data['time']=time();

    // $data['answer'] =  $_GPC['answer'];
    $data['uniacid'] =  $_W['uniacid'];

	if(empty($_GPC['id'])){
        $data['status']=1;
        $res = pdo_insert('lhyzhnc_sun_dynamic', $data,array('uniacid'=>$_W['uniacid']));
        if($res){
            message('添加成功',$this->createWebUrl('dynamic',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_dynamic', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('修改成功',$this->createWebUrl('dynamic',array()),'success');
        }else{
            message('修改失败','','error');
        }
    }
}
include $this->template('web/dynamicinfo');