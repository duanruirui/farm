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
			if ($_GET['handle']=='neworder') {
				$time_arr = explode(' ', microtime());
				$ordernum = $time_arr[1].substr($time_arr[0], 2,3).rand(1000,9999);
				$order_data = array(
					'gid' => $_GET['gid'],
					'num' => $_GET['num'],
					'price' => $_GET['price']*$_GET['num'],
					'spec' => $_GET['spec'],
					'ordernum' => $ordernum,
					'uid' => $user_info['uid'],
					'addr' => $_GET['address'],
					'uname' => $user_info['name'],
					'phone' => $user_info['phone'],
					'status' => 0,
					'time' => time(),
				);
				pdo_insert('ims_lhyzhnc_sun_goodsorder',$order_data);

			    $url = $this->createMobileUrl('order', array('op' => 'goods','ordernum' => $ordernum));

			    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=".$url."\">";

			    die;
			}
			$ordernum = $_GET['ordernum'];
			$order_data = pdo_fetch('select o.*,g.gname,g.pic,g.img,g.price as gprice from ims_lhyzhnc_sun_goodsorder as o left join ims_lhyzhnc_sun_goods as g on g.id = o.gid where o.ordernum=:ordernum',array('ordernum'=>$ordernum));
			$order_data['status_statement'] = $GOODS_STATUS[$order_data['status']];
			break;
		
		case 'activity':
			#
			break;
		default:
			# code...
			break;
	}

    include $this->template('order_info');

}