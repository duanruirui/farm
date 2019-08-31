<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
 $item=pdo_get('lhyzhnc_sun_system',array('uniacid'=>$_W['uniacid']));

if(checksubmit('submit')){
    $data['tech_title']=$_GPC['tech_title'];
    $data['tech_phone']=$_GPC['tech_phone'];
    $data['tech_img']=$_GPC['tech_img'];
    $data['is_show_tech']=$_GPC['is_show_tech'];

    if($_GPC['id']==''){      
        $data['uniacid']=$_W['uniacid'];          
        $res=pdo_insert('lhyzhnc_sun_system',$data);
        if($res){
            message('添加成功',$this->createWebUrl('copyright',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_system', $data, array('id' => $_GPC['id']));
        if($res){
            message('编辑成功',$this->createWebUrl('copyright',array()),'success');
        }else{
            message('编辑失败','','error');
        }
    }
}
include $this->template('web/copyright');