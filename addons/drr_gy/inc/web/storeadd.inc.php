<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

if(checksubmit('submit')){
    if($_GPC['storename']==null) {
        message('请您填写商家名称', '', 'error');
    }elseif($_GPC['content']==null){
        message('请您填写商家详情','','error');
    }elseif($_GPC['logo']==null){
        message('请您写上传图片','','error');die;
    }elseif($_GPC['phone']==null){
        message('为了方便客户找到店铺，请您写联系方式','','error');die;
    }
   

    // $store = $_GPC['sc_id'];
    // $storearr = array();
    // if(!empty($store)){
    //     $storearr = explode("$$$",$store);
    // }
    // $data['sc_id'] = $storearr[0];
    // $data['sc_name'] = $storearr[1];

    // $data['starttime']=$_GPC['starttime'];
    // $data['endtime']=$_GPC['endtime'];

    // $data['facility']=implode(",",$_GPC['facility']);

    $data['bind_openid'] = $_GPC['bind_openid'];

    // $coordinates = trim($_GPC['coordinates']);
    // $coordinatesarr = explode(",",$coordinates);
    // $data['coordinates'] = trim($coordinates);
    // $data['latitude'] = $coordinatesarr[0];//纬度
    // $data['longitude'] = $coordinatesarr[1];//精度
    $data['sort'] = intval($_GPC['sort']);

    $data['memdiscount'] = $_GPC['memdiscount'];
    // $data['commission'] = intval($_GPC['commission']);
    $data['uname']=$_GPC['uname'];
    $data['uniacid']=$_W['uniacid'];
    $data['storename']=$_GPC['storename'];
    $data['phone']=$_GPC['phone'];
    $data['address']=$_GPC['address'];
    $data['state']=$_GPC['state'];
    $data['num']=$_GPC['num'];
    // $data['img']=implode(",",$_GPC['img']);
    $data['content']=html_entity_decode($_GPC['content']);
    $data['logo']=$_GPC['logo'];

    if(empty($_GPC['id'])){
        $data['status']=1;
        
        $data['istop']=0;

        $res = pdo_insert('lhyzhnc_sun_store', $data,array('uniacid'=>$_W['uniacid']));

        if($res){
            message('添加成功',$this->createWebUrl('store',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{

        $res = pdo_update('lhyzhnc_sun_store', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
    }
    if($res){
        message('修改成功',$this->createWebUrl('store',array()),'success');
    }else{
        message('修改失败','','error');
    }
}elseif($_GPC['op']=='search'){
    $name=$_GPC['name'];
    $where=" WHERE uniacid=".$_W['uniacid'];
    $sql="select openid,name as uname from " . tablename("lhyzhnc_sun_user") ." ".$where." and name like'%".$name."%' ";
    $list=pdo_fetchall($sql);
    echo json_encode($list);
    exit();
}else{
    //获取分类
    // $sclist=pdo_getall('lhyzhnc_sun_storecate',array('uniacid'=>$_W['uniacid']));
    $id = intval($_GPC['id']);
    $info=pdo_get('lhyzhnc_sun_store',array('id'=>$id,'uniacid'=>$_W['uniacid']));
    //获取微信号
    $userlist=pdo_get('lhyzhnc_sun_user',array('uniacid'=>$_W['uniacid'],'openid'=>$info['bind_openid']),array("name"));
    $info["name"] = $userlist["name"];

    //获取店内设施
    // $sflist=pdo_getall('lhyzhnc_sun_storefacility',array('uniacid'=>$_W['uniacid']));
    // $facility = $info["facility"]?explode(",",$info["facility"]):array();
    // foreach($sflist as $k=> $v){
    //     if(in_array($v["id"], $facility)){
    //         $sflist[$k]["check"] = 1;
    //     }
    // }

    // if($info['img']){
    //     if(strpos($info['img'],',')){
    //         $img= explode(',',$info['img']);
    //     }else{
    //         $img=array(
    //             0=>$info['img']
    //         );
    //     }
    // }
}

include $this->template('web/storeadd');