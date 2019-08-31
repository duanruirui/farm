<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$template = "web/article_add";


if($_GPC['op']=='save'){
    if($_GPC['name']==null) {
        message('请您填写产品名称', '', 'error');
    }elseif($_GPC['img']==null){
        message('请您上传图片','','error');
    }elseif($_GPC['content']==null){
        message('详情不能为空','','error');
    }elseif($_GPC['cid']==0){
        message('分类不能不选择','','error');
    }
    ini_set('upload_max_filesize ','1024M');
    
    $id=intval($_GPC['id']);
    $data['name'] = $_GPC['name'];
    $data['cid'] = intval($_GPC['cid']);
    $data['addtime'] = time();
    $data['img'] = $_GPC['img'];
    // $data['isrecommend'] = $_GPC['isrecommend'];
    $data['sort'] = $_GPC['sort'];
    $data['content'] = html_entity_decode($_GPC['content']);
    // $data['content2']=html_entity_decode($_GPC['content2']);
    // $data['content3']=html_entity_decode($_GPC['content3']);
    $data['video_img'] = $_GPC['video_img'];
    $data['video'] = $_GPC['video'];
    // $data['video_img2'] = $_GPC['video_img2'];
    // $data['video2'] = $_GPC['video2'];
    // $data['video_img3'] = $_GPC['video_img3'];
    // $data['video3'] = $_GPC['video3'];
    $data['fenxiangtu']=$_GPC['fenxiangtu'];
    $data['imgs']=implode(",",$_GPC['imgs']);
    
    

    if($id==''){
        $data['status']=1;
        $data['comment'] = 1;
        $data['isshow']=1;
        
        $data['uniacid']=$_W['uniacid'];
        $res=pdo_insert('lhyzhnc_sun_article',$data);
        if($res){
            message('添加成功',$this->createWebUrl('article'),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_article', $data, array('id' => $id));
        if($res){
            message('修改成功',$this->createWebUrl('article'),'success');
        }else{
            message('修改失败','','error');
        }
    }
}elseif($_GPC['op']=='edit'){
    $id=intval($_GPC['id']);

    //$brand=pdo_getall('lhyzhnc_sun_store',array('uniacid'=>$_W['uniacid']));
    $storecate=pdo_getall('lhyzhnc_sun_articlecate',array('uniacid'=>$_W['uniacid'],'num'=>1));
    $info=pdo_get('lhyzhnc_sun_article',array('uniacid'=>$_W['uniacid'],'id'=>$id));
    //$goods=pdo_getall('lhyzhnc_sun_goods',array('uniacid'=>$_W['uniacid'],'bid'=>intval($info["bid"])));
    
    if($info['imgs']){
        if(strpos($info['imgs'],',')){
            $imgs= explode(',',$info['imgs']);
        }else{
            $imgs=array(
                0=>$info['imgs']
            );
        }
    }

    $template = "web/article_add";
}elseif($_GPC['op']=='search'){
    $sid=intval($_GPC['sid']);
    $name=$_GPC['name'];
    $where=" WHERE uniacid=".$_W['uniacid'];
    $sql="select gid,gname from " . tablename("lhyzhnc_sun_goods") ." ".$where." and sid = ".$sid." ";
    $list=pdo_fetchall($sql);
    echo json_encode($list);
    exit();
}else{
    //$brand=pdo_getall('lhyzhnc_sun_store',array('uniacid'=>$_W['uniacid']));
    $storecate=pdo_getall('lhyzhnc_sun_articlecate',array('uniacid'=>$_W['uniacid'],'num'=>1));

}

include $this->template($template);