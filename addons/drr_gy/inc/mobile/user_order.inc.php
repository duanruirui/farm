<?php
session_start();

if (empty($_SESSION['app_user_login'])) {

    $_SESSION['before_login'] = $_SERVER['REQUEST_URI'];

    $url = $this->createMobileUrl('index', array('op' => 'login'));

   echo "<meta http-equiv=\"refresh\" content=\"0.5;url=".$url."\">";

   die;

}else{
	$user_info = $_SESSION['app_user_login'];

	$goods_orders = pdo_getall('lhyzhnc_sun_goodsorder');
	$crowd_orders = pdo_getall('lhyzhnc_sun_crowdorder');
	$adopt_orders = pdo_getall('lhyzhnc_sun_adoptorder');
	$activity_orders = pdo_getall('lhyzhnc_sun_activityorder');

    include $this->template('user_order');

    die;

}