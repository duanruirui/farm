<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();

// if($_GPC['op']=='edituser'){
// 	$viplist = pdo_getall('lhyzhnc_sun_vip',array('uniacid'=>$_W['uniacid']));
// 	$info = pdo_get('lhyzhnc_sun_user',array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['id']));
// 	include $this->template('web/user_add');
// 	exit;
// }elseif($_GPC['op']=='updateuser'){
// 	$id=intval($_GPC['id']);
//     $data['viptype']=$_GPC['viptype'];
//     $data['endtime']=strtotime($_GPC['endtime']);
//     $data['telphone']=$_GPC['telphone'];
//     $data['addtime']=time();
//     $res = pdo_update('lhyzhnc_sun_user', $data, array('id' => $id));
//     if($res){
//         message('修改成功',$this->createWebUrl('user2'),'success');
//     }else{
//         message('修改失败','','error');
//     }
    
// }

$where=" WHERE uniacid= ".$_W['uniacid'];
// $keyword = $_GPC["keywords"];
// if(!empty($keyword)){
// 	$where .=" and name like'%".$keyword."%' ";
// 	$data[':name']=$keyword;
// }
if($_GPC['keywords']){
    $op=$_GPC['keywords'];
    $where .=" and name LIKE  '%$op%'";
    $data[':name']=$op;
}
$order=' order by id asc ';
if($_GPC['op']=='numdao'){
    $op=$_GPC['op'];
    $order =" order by num desc";
    $data[':numdao']=$op;
}
if($_GPC['op']=='numzheng'){
    $op=$_GPC['op'];
    $order =" order by num asc";
    $data[':numzheng']=$op;
}
if($_GPC['op']=='successdao'){
    $op=$_GPC['op'];
    $order =" order by success desc";
    $data[':successdao']=$op;
}
if($_GPC['op']=='successzheng'){
    $op=$_GPC['op'];
    $order =" order by success asc";
    $data[':success']=$op;
}
if($_GPC['op']=='commissiondao'){
    $op=$_GPC['op'];
    $order =" order by commission desc";
    $data[':commissiondao']=$op;
}
if($_GPC['op']=='commissionzheng'){
    $op=$_GPC['op'];
    $order =" order by commission asc";
    $data[':commissionzheng']=$op;
}
// p($order);
$data[':uniacid']=$_W['uniacid'];
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$sql="select * from " . tablename("lhyzhnc_sun_user") .$where.$order;
// p($sql);
$total=pdo_fetchcolumn("select count(id) as wname from " . tablename("lhyzhnc_sun_user") . $where,$data);
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql,$data);
foreach ($list as $key => $value) {
	$addr=pdo_get('lhyzhnc_sun_crowdorder',array('uniacid'=>$_W['uniacid'],'uid'=>$value['id']),array("addr",'phone'));
	$list[$key]['addr']=$addr['addr'];
	$list[$key]['phone']=$addr['phone'];
}
//print_r($list);
$pager = pagination($total, $pageindex, $pagesize);

// foreach ($list as $k=>$v){
//     $data = pdo_get('lhyzhnc_sun_vip',array('uniacid'=>$_W['uniacid'],'id'=>$v['viptype']));
//     $list[$k]['title']=$data['title'];
//     $list[$k]['endtime']=date('Y-m-d',$v['endtime']);
// }

	if($_GPC['op']=='delete'){
		$res4=pdo_delete("lhyzhnc_sun_user",array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
		if($res4){
		 message('删除成功！', $this->createWebUrl('user2'), 'success');
		}else{
			  message('删除失败！','','error');
		}
	}
	// if($_GPC['op']=='defriend'){
	// 	$res4=pdo_update("lhyzhnc_sun_user",array('state'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
	// 	if($res4){
	// 	 message('拉黑成功！', $this->createWebUrl('user2',array('page'=>$_GPC['page'])), 'success');
	// 	}else{
	// 		  message('拉黑失败！','','error');
	// 	}
	// }
	// if($_GPC['op']=='relieve'){
	// 	$res4=pdo_update("lhyzhnc_sun_user",array('state'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
	// 	if($res4){
	// 	 message('取消成功！', $this->createWebUrl('user2',array('page'=>$_GPC['page'])), 'success');
	// 	}else{
	// 		  message('取消失败！','','error');
	// 	}
	// }
include $this->template('web/user2');