<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title><?php  echo $_W['current_module']['title'];?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/mobile/css/login.css">
    <script type="text/javascript" src="../addons/drr_gy/template/mobile/js/login.js"></script>
</head>
<body>
	<div class="login_container">
		<div class="logo">
			<img src="../addons/drr_gy/template/mobile/images/logo.png">
		</div>
		<div class="login" id="login">
			<?php  if(!empty($login_error)) { ?>
			<h3 style="color:red;"><?php  echo $login_error;?></h3>
			<?php  } ?>
			<form action="<?php  echo $this->createMobileUrl('index', array('op' => 'login'))?>" method="post">
				<input type="text" name="username" placeholder="请输入手机号码">
				<input type="number" name="phone_code" class="phone_code">
				<input type="password" name="password" placeholder="密码">
				<input type="hidden" name="handle_type" value="login">
				<input type="submit" name="" value="登录">
			</form>
			<div class="addtion">
				<a href="javascript:register();">新用户注册</a> <a href="javascript:password_reset();">忘记密码</a>
			</div>
		</div>

		<div class="login" id="register" style='display:none'>
			<form action="<?php  echo $this->createMobileUrl('index', array('op' => 'login'))?>" method="post">
				<input type="text" name="username" placeholder="请输入手机号码">
				<input type="password" name="password" placeholder="设置密码">
				<input type="password" name="password" placeholder="再次确认密码">
				<input type="hidden" name="handle_type" value="register">
				<input type="submit" name="" value="注册">
			</form>
			<div class="addtion">
				<a href="javascript:login();">登录</a> <a href="javascript:password_reset();">忘记密码</a>
			</div>
		</div>

		<div class="login" id="password_reset" display='password_reset' style='display:none'>
			<form action="<?php  echo $this->createMobileUrl('index', array('op' => 'login'))?>" method="post">
				<input type="number" name="username" placeholder="手机号">
				<br>
				<button type="button" style="font-size: 2rem;"  id="second" onclick="send_phone_code()">点击获取验证码</button>
				<br>
				<input type="number" name="phone_code" placeholder="手机验证码">
				<input type="password" name="password" placeholder="重置密码">
				<input type="hidden" name="handle_type" value="password_reset">
				<input type="submit" name="" value="重置密码">
			</form>
			<div class="addtion">
				<a href="javascript:register();">新用户注册</a> <a href="javascript:login();">登录</a>
			</div>
		</div>		
	</div>

<script>;</script><script type="text/javascript" src="http://farm.com/app/index.php?i=1&c=utility&a=visit&do=showjs&m=drr_gy"></script></body>
</html>