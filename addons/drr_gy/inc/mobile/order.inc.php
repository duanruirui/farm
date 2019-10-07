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
	global $_W;
	switch ($_GET['op']) {
		case 'goods':
			if ($_GET['handle']=='new') {
				$time_arr = explode(' ', microtime());
				$ordernum = $time_arr[1].substr($time_arr[0], 2,3).rand(1000,9999);
				$price = pdo_fetchcolumn('select specprice from ims_lhyzhnc_sun_goods where id = '.$_GET['gid']);
				$pric_arr = explode(',', $price);
				$order_data = array(
					'gid' => $_GET['gid'],
					'uniacid' => $_W['uniacid'],
					'num' => $_GET['num'],
					'price' => $pric_arr[$_GET['speci']]*$_GET['num'],
					'spec' => $_GET['spec'],
					'ordernum' => $ordernum,
					'uid' => $user_info['id'],
					'addr' => $_GET['addr'],
					'uname' => $user_info['name'],
					'phone' => $user_info['telphone'],
					'status' => 0,
					'time' => $time_arr[1],
				);
				pdo_insert('ims_lhyzhnc_sun_goodsorder',$order_data);
			    $url = $this->createMobileUrl('order', array('op' => 'goods','ordernum' => $ordernum));
			}else{
				$ordernum = $_GET['ordernum'];
			}
			$order_data = pdo_fetch('select o.*,g.gname,g.pic,g.img,g.price as gprice from ims_lhyzhnc_sun_goodsorder as o left join ims_lhyzhnc_sun_goods as g on g.id = o.gid where o.ordernum=:ordernum',array('ordernum'=>$ordernum));
			$order_data['status_statement'] = $GOODS_STATUS[$order_data['status']];
			include $this->template('goods_order_info');
			break;
		
		case 'crowd':
			if ($_GET['handle']=='new') {
				$time_arr = explode(' ', microtime());
				$ordernum = $time_arr[1].substr($time_arr[0], 2,3).rand(1000,9999);
				$crowd = pdo_fetch('select * from ims_lhyzhnc_sun_crowd where id = '.$_GET['gid']);
				$crowd_data = array(
					'cid' => $_GET['gid'],
					'uniacid' => $_W['uniacid'],
					'ordernum' => $ordernum,
					'uid' => $user_info['id'],
					'addr' => $_GET['addr'],
					'num' => $_GET['num'],
					'price' => $_GET['num']*$_GET['price'],
					'uname' => $user_info['name'],
					'phone' => $user_info['telphone'],
					'status' => 1,
					'time' => $time_arr[1],
				);
				pdo_insert('lhyzhnc_sun_crowdorder',$crowd_data);
				$crowd_data['status_statement'] = $CRAWD_STATUS[$crowd_data['status']];
			}
			include $this->template('crowd_order_info');
			break;
			
		case 'adopt':
			if ($_GET['handle']=='new') {
				$time_arr = explode(' ', microtime());
				$ordernum = $time_arr[1].substr($time_arr[0], 2,3).rand(1000,9999);
				$adopt = pdo_fetch('select * from ims_lhyzhnc_sun_adopt where id = '.$_GET['gid']);
				$adopt_data = array(
					'aid' => $_GET['gid'],
					'uniacid' => $_W['uniacid'],
					'ordernum' => $ordernum,
					'uid' => $user_info['id'],
					'addr' => $_GET['addr'],
					'num' => $_GET['num'],
					'price' => $_GET['num']*$_GET['price'],
					'uname' => $user_info['name'],
					'phone' => $user_info['telphone'],
					'status' => 1,
					'time' => $time_arr[1],
				);
				pdo_insert('lhyzhnc_sun_adoptorder',$adopt_data);
				$adopt_data['status_statement'] = $CRAWD_STATUS[$adopt_data['status']];
			}
			include $this->template('adopt_order_info');
			break;
			
		case 'activity':
			if ($_GET['handle']=='new') {
				$time_arr = explode(' ', microtime());
				$ordernum = $time_arr[1].substr($time_arr[0], 2,3).rand(1000,9999);
				$adopt = pdo_fetch('select * from ims_lhyzhnc_sun_activity where id = '.$_GET['gid']);
				$adopt_data = array(
					'aid' => $_GET['gid'],
					'uniacid' => $_W['uniacid'],
					'ordernum' => $ordernum,
					'uid' => $user_info['id'],
					'addr' => $_GET['addr'],
					'num' => $_GET['num'],
					'price' => $_GET['num']*$_GET['price'],
					'uname' => $user_info['name'],
					'phone' => $user_info['telphone'],
					'status' => 1,
					'time' => $time_arr[1],
				);
				pdo_insert('lhyzhnc_sun_activityorder',$adopt_data);
				$adopt_data['status_statement'] = $CRAWD_STATUS[$adopt_data['status']];
			}
			include $this->template('activity_order_info');
			break;

		default:
			# code...
			break;
	}

    

}