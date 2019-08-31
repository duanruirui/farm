<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$template = "web/messageinfo";

if($_GPC['op']=='save'){
    ini_set('upload_max_filesize ','1024M');
    
    $id=intval($_GPC['id']);
    $data['name'] = $_GPC['name'];
    $data['addtime'] = time();
    $data['img'] = $_GPC['img'];
    $data['isrecommend'] = $_GPC['isrecommend'];
    $data['sort'] = $_GPC['sort'];
    $data['content'] = html_entity_decode($_GPC['content']);
    $data['content2']=html_entity_decode($_GPC['content2']);
    $data['content3']=html_entity_decode($_GPC['content3']);
    $data['video_img'] = $_GPC['video_img'];
    $data['video'] = $_GPC['video'];
    $data['video_img2'] = $_GPC['video_img2'];
    $data['video2'] = $_GPC['video2'];
    $data['video_img3'] = $_GPC['video_img3'];
    $data['video3'] = $_GPC['video3'];
    $data['fenxiangtu']=$_GPC['fenxiangtu'];
    

    if($id==''){
        $data['status']=1;
        $data['comment'] = 1;
        $data['uniacid']=$_W['uniacid'];
        $res=pdo_insert('lhyzhnc_sun_message',$data);
        if($res){
            message('添加成功',$this->createWebUrl('message'),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_message', $data, array('id' => $id));
        if($res){
            message('修改成功',$this->createWebUrl('message'),'success');
        }else{
            message('修改失败','','error');
        }
    }
}elseif($_GPC['op']=='edit'){
    $id=intval($_GPC['id']);
    $info=pdo_get('lhyzhnc_sun_message',array('uniacid'=>$_W['uniacid'],'id'=>$id));
    $template = "web/messageinfo";
}

include $this->template($template);