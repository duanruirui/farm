<?php defined('IN_IA') or exit('Access Denied');?><div class="menu-title"><i class="wi wi-white-collar"></i><?php  echo $_W['account']['type_name'];?></div>


<?php  if($_W['account']['type'] == ACCOUNT_TYPE_OFFCIAL_NORMAL || $_W['account']['type'] == ACCOUNT_TYPE_OFFCIAL_AUTH) { ?>
<div class="account-info">
	<span class="nav-icon" data-container="body" data-toggle="tooltip" data-placement="right" title="<?php  echo $_W['account']['name'];?>">
		<img src="<?php  echo tomedia('headimg_'.$_W['account']['acid'].'.jpg')?>?time=<?php  echo time()?>" class="head-logo">
	</span>
	<div class="account-name"><?php  echo $_W['account']['name'];?></div>
	<div class="account-type">
		<span class="account-type">
			<?php  if($_W['account']['level'] == 1 || $_W['account']['level'] == 3) { ?>
			订阅号
			<?php  } ?>
			<?php  if($_W['account']['level'] == 2 || $_W['account']['level'] == 4) { ?>
			服务号
			<?php  } ?>
		</span>
		<span class="account-level">
			<?php  if($_W['account']['level'] == 1 || $_W['account']['level'] == 3) { ?>
			<?php  if($_W['account']['level'] == 3) { ?>已认证<?php  } ?>
			<?php  } ?>
			<?php  if($_W['account']['level'] == 2 || $_W['account']['level'] == 4) { ?>
			<?php  if($_W['account']['level'] == 4) { ?>已认证<?php  } ?>
			<?php  } ?>
		</span>
		<div class="account-isconnect">
			<?php  if($_W['uniaccount']['isconnect'] == 0) { ?>
			未接入
			<a href="<?php  echo url('account/post', array('uniacid' => $_W['account']['uniacid'], 'acid' => $_W['acid']))?>" class="text-danger"> 立即接入</a>
			<?php  } else { ?>
			已接入
			<?php  } ?>
		</div>
	</div>
</div>
<div class="account-operate">
	<a href="<?php  echo url('utility/emulator');?>" target="_blank" class="h"><i class="wi wi-iphone" data-toggle="tooltip" data-placement="bottom" title="模拟测试"></i></a>
	<?php  if(uni_permission($_W['uid'], $_W['uniacid']) != ACCOUNT_MANAGE_NAME_OPERATOR) { ?>
	<a href="<?php  echo url('account/post', array('uniacid' => $_W['account']['uniacid'], 'acid' => $_W['acid']))?>" class="h"><i class="wi wi-appsetting" data-toggle="tooltip" data-placement="bottom" title="公众号设置"></i></a>
	<?php  } ?>
	<a href="<?php  echo url('account/display', array('type' => 'all'))?>"><i class="wi wi-changing-over" data-toggle="tooltip" data-placement="bottom" title="切换平台"></i></a>
</div>

<?php  } else if($_W['account']['type'] == ACCOUNT_TYPE_XZAPP_NORMAL || $_W['account']['type'] == ACCOUNT_TYPE_XZAPP_AUTH) { ?>
<div class="account-info">
	<span class="nav-icon" data-container="body" data-toggle="tooltip" data-placement="right" title="<?php  echo $_W['account']['name'];?>">
		<img src="<?php  echo tomedia('headimg_'.$_W['account']['acid'].'.jpg')?>?time=<?php  echo time()?>" class="head-logo">
	</span>
	<div class="account-name"><?php  echo $_W['account']['name'];?></div>
	<div class="account-type">
		<span class="account-type">
			<?php  if($_W['account']['level'] == 1) { ?>
				个人
			<?php  } else if($_W['account']['level'] == 2) { ?>
				媒体
			<?php  } else if($_W['account']['level'] == 3) { ?>
				企业
			<?php  } else if($_W['account']['level'] == 4) { ?>
				政府
			<?php  } else if($_W['account']['level'] == 5) { ?>
				其他组织
			<?php  } ?>
		</span>
		<div class="account-isconnect">
			<?php  if($_W['uniaccount']['isconnect'] == 0) { ?>
			未接入
				<a href="<?php  echo url('account/post', array('uniacid' => $_W['account']['uniacid'], 'acid' => $_W['acid']))?>" class="text-danger">立即接入</a>
			<?php  } else { ?>
				已接入
			<?php  } ?>
		</div>
	</div>
</div>
<div class="account-operate">
	<?php  if(uni_permission($_W['uid'], $_W['uniacid']) != ACCOUNT_MANAGE_NAME_OPERATOR) { ?>
		<a href="<?php  echo url('account/post', array('uniacid' => $_W['account']['uniacid'], 'acid' => $_W['acid'], 'account_type' => ACCOUNT_TYPE_XZAPP_NORMAL))?>" class="h">
			<i class="wi wi-appsetting" data-toggle="tooltip" data-placement="bottom" title="熊掌号设置"></i>
		</a>
	<?php  } ?>
	<a href="<?php  echo url('account/display', array('type' => 'all'))?>">
		<i class="wi wi-changing-over" data-toggle="tooltip" data-placement="bottom" title="切换平台"></i>
	</a>
</div>

<?php  } ?>
