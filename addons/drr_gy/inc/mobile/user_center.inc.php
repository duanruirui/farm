<?php
session_start();

if (empty($_SESSION['app_user_login'])) {

    $_SESSION['before_login'] = $_SERVER['REQUEST_URI'];

    $url = $this->createMobileUrl('index', array('op' => 'login'));

   echo "<meta http-equiv=\"refresh\" content=\"0.5;url=".$url."\">";

   die;

}else{
	$user_info = $_SESSION['app_user_login'];

    include $this->template('user_center');

    die;

}