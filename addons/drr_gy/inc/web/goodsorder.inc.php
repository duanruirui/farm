<?php
global $_GPC, $_W;
// $action = 'ad';
// $title = $this->actions_titles[$action];
$GLOBALS['frames'] = $this->getMainMenu();
$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
$type=isset($_GPC['type'])?$_GPC['type']:'all';

load()->func('tpl');
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$where=" WHERE  a.uniacid=:uniacid  ";

// if($_GPC['status']){
//    $status=$_GPC['status'];
//     $where.=" and  a.status =  :status ";
//     $data[':status']=$_GPC['status'];   

// }
if($_GPC['status']!=null){
   $status=$_GPC['status'];
    $where.=" and  a.status =  :status ";
    $data[':status']=$_GPC['status'];   

}
if($_GPC['keywords']){
   $op=$_GPC['keywords'];
    $where.=" and  a.uname LIKE  concat('%', :name,'%') ";
    $data[':name']=$_GPC['keywords'];   

}
if(!empty($_GPC['active'])){
    $active=$_GPC['active'];
    $where.=" and  b.gname LIKE  concat('%', :active,'%') ";
    $data[':active']=$_GPC['active'];   
}
if($_GPC['istui']!=null){
   $refund=$_GPC['refund'];
   $istui=$_GPC['istui'];
    $where.=" and  a.istui =:istui ";
    $data[':istui']=$_GPC['istui'];   

}

$sql="SELECT a.*,b.gname,c.name as typename  FROM ".tablename('lhyzhnc_sun_goodsorder') .  " a"  . " left join " . tablename("lhyzhnc_sun_goods") . " b on a.gid=b.id left join ".tablename('lhyzhnc_sun_articlecate')." c on c.id = b.cid left join ".tablename('lhyzhnc_sun_user')." d on d.id = a.uid".$where." order BY a.time desc";
$data[':uniacid']=$_W['uniacid'];
$total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('lhyzhnc_sun_goodsorder') .  " a"  . " left join " . tablename("lhyzhnc_sun_goods") . " b on a.gid=b.id left join ".tablename('lhyzhnc_sun_articlecate')." c on c.id = b.cid left join ".tablename('lhyzhnc_sun_user')." d on d.id = a.uid".$where." order BY a.time desc",$data);

$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql,$data);
foreach ($list as $key => $value) {
    $list[$key]['time'] = date('Y-m-d H:i:s', $list[$key]['time']);
};
$pager = pagination($total, $pageindex, $pagesize);


