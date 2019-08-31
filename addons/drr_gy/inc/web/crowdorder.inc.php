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
if($_GPC['phone']){
   $phone=$_GPC['phone'];
    $where.=" and  a.phone LIKE  concat('%', :phone,'%') ";
    $data[':phone']=$_GPC['phone'];   
}
if($_GPC['ear']){
   $ear=$_GPC['ear'];
   // p($ear);
   // $ordernum=pdo_get('lhyzhnc_sun_choosestore',array('uniacid'=>$_W['uniacid'],'ear'=>))
   $res=pdo_fetch('select ordernum from '.tablename('lhyzhnc_sun_choosestore')." where ear like concat('%".$ear."%')");
   // p('select ordernum from '.tablename('lhyzhnc_sun_choosestore')." where ear like concat('%',:ear,'%')");
   $ordernum=$res['ordernum'];
    $where.=" and  a.ordernum LIKE  concat('%', $ordernum,'%') ";
    // $data[':ear']=$_GPC['ear'];   
}
if($_GPC['stateid']){
   $state=$_GPC['state'];
   $stateid=$_GPC['stateid'];
    $where.=" and  b.id =:stateid ";
    $data[':stateid']=$_GPC['stateid'];   

}
if($_GPC['istui']!=null){
   $refund=$_GPC['refund'];
   $istui=$_GPC['istui'];
    $where.=" and  a.istui =:istui ";
    $data[':istui']=$_GPC['istui'];   

}
// $crowd=pdo_getall('lhyzhnc_sun_crowd',array('uniacid'=>$_W['uniacid'],'status'=>2));
$crowd=pdo_fetchall('select id,name from '.tablename('lhyzhnc_sun_crowd')." where  uniacid = ".$_W['uniacid']." order by time desc");

if(!empty($_GPC['active'])){
    $active=$_GPC['active'];
    $where.=" and  b.name LIKE  concat('%', :active,'%') ";
    $data[':active']=$_GPC['active'];   
}

$sql="SELECT a.*,b.name,b.gearone,b.geartwo,b.gearthree,b.gearfour,b.gearfive  FROM ".tablename('lhyzhnc_sun_crowdorder') .  " a"  . " left join " . tablename("lhyzhnc_sun_crowd")."b on a.cid = b.id " .$where." order BY a.time desc";
$data[':uniacid']=$_W['uniacid'];
$total=pdo_fetchcolumn("SELECT count(*) FROM ".tablename('lhyzhnc_sun_crowdorder') .  " a"  . " left join " . tablename("lhyzhnc_sun_crowd") ."b on a.cid = b.id ".$where." order BY a.time desc",$data);

$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list=pdo_fetchall($select_sql,$data);
foreach ($list as $key => $value) {
    $list[$key]['time'] = date('Y-m-d H:i:s', $list[$key]['time']);
    
};
$pager = pagination($total, $pageindex, $pagesize);


