<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('lhyzhnc_sun_crowd',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
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
        message('请您填写众筹名称', '', 'error');
    }

    $data['sort'] = $_GPC['sort'];
    $data['name'] =  $_GPC['name'];
    $data['lottery'] = $_GPC["lottery"];
    $data['proname'] =  $_GPC['proname'];
    $data['prolottery'] = $_GPC["prolottery"];
    $data['title'] = $_GPC["title"];
    $data['imgs']=implode(",",$_GPC['imgs']);
    $data['storeid'] = intval($_GPC["storeid"]);
    // $data['price']=$_GPC['price'];
    $data['uniacid']=$_W['uniacid'];
    $data['vir']=$_GPC['vir'];
    $data['lower']=$_GPC['lower'];
    $data['top']=$_GPC['top'];
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
    $data['pic'] = $_GPC['pic'];
    $data['gearone'] = $_GPC['gearone'];
    $data['geartwo'] = $_GPC['geartwo'];
    $data['gearthree'] = $_GPC['gearthree'];
    $data['gearfour'] = $_GPC['gearfour'];
    $data['gearfive'] = $_GPC['gearfive'];
    $data['introone'] = $_GPC['introone'];
    $data['introtwo'] = $_GPC['introtwo'];
    $data['introthree'] = $_GPC['introthree'];
    $data['introfour'] = $_GPC['introfour'];
    $data['introfive'] = $_GPC['introfive'];


	if(empty($_GPC['id'])){
        $data['status']=1;
        $data['time']=time();
        $res = pdo_insert('lhyzhnc_sun_crowd', $data,array('uniacid'=>$_W['uniacid']));
        if($res){
            message('添加成功',$this->createWebUrl('crowd',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        // p($_GPC['storeid']);
        $res = pdo_update('lhyzhnc_sun_crowd', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('修改成功',$this->createWebUrl('crowd',array()),'success');
        }else{
            message('修改失败','','error');
        }
    }
}
include $this->template('web/crowdinfo');