if($operation=='delete'){
	$res=pdo_delete('lhyzhnc_sun_goodsorder',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
	if($res){
		message('删除成功',$this->createWebUrl('goodsorder',array()),'success');
	}else{
		message('删除失败','','error');
	}
}
if($operation=='complete'){
  $res=pdo_update('lhyzhnc_sun_goodsorder',array('status'=>3),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
  if($res){
    message('操作成功',$this->createWebUrl('goodsorder',array()),'success');
  }else{
    message('操作失败','','error');
  }
}
if($operation=='addr'){

    $data1['uname']=$_GPC['uname'];
    $data1['phone']=$_GPC['phone'];
    $data1['addr']=$_GPC['addr'];
    // p($data);
  $res=pdo_update('lhyzhnc_sun_goodsorder',$data1,array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
  if($res){
    message('操作成功',$this->createWebUrl('goodsorder',array()),'success');
  }else{
    message('操作失败','','error');
  }
}
// if($operation=='pass'){
//   $res=pdo_update('lhyzhnc_sun_goodsorder',array('istui'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
//   if($res){
//     message('操作成功',$this->createWebUrl('goodsorder',array()),'success');
//   }else{
//     message('操作失败','','error');
//   }
// }if($operation=='nopass'){
//   $res=pdo_update('lhyzhnc_sun_goodsorder',array('istui'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
//   if($res){
//     message('操作成功',$this->createWebUrl('goodsorder',array()),'success');
//   }else{
//     message('操作失败','','error');
//   }
// }
if($_GPC['op']=='refund'){
    $id = intval($_GPC['id']);
    $uniacid = $_W['uniacid'];
    $refund = intval($_GPC['refund']);
    if($refund==3){
        $ress = pdo_update('lhyzhnc_sun_goodsorder',array("istui"=>3),array('id'=>$id,'uniacid'=>$uniacid));
        if($ress){
            message('拒绝成功！', $this->createWebUrl('goodsorder'), 'success');
        }else{
            message('拒绝失败！','','error');
        }
    }

    //获取订单信息
    $order = pdo_get('lhyzhnc_sun_goodsorder',array('uniacid'=>$uniacid,'id'=>$id),array('spec','num',"price","out_trade_no","out_refund_no","gid"));
    //退款操作
    include_once IA_ROOT . '/addons/lhyzhnc_sun/cert/WxPay.Api.php';
    load()->model('account');
    load()->func('communication');
    //获取appid和appkey
    $res=pdo_get('lhyzhnc_sun_system',array('uniacid'=>$uniacid));
    $appid=$res['appid'];
    $wxkey=$res['wxkey'];
    $mchid=$res['mchid'];
    $path_cert = IA_ROOT . "/attachment/".$res['apiclient_cert'];
    $path_key = IA_ROOT . "/attachment/".$res['apiclient_key'];
    $out_trade_no=$order['out_trade_no'];
    $fee = $order['price'] * 100;
    $out_refund_no = $order['out_refund_no']?$order['out_trade_no']:$mchid.rand(100,999).time().rand(1000,9999);
    $WxPayApi = new WxPayApi();
    $input = new WxPayRefund();
    $input->SetAppid($appid);
    $input->SetMch_id($mchid);
    $input->SetOp_user_id($mchid);
    $input->SetRefund_fee($fee);
    $input->SetTotal_fee($fee);
    $input->SetOut_refund_no($out_refund_no);
    $input->SetOut_trade_no($out_trade_no);
    $result = $WxPayApi->refund($input, 6, $path_cert, $path_key, $wxkey);
    
    // p($result);
    if ($result['result_code'] == 'SUCCESS') {//退款成功
        pdo_update('lhyzhnc_sun_goodsorder',array("istui "=>2,"out_refund_no ="=>$out_refund_no,'status'=>5),array('id'=>$id,'uniacid'=>$uniacid));
        $res=pdo_get('lhyzhnc_sun_goods',array('uniacid'=>$_W['uniacid'],'id'=>$order['gid']),array('speccontent','specnum'));
        $res['speccontent']=explode(',', $res['speccontent']);
        $res['specnum']=explode(',', $res['specnum']);
        $spec=$order['spec'];
        foreach ($res['speccontent'] as $key => $value) {
            if($value==$spec){
                $k=$key;
            }
        }
        $res['specnum'][$k]=$res['specnum'][$k]+$order['num'];

        $uniacid = $_W['uniacid'];
        $result1=pdo_update('lhyzhnc_sun_goods',array('specnum'=>implode(',',$res['specnum'])),array('uniacid'=>$_W['uniacid'],'id'=>$order['gid']));

        // $result1=pdo_update('lhyzhnc_sun_goodsorder',array('status'=>1),array("uniacid"=>$_W['uniacid'],'ordernum'=>$ordernum));
        message('退款成功！', $this->createWebUrl('goodsorder'), 'success');
    }else{
        pdo_update('lhyzhnc_sun_goodsorder',array("istui "=>3,"out_refund_no "=>$out_refund_no),array('id'=>$id,'uniacid'=>$uniacid));

        message('退款失败！微信'.$result["err_code_des"],'','error');
  
    }
}
if($operation=='renewal'){
    // p($_GPC);
    if(empty($_GPC['way'])){
        message('快递方式不得为空！',$this->createWebUrl('goodsorder'),'error');
    }else if(empty($_GPC['waybill'])){
        message('快递单号不得为空！',$this->createWebUrl('goodsorder'),'error');
    }else{
        $data1['way']=$_GPC['way'];
        $data1['waybill']=$_GPC['waybill'];
        $data1['status']=2;
        // p($data1);
        $res=pdo_update('lhyzhnc_sun_goodsorder',$data1,array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
        
        if($res){
            message('发货成功',$this->createWebUrl('goodsorder',array()),'success');
        }else{
            message('发货失败','','error');
        }
    }

    
}
// if($operation=='delivery'){
	
//    $res=pdo_update('lhyzhnc_sun_goodsorder',array('state'=>3,'fh_time'=>time()),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
// 	if($res){
// 		message('操作成功',$this->createWebUrl('goodsorder',array()),'success');
// 	}else{
// 		message('操作失败','','error');
// 	}
// }


include $this->template('web/goodsorder');