if($operation=='delete'){
    // $order=pdo_get('lhyzhnc_sun_crowdorder',array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['id']),array('ordernum'));
    // $ordernum=$order['ordernum'];
	$res=pdo_delete('lhyzhnc_sun_crowdorder',array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));

	if($res){
        
        // $erweima=pdo_getall('lhyzhnc_sun_choosestore',array('uniacid'=>$_W['uniacid'],'ordernum'=>$ordernum),array('erweima'));
        // foreach ($erweima as $key => $value) {
        //     unlink(IA_ROOT.'/attachment/'.$value['erweima']);

        // }
        // $res1=pdo_delete('lhyzhnc_sun_choosestore',array('uniacid'=>$_W['uniacid'],'ordernum'=>$ordernum));
		message('删除成功',$this->createWebUrl('crowdorder',array()),'success');
	}else{
		message('删除失败','','error');
	}
}
if($operation=='complete'){
  $res=pdo_update('lhyzhnc_sun_crowdorder',array('status'=>4),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
  if($res){
    message('操作成功',$this->createWebUrl('crowdorder',array()),'success');
  }else{
    message('操作失败','','error');
  }
}
if($operation=='addr'){

    $data1['uname']=$_GPC['uname'];
    $data1['phone']=$_GPC['phone'];
    $data1['addr']=$_GPC['addr'];
    // p($data);
  $res=pdo_update('lhyzhnc_sun_crowdorder',$data1,array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
  if($res){
    message('操作成功',$this->createWebUrl('crowdorder',array()),'success');
  }else{
    message('操作失败','','error');
  }
}
// if($operation=='pass'){
//   $res=pdo_update('lhyzhnc_sun_crowdorder',array('istui'=>1),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
//   if($res){
//     message('操作成功',$this->createWebUrl('crowdorder',array()),'success');
//   }else{
//     message('操作失败','','error');
//   }
// }if($operation=='nopass'){
//   $res=pdo_update('lhyzhnc_sun_crowdorder',array('istui'=>2),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
//   if($res){
//     message('操作成功',$this->createWebUrl('crowdorder',array()),'success');
//   }else{
//     message('操作失败','','error');
//   }
// }
if($_GPC['op']=='refund'){
    $id = intval($_GPC['id']);
    $uniacid = $_W['uniacid'];
    $refund = intval($_GPC['refund']);
    if($refund==3){
        $ress = pdo_update('lhyzhnc_sun_crowdorder',array("istui"=>3),array('id'=>$id,'uniacid'=>$uniacid));
        if($ress){
            message('拒绝成功！', $this->createWebUrl('crowdorder'), 'success');
        }else{
            message('拒绝失败！','','error');
        }
    }

    // //获取订单信息
    $order = pdo_get('lhyzhnc_sun_crowdorder',array('uniacid'=>$uniacid,'id'=>$id),array('ordernum',"price","out_trade_no","out_refund_no","cid",'uid'));
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
    
    // var_dump($result);
    if ($result['result_code'] == 'SUCCESS') {//退款成功
        pdo_update('lhyzhnc_sun_crowdorder',array("istui "=>2,'status'=>6,"out_refund_no ="=>$out_refund_no),array('id'=>$id,'uniacid'=>$uniacid));
        // pdo_update("lhyzhnc_sun_user",array('success'=>0,'commission'=>0),array('uniacid'=>$_W['uniacid'],'id'=>$order['uid']));
        // $res=pdo_fetch("select a.num as count,b.* from ".tablename('lhyzhnc_sun_crowdorder')."a left join ".tablename("lhyzhnc_sun_user")."b on b.id = a.uid where a.id=".$id." and a.uniacid = ".$_W['uniacid']." and b.uniacid = ".$_W['uniacid']);
        // // p($res);
        // $yongjin=pdo_get('lhyzhnc_sun_extend',array('uniacid'=>$_W['uniacid']),array('userprice','yewuprice'));
        // if($res['state']==1){
        //     $uid=$res['inviter'];
        //     $result1 = pdo_get('lhyzhnc_sun_yongjin',array('uniacid'=>$_W['uniacid'],'uid'=>$uid,'ordernum'=>$order['ordernum']));
        //     if($result1){
        //         $money=$result1['money'];
        //         $res1=  pdo_update('lhyzhnc_sun_yongjin',array('money'=>0),array('uniacid'=>$_W['uniacid'],'uid'=>$uid,'ordernum'=>$order['ordernum']));
        //         $usermoney=pdo_get('lhyzhnc_sun_user',array('uniacid'=>$_W['uniacid'],'id'=>$uid));
        //         // load()->func('logging');
        //         // logging_run(json_encode($usermoney), 'trace','test333' );
        //         // logging_run(json_encode($money), 'trace','test333' );

        //         if($usermoney['commission']>=$money){
        //             $result2= pdo_update("lhyzhnc_sun_user",array('commission -='=>$money,'success -='=>1),array('uniacid'=>$_W['uniacid'],'id'=>$uid));
        //         }else{
        //             $result2= pdo_update("lhyzhnc_sun_user",array('commission'=>0,'success -='=>1),array('uniacid'=>$_W['uniacid'],'id'=>$uid));
        //         }
        //     }
        // }else if($res['state']==2){
        //     $eid=$res['inviter'];
        //     $extend=pdo_get('lhyzhnc_sun_extendlist',array('uniacid'=>$_W['uniacid'],'id'=>$eid));
        //     $money=$extend['money']-$res['count']*$yongjin['yewuprice'];
        //     if($money<0){
        //         $money=0;
        //     }
        //     $add=pdo_update("lhyzhnc_sun_extendlist",array('money'=>$money),array('uniacid'=>$_W['uniacid'],'id'=>$eid));

        // }
        message('退款成功！', $this->createWebUrl('crowdorder'), 'success');
    }else{
        pdo_update('lhyzhnc_sun_crowdorder',array("istui "=>3,"out_refund_no "=>$out_refund_no),array('id'=>$id,'uniacid'=>$uniacid));

            message('退款失败！微信'.$result["err_code_des"],'','error');
  
    }
}
if($operation=='renewal'){
    // p($_GPC);
    if(empty($_GPC['way'])){
        message('快递方式不得为空！',$this->createWebUrl('crowdorder'),'error');
    }else if(empty($_GPC['waybill'])){
        message('快递单号不得为空！',$this->createWebUrl('crowdorder'),'error');
    }else{
        $data1['way']=$_GPC['way'];
        $data1['waybill']=$_GPC['waybill'];
        $data1['status']=3;
        // p($data1);
        $res=pdo_update('lhyzhnc_sun_crowdorder',$data1,array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
        
        if($res){
            message('发货成功',$this->createWebUrl('crowdorder',array()),'success');
        }else{
            message('发货失败','','error');
        }
    }

    
}
// if($operation=='delivery'){
	
//    $res=pdo_update('lhyzhnc_sun_crowdorder',array('state'=>3,'fh_time'=>time()),array('id'=>$_GPC['id'],'uniacid'=>$_W['uniacid']));
// 	if($res){
// 		message('操作成功',$this->createWebUrl('crowdorder',array()),'success');
// 	}else{
// 		message('操作失败','','error');
// 	}
// }


include $this->template('web/crowdorder');