<?php
global $_W,$_GPC;


if (isset($_GPC['op'])) {
	switch ($_GPC['op']) {
		case 'login':
			if (isset($_W['openid'])) {
				# code...
			}else{
				Index::login();
			}
			
			break;

		case 'check_register_username':

			echo Index::check_register_username();
		
		default:
			include Index::index();
			break;
	}
}



class Index extends WeBase{
	/************************************************************************powered by duanruirui*******************************************************************/
    /*
    * @auther duanruirui
    * function describe app用户登录模块，如果用户已近登录，直接返回信息，若没有则进入注册页面 
    * parameters 
    *
    ****/
    public function login(){

    	global $_W,$_GPC;

        if(isset($_W['app_user_login'])) return $_W['app_user_login'];

        if(isset($_POST['handle_type'])) {

            switch ($_POST['handle_type']) {
            	case 'login':
            		self::check_password($_POST['username'],md5($_POST['password'].'farm'));
            		break;

            	case 'register':
            		self::register($_POST['username'],md5($_POST['password'].'farm'));
            		break;

            	case 'password_reset':
            		self::password_reset($_POST['username'],md5($_POST['password'].'farm'));            
            		break;
            	
            	default:
            		
            		break;
            }

        }else{

        	include $this->template('login');

        }

        return;

    }

    /**
    *@auther duanruirui
    *function description 首页 
    **/
    public function index(){

    	global $_W,$_GPC;

    	include $this->template('index');

    }


    /**
    *@auther duanruirui
    *登录验证
    *
    *********/
    private function check_password($username,$password) {
    	//先查用户名，如果是数字则先查手机号
    	if (is_numeric($username)&&strlen($username)==11) {

    		$result = pdo_get('lhyzhnc_sun_user',array('telephone'=>$username,'password'=>$password));

	    	if (!empty($result)) {

	    		$_W['app_user_login'] = $result;

	    		include $this->template('index');

	    	}else{

	    		$result = pdo_get('lhyzhnc_sun_user',array('username'=>$username,'password'=>$password));

		    	if (!empty($result)) {

		    		$_W['app_user_login'] = $result;

		    		include $this->template('index');
		    		
		    	}else{

		    		$login_error = '用户名或密码错误';

		    		include $this->template('login');

				}

	    	}

    	}else{

			$result = pdo_get('lhyzhnc_sun_user',array('username'=>$username,'password'=>$password));

	    	if (!empty($result)) {

	    		$_W['app_user_login'] = $result;

	    		include $this->template('index');

	    	}else{

	    		$login_error = '用户名或密码错误';

	    		include $this->template('login');

			}

    	}
    	

    }

    /**
    *@auther duanruirui
    *function description 注册新用户 
    **/
    private function register($username,$password){

    	global $_W,$_GPC;

    	if (isset($_W['openid'])) {

    		pdo_update('lhyzhnc_sun_user',array('username'=>$username,'password'=>$password),array('openid'=>$_W['openid']));

    		include $this->template('login');

    	}else{

    		pdo_insert('lhyzhnc_sun_user',array('username'=>$username,'password'=>$password));

    		include $this->template('login');

    	}

    }

    /**
    *@auther duanruirui
    *function description 注册新用户检查用户名重复 
    **/
    private function check_register_username($username){

    	global $_W,$_GPC;

    	$userexists = pdo_get('lhyzhnc_sun_user',array('username'=>$username));

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
    private function password_reset($username,$password){

    	global $_W,$_GPC;

		pdo_update('lhyzhnc_sun_user', array('password'=>$password) ,array('telephone'=>$username));

		include $this->template('login');
		
    	// if (isset($_W['openid'])) {

    	// 	pdo_update('lhyzhnc_sun_user',array('telephone'=>$username,'password'=>$password),array('openid'=>$_W['openid']));

    	// 	include $this->template('login');

    	// }else{

    	// 	$userinfo = array('username'=>$username,'password'=>$password);  

    	// 	pdo_update('lhyzhnc_sun_user', array('password'=>$password) ,array('telephone'=>$username));

    	// 	include $this->template('login');

    	// }

    }

}