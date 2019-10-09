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
global $_W;
switch ($_GET['op']) {
  case 'index':
    break;

  case 'add':
    $data = array(
      'uid' => $user_info['id'],
      'uniacid' => $_W['uniacid'],
      'province' => $_GET['province'],
      'username' => $_GET['username'],
      'mobile' => $_GET['mobile'],
      'city' => $_GET['city'],
      'district' => $_GET['district'],
      'address' => $_GET['province'].$_GET['city'].$_GET['district'].$_GET['address'],
    );
    pdo_insert('lhyzhnc_address',$data);
    $url = $this->createMobileUrl('user_address',array('op'=>'index'));
    header("Location:$url");
    die;
    break;

  case 'edit':
    $data = array(
      'username' => $_GET['username'],
      'mobile' => $_GET['mobile'],
      'address' => $_GET['address'],
    );
    $address='';
    if($_GET['province'] != '请选择省份') {
      $data['province'] = $_GET['province'];
      $address .= $_GET['province'];
    }
    if($_GET['city'] != '请选择城市') {
      $data['city'] = $_GET['city'];
      $address .= $_GET['city'];
    }
    if($_GET['district'] != '请选择区域') {
      $data['district'] = $_GET['district'];
      $address .= $_GET['district'];
    }
    $data['address'] = $address.$data['address'];
    pdo_update('lhyzhnc_address',$data,array('id'=>$_GET['address_id']));
    $url = $this->createMobileUrl('user_address',array('op'=>'index'));
    header("Location:$url");
    die;
    break;

  case 'default':
    break;

  case 'delete':
    pdo_delete('lhyzhnc_address',array('id'=>$_GET['address_id']));
    $url = $this->createMobileUrl('user_address',array('op'=>'index'));
    header("Location:$url");
    break;

  case 'ajax_get';
    $address = pdo_getall('lhyzhnc_address',array('uid'=>$user_info['id']));
    $res = array();
    foreach ($address as $key => $value) {
      array_push($res, '姓名：'.$value['username'].' 电话：'.$value['mobile'].' 地址:'.$value['province'].$value['city'].$value['district'].$value['address']);
    }
    echo json_encode($res);
    die;
    break;

  default:
    break;
}
$address = pdo_getall('lhyzhnc_address',array('uid'=>$user_info['id']));
include $this->template('user_address');