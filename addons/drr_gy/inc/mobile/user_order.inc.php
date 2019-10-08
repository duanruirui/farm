<?php
session_start();

if (empty($_SESSION['app_user_login'])) {

    $_SESSION['before_login'] = $_SERVER['REQUEST_URI'];

    $url = $this->createMobileUrl('index', array('op' => 'login'));

   echo "<meta http-equiv=\"refresh\" content=\"0.5;url=".$url."\">";

   die;

}else{
	$user_info = $_SESSION['app_user_login'];
}
switch ($_GET['op']) {
  case 'index':
  case 'adopt':
    $ADOPT_STATUS = array(1=>'未支付',2=>'已支付',3=>'已发货',4=>'已完成',5=>'已取消');
    $adopt_orders = pdo_getall('lhyzhnc_sun_adoptorder',array('uid'=>$user_info['id']));
    $aids = get_column_arr($adopt_orders,'aid');
    $adopts = pdo_fetchall("select * from ims_lhyzhnc_sun_adopt where id in (".implode(',', $aids).")");
    $adopts_arr = key_array($adopts,'id');
    foreach ($adopt_orders as $key => $value) {
        $adopt_orders[$key]['img'] = $adopts_arr[$value['aid']]['img'];
        $adopt_orders[$key]['name'] = $adopts_arr[$value['aid']]['name'];
        $adopt_orders[$key]['status_state'] = $ADOPT_STATUS[$value['status']];
        $adopt_orders[$key]['time'] = date('Y-m-d H:i:s',$value['time']);
    }
    $order_data = $adopt_orders;
    break;

  case 'goods':
    $GOODS_STATUS = array(0=>'未支付',1=>'已支付',2=>'已发货',3=>'已完成',4=>'已取消');
    $goods_orders = pdo_getall('lhyzhnc_sun_goodsorder',array('uid'=>$user_info['id']));
    $gids = get_column_arr($goods_orders,'gid');
    $goods = pdo_fetchall("select * from ims_lhyzhnc_sun_goods where id in (".implode(',', $gids).")");
    $goods_arr = key_array($goods,'id');
    foreach ($goods_orders as $key => $value) {
        $goods_orders[$key]['img'] = $goods_arr[$value['gid']]['img'];
        $goods_orders[$key]['name'] = $goods_arr[$value['gid']]['gname'];
        $goods_orders[$key]['status_state'] = $GOODS_STATUS[$value['status']];
        $goods_orders[$key]['time'] = date('Y-m-d H:i:s',$value['time']);
    }
    $order_data = $goods_orders;
    break;

  case 'crowd':
    $CRAWD_STATUS = array(1=>'未支付',2=>'已支付',3=>'已发货',4=>'已完成',5=>'已取消');
    $crowd_orders = pdo_getall('lhyzhnc_sun_crowdorder',array('uid'=>$user_info['id']));
    $cids = get_column_arr($crowd_orders,'cid');
    $crowd = pdo_fetchall("select * from ims_lhyzhnc_sun_goods where id in (".implode(',', $cids).")");
    $crowd_arr = key_array($crowd,'id');
    foreach ($crowd_orders as $key => $value) {
        $crowd_orders[$key]['img'] = $crowd_arr[$value['cid']]['img'];
        $crowd_orders[$key]['name'] = $crowd_arr[$value['cid']]['name'];
        $crowd_orders[$key]['status_state'] = $CRAWD_STATUS[$value['status']];
        $crowd_orders[$key]['time'] = date('Y-m-d H:i:s',$value['time']);
    }
    $order_data = $crowd_orders;
    break;

  case 'activity':
    $ACTIVETY_STATUS = array(0=>'未支付',1=>'待核销',2=>'已核销',3=>'已取消',4=>'退款成功');
    $activity_orders = pdo_getall('lhyzhnc_sun_activityorder',array('uid'=>$user_info['id']));
    $aids = get_column_arr($activity_orders,'aid');
    $activitys = pdo_fetchall("select * from ims_lhyzhnc_sun_adopt where id in (".implode(',', $aids).")");
    $activitys_arr = key_array($activitys,'id');
    foreach ($activity_orders as $key => $value) {
        $activity_orders[$key]['img'] = $activitys_arr[$value['aid']]['img'];
        $activity_orders[$key]['name'] = $activitys_arr[$value['aid']]['name'];
        $activity_orders[$key]['status_state'] = $ACTIVETY_STATUS[$value['status']];
        $activity_orders[$key]['time'] = date('Y-m-d H:i:s',$value['time']);
    }
    $order_data = $activity_orders;
    break;

  default:
    # code...
    break;
}

include $this->template('user_order');



function get_column_arr($arr,$columname){
    $columns = array();
    foreach ($arr as $key => $value) {
       array_push($columns, $value[$columname]);
    }
    return $columns;
}
function key_array($arr,$keyname){
    $new_arr = array();
    foreach ($arr as $key => $value) {
        $new_arr[$value[$keyname]] = $value;
    }
    return $new_arr;
}