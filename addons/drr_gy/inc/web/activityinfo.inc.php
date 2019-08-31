<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
//
$info=pdo_get('lhyzhnc_sun_activity',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
// $ship_type = $info["ship_type"]?explode(",",$info["ship_type"]):array();

// $brand=pdo_getall('lhyzhnc_sun_store',array('uniacid'=>$_W['uniacid']));
$storecate=pdo_getall('lhyzhnc_sun_articlecate',array('uniacid'=>$_W['uniacid'],'num'=>3));
$spec=pdo_getall('lhyzhnc_sun_spec',array('uniacid'=>$_W['uniacid']));

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
        message('请您填写产品名称', '', 'error');
    }elseif($_GPC['pic']==null){
        message('请您上传图片','','error');
    }elseif($_GPC['content']==null){
		message('详情不能为空','','error');
	}elseif($_GPC['cid']==0){
        message('分类不能不选择','','error');
    }

    $data['cid'] =  $_GPC['cid'];

    $data['sort'] = intval($_GPC["sort"]);
    // $data['stocktype'] = intval($_GPC["stocktype"]);
    $data['price']=$_GPC['price'];
    $data['oriprice']=$_GPC['oriprice'];
    $data['uniacid']=$_W['uniacid'];
    $data['name']=$_GPC['name'];
    $data['lottery']=$_GPC['lottery'];
    $data['label']=$_GPC['label'];
    $data['starttime']=$_GPC['starttime'];
    $data['endtime']=$_GPC['endtime'];
    $data['detail']=html_entity_decode($_GPC['detail']);
    $data['vir']=$_GPC['vir'];
    $data['pic'] = $_GPC['pic'];
    $data['img'] = $_GPC['img'];
    $data['content']=html_entity_decode($_GPC['content']);
    // $data['content2']=html_entity_decode($_GPC['content2']);
    // $data['content3']=html_entity_decode($_GPC['content3']);
    $data['video_img'] = $_GPC['video_img'];
    $data['video'] = $_GPC['video'];
    // $data['video_img2'] = $_GPC['video_img2'];
    // $data['video2'] = $_GPC['video2'];
    // $data['video_img3'] = $_GPC['video_img3'];
    // $data['video3'] = $_GPC['video3'];
    $data['fenxiangtu']=$_GPC['fenxiangtu'];
    $data['indeximg']=$_GPC['indeximg'];
    $data['imgs']=implode(",",$_GPC['imgs']);
    


    $data['num'] = $_GPC['num'];

	if(empty($_GPC['id'])){
        $data['status']=1;
        $data['comment']=1;
        $data['isshow']=1;

        $res = pdo_insert('lhyzhnc_sun_activity', $data,array('uniacid'=>$_W['uniacid']));
        if($res){
            message('添加成功',$this->createWebUrl('activity',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_activity', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
        if($res){
            message('修改成功',$this->createWebUrl('activity',array()),'success');
        }else{
            message('修改失败','','error');
        }
    }
}
include $this->template('web/activityinfo');