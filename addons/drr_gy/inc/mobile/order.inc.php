<?php
session_start();
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
				$order_data = array(
					'gid' => $_GET['gid'],
					'num' => $_GET['num'],
					'price' => $_GET['price'],
					'spec' => $_GET['spec'],
					'ordernum' => $time_arr[1].substr($time_arr[0], 2,3).rand(1000,9999),
					'uid' => $user_info['uid'],
					'addr' => $user_info['address'],
					'uname' => $user_info['name'],
					'time' => time(),
				);
			}else{
				$order_data = pdo_get('ims_lhyzhnc_sun_goodsorder',array('gid'=>$_GET['gid']));
			}

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