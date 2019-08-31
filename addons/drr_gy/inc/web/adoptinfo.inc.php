<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('lhyzhnc_sun_adopt',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
$img=$info['img'];
$store=pdo_getall('lhyzhnc_sun_store',array('uniacid'=>$_W['uniacid']),array('id','storename'));

if($info['imgs']){
    if(strpos($info['imgs'],',')){
        $imgs= explode(',',$info['imgs']);
    }else{
        $imgs=array(
            0=>$info['imgs']
        );
    }
}

if(checksubmit('submit')){
    ini_set('upload_max_filesize ','1024M');
    
    if($_GPC['name']==null) {
        message('请您填写认养名称', '', 'error');
    }

    $data['name'] =  $_GPC['name'];
    $data['lottery'] = $_GPC["lottery"];
    $data['proname'] =  $_GPC['proname'];
    $data['prolottery'] = $_GPC["prolottery"];
    $data['title'] = $_GPC["title"];
    $data['storeid'] = intval($_GPC["storeid"]);
    $data['price']=$_GPC['price'];
    $data['uniacid']=$_W['uniacid'];
    $data['vir']=$_GPC['vir'];
    $data['top']=$_GPC['top'];
    $data['imgs']=implode(",",$_GPC['imgs']);


    $data['label']=$_GPC['label'];
    $data['state']=$_GPC['state'];
    $data['img']=$_GPC['img'];
    $data['count']=$_GPC['count'];
    $data['video']=$_GPC['video'];
    $data['video_img']=$_GPC['video_img'];
    $data['pic']=$_GPC['pic'];
    // $data['service']=$_GPC['service'];
    $data['day']=$_GPC['day'];
    $data['content']=html_entity_decode($_GPC['content']);
    $data['detail']=html_entity_decode($_GPC['detail']);
    $data['agreement']=html_entity_decode($_GPC['agreement']);
    $data['sort'] = $_GPC['sort'];


	if(empty($_GPC['id'])){
        $data['status']=1;
        $data['isshow']=1;
        $data['time']=time();
        $res = pdo_insert('lhyzhnc_sun_adopt', $data,array('uniacid'=>$_W['uniacid']));
        if($res){
            message('添加成功',$this->createWebUrl('adopt',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        // p($_GPC['storeid']);
        // p($_GPC);
        $res = pdo_update('lhyzhnc_sun_adopt', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('修改成功',$this->createWebUrl('adopt',array()),'success');
        }else{
            message('修改失败','','error');
        }
    }
}
include $this->template('web/adoptinfo');