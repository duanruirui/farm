<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
//调用
// include IA_ROOT . '/addons/lhyzhnc_sun/inc/func/func.php';
$template = "web/settabadd";
// $typearr = GetPositon();
// $typearr_noinput = GetNoShowinput();
$info=pdo_get('lhyzhnc_sun_settab',array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['id']));


    
if(checksubmit('submit')){
    // $id=intval($_GPC['id']);
    $data['name'] = $_GPC['name'];
    $data['img'] = $_GPC['img'];
    $data['path'] = $_GPC['path'];
    $data['sort'] = $_GPC['sort'];
    $data['type'] = 1;
    

    if($_GPC['id']==''){
        $data['uniacid']=$_W['uniacid'];
        $data['status']=1;
        $res=pdo_insert('lhyzhnc_sun_settab',$data);
        if($res){
            message('添加成功',$this->createWebUrl('settab'),'success');
        }else{
            message('添加失败','','error');
        }
    }else{
        $res = pdo_update('lhyzhnc_sun_settab', $data, array('id' => $_GPC['id']));
        if($res){
            message('修改成功',$this->createWebUrl('settab'),'success');
        }else{
            message('修改失败','','error');
        }
    }
}


include $this->template($template);