<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
 $item=pdo_get('lhyzhnc_sun_system',array('uniacid'=>$_W['uniacid']));

if(checksubmit('submit')){
    $data['pt_name']=$_GPC['pt_name'];
    $data['tel']=$_GPC['tel'];
    // $data['details']=html_entity_decode($_GPC['details']);
    // $data['address']=$_GPC['address'];
    $data['link_logo']=$_GPC['link_logo'];
    $data['wg_img']=$_GPC['wg_img'];
    $data['link_name']=$_GPC['link_name'];
    // $data['mail']=$_GPC['mail'];
    $data['pic']=$_GPC['pic'];
    $data['fontcolor']=$_GPC['fontcolor'];

    // $data['tech_title']=$_GPC['tech_title'];
    // $data['tech_phone']=$_GPC['tech_phone'];
    // $data['tech_img']=$_GPC['tech_img'];
    // $data['is_show_tech']=$_GPC['is_show_tech'];

    $data['showcheck']=$_GPC['showcheck'];
    $data['version']=$_GPC['version'];
    $data['fenxiangtu']=$_GPC['fenxiangtu'];
    $data['fenxiangtu2']=$_GPC['fenxiangtu2'];
    $data['fenxiangtu3']=$_GPC['fenxiangtu3'];
    $data['fenxiangzi']=$_GPC['fenxiangzi'];
    $data['fenxiangzi2']=$_GPC['fenxiangzi2'];
    $data['fenxiangzi3']=$_GPC['fenxiangzi3'];

    $data['haibaotu']=$_GPC['haibaotu'];
    

    if($_GPC['color']){
        $data['color']=$_GPC['color'];
    }else{
        $data['color']="#ED414A";
    }

    if($_GPC['id']==''){      
        $data['uniacid']=$_W['uniacid'];          
        $res=pdo_insert('lhyzhnc_sun_system',$data);
        if($res){
            message('添加成功',$this->createWebUrl('settings',array()),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_system', $data, array('id' => $_GPC['id']));
        if($res){
            message('编辑成功',$this->createWebUrl('settings',array()),'success');
        }else{
            message('编辑失败','','error');
        }
    }
}
include $this->template('web/settings');