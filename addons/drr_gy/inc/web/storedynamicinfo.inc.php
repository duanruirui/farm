<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
// $info=pdo_get('lhyzhnc_sun_storedynamic',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
$id=$_GPC['id'];
if($id){
    $info=pdo_fetch("SELECT a.*,b.`storename` FROM ".tablename('lhyzhnc_sun_storedynamic')."a left join ".tablename('lhyzhnc_sun_store')."b on b.id = a.sid where a.id = $id and  a.uniacid=".$_W['uniacid']." and b.uniacid=".$_W['uniacid']);
}
// $storename=pdo_get('')
$store=pdo_getall('lhyzhnc_sun_store',array('uniacid'=>$_W['uniacid'],'status'=>2,'state'=>1),array('id','storename')); 
// p($store);

foreach ($store as $key => $value) {

    $result=pdo_get('lhyzhnc_sun_storedynamic',array('uniacid'=>$_W['uniacid'],'sid'=>$value['id']));

    if($result){

        // array_splice($store,$key,1);
        unset($store[$key]);
    }

}
// p($store);

if(checksubmit('submit')){
    // if($_GPC['sid']==0) {
    //     message('请您选择绑定牧户', '', 'error');
    // }

    $data['content']=html_entity_decode($_GPC['content']);
    $data['content2']=html_entity_decode($_GPC['content2']);
    $data['content3']=html_entity_decode($_GPC['content3']);
    $data['video_img'] = $_GPC['video_img'];
    $data['video_img2'] = $_GPC['video_img2'];
    $data['video_img3'] = $_GPC['video_img3'];
    $data['video'] = $_GPC['video'];
    $data['video2'] = $_GPC['video2'];
    $data['video3'] = $_GPC['video3'];
    // $data['sort'] = $_GPC['sort'];
    
    $data['uniacid']=$_W['uniacid'];

	if(empty($_GPC['id'])){
    $data['status'] = 1;
        
        $data['sid'] = $_GPC['sid'];
        $res = pdo_insert('lhyzhnc_sun_storedynamic', $data,array('uniacid'=>$_W['uniacid']));
        
        if($res){
            message('添加成功',$this->createWebUrl('storedynamic',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_storedynamic', $data, array('id' => $_GPC['id'],'uniacid'=>$_W['uniacid']));
        
        if($res){
            message('修改成功',$this->createWebUrl('storedynamic',array()),'success');
        }else{
            message('修改失败','','error');
        }
    }
}
include $this->template('web/storedynamicinfo');