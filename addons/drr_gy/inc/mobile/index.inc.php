<?php

if (isset($_GET['op'])) {

	switch ($_GET['op']) {
		case 'login':
			session_start();
			if (isset($_SESSION['openid'])) {
				# code...
			}else{
				Mobile::login();
			}
			break;

		case 'check_register_telphone':

			Mobile::check_register_telphone();
			break;
		
		default:
			Mobile::index();
			break;
	}

}else{
	Mobile::index();
}



class Mobile extends WeBase{
	/************************************************************************powered by duanruirui*******************************************************************/

    /**
    *@auther duanruirui
    *function description 首页 
    **/
    public function index(){


    	$banners = pdo_getall('ims_lhyzhnc_sun_popbanner');

    	$notice = pdo_fetch(' select * from ims_lhyzhnc_sun_notice order by id desc limit 1');

    	$goods = pdo_fetchall('select * from ims_lhyzhnc_sun_goods where cid=:cid order by id desc',array('cid'=>1));

    	$crowds = pdo_fetchall('select * from ims_lhyzhnc_sun_crowd order by id desc');

    	$adopts = pdo_fetchall('select * from ims_lhyzhnc_sun_adopt order by id desc');

    	$activities = pdo_fetchall('select * from ims_lhyzhnc_sun_activity');

    	// $scolls = array('qrcode_1.jpg','headimg_1.jpg');

    	include self::template('index');die;

    }



	
    /*
    * @auther duanruirui
    * function describe app用户登录模块，如果用户已近登录，直接返回信息，若没有则进入注册页面 
    * parameters 
    *
    ****/
    public function login(){

        if(isset($_SESSION['app_user_login'])) {


        	if(isset($_SESSION['before_login'])){
        		//0.5s后跳转
				echo "<meta http-equiv=\"refresh\" content=\"0.5;url=".$_SESSION['before_login']."\">";

				session_commit();
				die;

        	}else{

        		session_commit();
        		include self::template('index');
        		die;
        	}
        }
    	
        if(isset($_POST['handle_type'])) {

        	$password = md5($_POST['password'].'farm');

            switch ($_POST['handle_type']) {
            	case 'login':
            		self::check_password($_POST['telphone'],$password);
            		break;

            	case 'register':
            		self::register($_POST['telphone'],$password);
            		break;

            	case 'password_reset':
            		self::password_reset($_POST['telphone'],$password);            
            		break;
            	
            	default:
            		include self::template('login');die;
            		break;
            }

        }else{

        	include self::template('login');die;

        }

    }




    /**
    *@auther duanruirui
    *登录验证
    *
    *********/
    private function check_password($telphone,$password) {

		$result = pdo_get('lhyzhnc_sun_user',array('telphone'=>$telphone,'password'=>$password));

		if (!empty($result)) {

			$_SESSION['app_user_login'] = $result;

			if(isset($_SESSION['before_login'])){
        		//0.5s后跳转
				echo "<meta http-equiv=\"refresh\" content=\"0.5;url=".$_SESSION['before_login']."\">";

        	}else{
        		include self::template('index');
        	}

			session_commit();
			die;
			
		}else{

			$login_error = '用户名或密码错误';

			include self::template('login');
			session_commit();
			die;

		}
    	

    }

    /**
    *@auther duanruirui
    *function description 注册新用户 
    **/
    private function register($telphone,$password){

    	if (isset($_SESSION['openid'])) {

    		pdo_update('lhyzhnc_sun_user',array('telphone'=>$telphone,'password'=>$password),array('openid'=>$_SESSION['openid']));

    	}else{

    		pdo_insert('lhyzhnc_sun_user',array('telphone'=>$telphone,'password'=>$password));

    		if(isset($_W['before_login'])){
        		//0.5s后跳转
				echo "<meta http-equiv=\"refresh\" content=\"0.5;url=".$_SESSION['before_login']."\">";
				die;

        	}

    	}
    	include self::template('index');
    	session_commit();
    	die;

    }

    /**
    *@auther duanruirui
    *function description 注册新用户检查用户名重复 
    **/
    private function check_register_telphone($telphone){

    	$userexists = pdo_get('lhyzhnc_sun_user',array('telphone'=>$telphone));

    	if(!empty($userexists)) {

    		return json_encode(array('errcode'=>1,'errmsg'=>'用户名已存在'));

    	}else{

    		return json_encode(array('errcode'=>0,'errmsg'=>'用户名可用'));

    	}

    }
    /**
    *@auther duanruirui
    *function description 忘记密码修改 
    **/
    private function password_reset($telphone,$password){

		pdo_update('lhyzhnc_sun_user', array('password'=>$password) ,array('telphone'=>$telphone));

		include self::template('login');die;
		
    	// if (isset($_W['openid'])) {

    	// 	pdo_update('lhyzhnc_sun_user',array('telphone'=>$telphone,'password'=>$password),array('openid'=>$_W['openid']));

    	// 	include self::template('login');

    	// }else{

    	// 	$userinfo = array('telphone'=>$telphone,'password'=>$password);  

    	// 	pdo_update('lhyzhnc_sun_user', array('password'=>$password) ,array('telphone'=>$telphone));

    	// 	include self::template('login');

    	// }

    }

}