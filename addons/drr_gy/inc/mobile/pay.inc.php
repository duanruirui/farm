<?php
session_start();

$GOODS_STATUS = array(0=>'未支付',1=>'已支付',2=>'已发货',3=>'已完成',4=>'已取消');
$CRAWD_STATUS = array(1=>'未支付',2=>'已支付',3=>'已发货',4=>'已完成',5=>'已取消');
$ADOPT_STATUS = array(1=>'未支付',2=>'已支付',3=>'已发货',4=>'已完成',5=>'已取消');
$ACTIVETY_STATUS = array(0=>'未支付',1=>'待核销',2=>'已核销',3=>'已取消',4=>'退款成功');

//如果没有登录或者登录过期，先登录
if (empty($_SESSION['app_user_login'])) {

    $_SESSION['before_login'] = $_SERVER['REQUEST_URI'];

    $url = $this->createMobileUrl('index', array('op' => 'login'));

    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=".$url."\">";

    die;

}else{

	$user_info = $_SESSION['app_user_login'];

	switch ($_GET['op']) {
		case 'goods':
			$order_info = pdo_get('lhyzhnc_sun_goodsorder',array('ordernum'=>$_GET['ordernum']));
			if($order_info['status']!=0) echo '订单状态不允许支付';

			break;
		
		case 'activity':
			#
			break;
		default:
			# code...
			break;
	}

}