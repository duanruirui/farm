<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<?php  $frames = buildframes(FRAME);_calc_current_frames($frames);?>
<div data-skin="default" class="skin-default <?php  if($_GPC['main-lg']) { ?> main-lg-body <?php  } ?>">
<?php  if($_W['template'] == 'black') { ?>
<div class="skin-black" data-skin="black">
	<div class="head">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container ">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php  echo $_W['siteroot'];?>">
						<img src="<?php  if(!empty($_W['setting']['copyright']['blogo']) && function_exists('to_global_media')) { ?><?php  echo to_global_media($_W['setting']['copyright']['blogo'])?><?php  } else { ?>./resource/images/logo/logo.png<?php  } ?>" class="pull-left" width="110px" height="35px">
					</a>
				</div>
				<div class="collapse navbar-collapse">

					<ul class="nav navbar-nav navbar-left">
						<?php  global $top_nav?>
						<?php  $nav_top_fold=array()?>
						<?php  $nav_top_tiled=array()?>
						<?php  $platform_url=url('account/display')?>
						<?php  $nav_top_fold[] = array('name' => 'all', 'title'=>'全部', 'type' => 'all', 'url' => $platform_url)?>
						<?php  if(is_array($top_nav)) { foreach($top_nav as $nav) { ?>
							<?php  if(in_array($nav['name'], array(ACCOUNT_TYPE_SIGN, WXAPP_TYPE_SIGN, WEBAPP_TYPE_SIGN, PHONEAPP_TYPE_SIGN, XZAPP_TYPE_SIGN))) { ?>
								<?php  $nav_top_fold[]=$nav?>
							<?php  } else if(in_array($nav['name'], array('platform', 'module', 'system', 'site'))) { ?>
								<?php  $nav_top_tiled_system[]=$nav?>
							<?php  } else if(in_array($nav['name'], array('appmarket', 'store', 'help', 'advertisement'))) { ?>
								<?php  $nav_top_tiled_other[]=$nav?>
							<?php  } else if($nav['name']=='custom_help') { ?>
								<?php  $nav_top_help=$nav?>
							<?php  } else { ?>
								<?php  $nav_top_tiled_other[]=$nav?>
							<?php  } ?>
						<?php  } } ?>

						<?php  if(is_array($nav_top_tiled_system)) { foreach($nav_top_tiled_system as $nav) { ?>
							<li <?php  if(FRAME == $nav['name'] && !defined('IN_MODULE')) { ?> class="active" <?php  } ?>>
								<a href="<?php  if(empty($nav['url'])) { ?><?php  echo url('home/welcome/' . $nav['name']);?><?php  } else { ?><?php  echo $nav['url'];?><?php  } ?>" <?php  if(!empty($nav['blank'])) { ?>target="_blank"<?php  } ?>><?php  echo $nav['title'];?></a>
							</li>
						<?php  } } ?>

						<ul class="other nav navbar-nav navbar-left">
							<?php  if(is_array($nav_top_tiled_other)) { foreach($nav_top_tiled_other as $nav) { ?>
								<li <?php  if($nav['name'] == 'store') { ?> class="active" <?php  } ?>>
									<a href="<?php  if(empty($nav['url'])) { ?><?php  echo url('home/welcome/' . $nav['name']);?><?php  } else { ?><?php  echo $nav['url'];?><?php  } ?>" <?php  if(!empty($nav['blank'])) { ?>target="_blank"<?php  } ?>> <?php  echo $nav['title'];?> </a>
								</li>
							<?php  } } ?>
						</ul>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<?php  if(!empty($nav_top_help)) { ?>
						<li>
							<a href="<?php  if(empty($nav_top_help['url'])) { ?><?php  echo url('home/welcome/' . $nav_top_help['name']);?><?php  } else { ?><?php  echo $nav_top_help['url'];?><?php  } ?>" data-toggle="tooltip" data-placement="bottom" title="帮助" <?php  if(!empty($nav_top_help['blank'])) { ?>target="_blank"<?php  } ?>>
							<i class="wi wi-explain-sign color-gray" ></i>
							</a>
						</li>
						<?php  } ?>

						<?php  $frames_site = buildframes('site')?>
						<?php  $workorder_nav=$frames_site['section']['workorder']['menu']['system_workorder']?>
						<?php  if($workorder_nav['is_display']) { ?>
							<?php  if(permission_check_account_user('see_workorder')) { ?>
								<li>
									<a href="<?php  echo url('system/workorder/display')?>" data-toggle="tooltip"  data-placement="bottom" title="工单">
										<i class="wi wi-system-work color-gray" ></i>
									</a>
								</li>
							<?php  } ?>
						<?php  } ?>

						<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header-notice', TEMPLATE_INCLUDEPATH)) : (include template('common/header-notice', TEMPLATE_INCLUDEPATH));?>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="wi wi-user color-gray"></i><?php  echo $_W['user']['username'];?> <span class="caret"></span></a>
							<ul class="dropdown-menu color-gray" role="menu">
								<li>
									<a href="<?php  echo url('user/profile');?>" target="_blank"><i class="wi wi-account color-gray"></i> 我的账号</a>
								</li>
								<li class="divider"></li>

								<?php  if(permission_check_account_user('see_system_upgrade')) { ?>
								<li><a href="<?php  echo url('cloud/upgrade');?>" target="_blank"><i class="wi wi-update color-gray"></i> 自动更新</a></li>
								<?php  } ?>

								<?php  if($_W['role'] != ACCOUNT_MANAGE_NAME_CLERK) { ?>
								<li><a href="<?php  echo url('system/updatecache');?>" target="_blank"><i class="wi wi-cache color-gray"></i> 更新缓存</a></li>
								<li class="divider"></li>
								<?php  } ?>

								<li>
									<a href="<?php  echo url('user/logout');?>"><i class="fa fa-sign-out color-gray"></i> 退出系统</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

<div class="main">
	<div class="container">
		<div class="panel panel-content main-panel-content ">
			<div class="panel-body clearfix main-panel-body ">
				<div class="left-menu">
					<div class="left-menu-content">
						<div class="left-menu-top skin-black">
							<div class="account-info-name">
								<span class="account-name"><i class="wi wi-store"></i><a href="./index.php?c=home&a=welcome&do=account&">商城</a></span>
							</div>
						</div>
						<?php  if(is_array($this->left_menus)) { foreach($this->left_menus as $key => $menus) { ?>
						<?php  if((($key == 'store_manage' || $key == 'store_payments') && !($_W['isfounder'] && !user_is_vice_founder()))) { ?>
						<?php  continue;?>
						<?php  } ?>
						<div class="panel panel-menu">
							<div class="panel-heading">
								<span class="" data-toggle="collapse" data-target="#frame-<?php  echo $key;?>" onclick="util.cookie.set('menu_fold_tag:<?php  echo $key;?>', util.cookie.get('menu_fold_tag:<?php  echo $key;?>') == 1 ? 0 : 1)"><?php  echo $menus['title'];?><i class="wi wi-down-sign-s pull-right"></i></span>
							</div>
							<ul class="list-group collapse <?php  if($_GPC['menu_fold_tag:'.$key] == 0) { ?>in<?php  } ?>" id="frame-<?php  echo $key;?>">
								<?php  if(is_array($menus['menu'])) { foreach($menus['menu'] as $menu_key => $menu) { ?>
								<?php  if($key == 'store_goods' && !empty($_W['setting']['store'][$menu_key])) { ?>
									<?php  continue;?>
								<?php  } ?>
								<li class="list-group-item <?php  if(($_GPC['type'] == $menu['type'] && $_GPC['do'] == 'goodsbuyer') || ($_GPC['do'] == $menu['type'] && $_GPC['do'] != 'goodsbuyer')) { ?>active<?php  } ?>">
									<a href="<?php  echo $menu['url'];?>" class="text-over" >
										<i class="<?php  echo $menu['icon'];?>"></i> <?php  echo $menu['title'];?></a>
								</li>
								<?php  } } ?>
							</ul>
						</div>
						<?php  } } ?>
					</div>
				</div>
				<div class="right-content">
<?php  } else if($_W['template'] == 'classical') { ?>
<style>
	.tooltip.right .tooltip-arrow{border-right-color: #428bca;}
	.tooltip.bottom .tooltip-arrow{border-bottom-color: #428bca;}
	.tooltip-inner{background-color: #428bca; padding: 6px 12px;}
</style>
<div class="skin-classical" data-skin="classical">
<div class="first-sidebar">
		<div class="<?php  if(!empty($frames['section']['platform_module_menu']['plugin_menu'])) { ?>plugin-head<?php  } ?>">
			<a class="logo-wrap" href="<?php  echo $_W['siteroot'];?>">
				<img src="<?php  if(!empty($_W['setting']['copyright']['blogo']) && function_exists('to_global_media')) { ?><?php  echo to_global_media($_W['setting']['copyright']['blogo'])?><?php  } else { ?>./resource/images/logo/logo.png<?php  } ?>" class="logo">
			</a>
			<?php  if(!empty($_W['uid'])) { ?>
			<div class="nav">
				<ul class="main-nav">
					<?php  global $top_nav?>
					<?php  $nav_top_fold=array()?>
					<?php  $nav_top_tiled=array()?>
					<?php  $platform_url=url('account/display')?>
					<?php  $nav_top_fold[] = array('name' => 'all', 'title'=>'全部', 'type' => 'all', 'url' => $platform_url)?>
					<?php  if(is_array($top_nav)) { foreach($top_nav as $nav) { ?>
						<?php  if(in_array($nav['name'], array(ACCOUNT_TYPE_SIGN, WXAPP_TYPE_SIGN, WEBAPP_TYPE_SIGN, PHONEAPP_TYPE_SIGN, XZAPP_TYPE_SIGN))) { ?>
							<?php  $nav_top_fold[]=$nav?>
						<?php  } else if(in_array($nav['name'], array('platform', 'module', 'system', 'site'))) { ?>
							<?php  $nav_top_tiled_system[]=$nav?>
						<?php  } else if(in_array($nav['name'], array('appmarket', 'store', 'help', 'advertisement'))) { ?>
							<?php  $nav_top_tiled_other[]=$nav?>
						<?php  } else if($nav['name']=='custom_help') { ?>
							<?php  $nav_top_help=$nav?>
						<?php  } else { ?>
							<?php  $nav_top_tiled_other[]=$nav?>
						<?php  } ?>
					<?php  } } ?>

					<?php  if(is_array($nav_top_tiled_system)) { foreach($nav_top_tiled_system as $nav) { ?>
						<li <?php  if(FRAME == $nav['name'] && !defined('IN_MODULE')) { ?> class="active" <?php  } ?>>
							<a href="<?php  if(empty($nav['url'])) { ?><?php  echo url('home/welcome/' . $nav['name']);?><?php  } else { ?><?php  echo $nav['url'];?><?php  } ?>" <?php  if(!empty($nav['blank'])) { ?>target="_blank"<?php  } ?>>
							<i class="<?php  echo $nav['icon'];?>"></i><?php  echo $nav['title'];?></a>
						</li>
					<?php  } } ?>

					<?php  if(is_array($nav_top_tiled_other)) { foreach($nav_top_tiled_other as $nav) { ?>
						<li <?php  if($nav['name'] == 'store') { ?> class="active" <?php  } ?>>
							<a href="<?php  if(empty($nav['url'])) { ?><?php  echo url('home/welcome/' . $nav['name']);?><?php  } else { ?><?php  echo $nav['url'];?><?php  } ?>" <?php  if(!empty($nav['blank'])) { ?>target="_blank"<?php  } ?>>
							<i class="<?php  echo $nav['icon'];?>"></i><?php  echo $nav['title'];?> </a>
						</li>
					<?php  } } ?>
				</ul>
				<ul class="user-info">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="wi wi-user"></i><?php  echo $_W['user']['username'];?><span class="caret"></span></a>
						<ul class="dropdown-menu color-gray dropdown-menu-right" role="menu">
							<li>
								<a href="<?php  echo url('user/profile');?>" target="_blank"><i class="wi wi-account color-gray"></i> 我的账号</a>
							</li>
							<li class="divider"></li>

							<?php  if(permission_check_account_user('see_system_upgrade')) { ?>
							<li><a href="<?php  echo url('cloud/upgrade');?>" target="_blank"><i class="wi wi-update color-gray"></i> 自动更新</a></li>
							<?php  } ?>

							<?php  if($_W['role'] != ACCOUNT_MANAGE_NAME_CLERK) { ?>
							<li><a href="<?php  echo url('system/updatecache');?>" target="_blank"><i class="wi wi-cache color-gray"></i> 更新缓存</a></li>
							<li class="divider"></li>
							<?php  } ?>

							<li>
								<a href="<?php  echo url('user/logout');?>"><i class="fa fa-sign-out color-gray"></i> 退出系统</a>
							</li>
						</ul>
					</li>
					
					<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header-notice', TEMPLATE_INCLUDEPATH)) : (include template('common/header-notice', TEMPLATE_INCLUDEPATH));?>

					<?php  if(!empty($nav_top_help)) { ?>
					<li>
						<a href="<?php  if(empty($nav_top_help['url'])) { ?><?php  echo url('home/welcome/' . $nav_top_help['name']);?><?php  } else { ?><?php  echo $nav_top_help['url'];?><?php  } ?>" data-toggle="tooltip" data-placement="bottom" title="帮助" <?php  if(!empty($nav_top_help['blank'])) { ?>target="_blank"<?php  } ?>>
						<i class="wi wi-explain-sign color-gray" ></i>
						</a>
					</li>
					<?php  } ?>

					<?php  $frames_site = buildframes('site')?>
					<?php  $workorder_nav=$frames_site['section']['workorder']['menu']['system_workorder']?>
					<?php  if($workorder_nav['is_display']) { ?>
					<?php  if(permission_check_account_user('see_workorder')) { ?>
					<li>
						<a href="<?php  echo url('system/workorder/display')?>" data-toggle="tooltip"  data-placement="bottom" title="工单">
							<i class="wi wi-system-work color-gray" ></i>
						</a>
					</li>
					<?php  } ?>
					<?php  } ?>
				</ul>
			</div>
			<?php  } else { ?>
			<ul class="user-info">
				<li class="dropdown"><a href="<?php  echo url('user/register');?>">注册</a></li>
				<li class="dropdown"><a href="<?php  echo url('user/login');?>">登录</a></li>
			</ul>
			<?php  } ?>
		</div>
</div>
<script>
	$(function(){
		var $dropdownLi = $('.msg.dropdown');
		$dropdownLi.mouseover(function() {
			$(this).addClass('open');
		}).mouseout(function() {
			$(this).removeClass('open');
		});
	});
</script>


<div class="main main-classical">
	<div class="right-fixed-top"></div>
	<div class="container">
		<div class="panel panel-content main-panel-content <?php  if(!empty($frames['section']['platform_module_menu']['plugin_menu'])) { ?>panel-content-plugin<?php  } ?>">
		<div class="panel-body clearfix main-panel-body <?php  if($_GPC['menu_fold_tag:classical'] == 1) { ?>folded<?php  } ?>">
			<div class="icon-unfold js-folded" onclick="util.cookie.set('menu_fold_tag:classical', util.cookie.get('menu_fold_tag:classical') == 1 ? 0 : 1)">
				<span class="wi wi-folded"></span>
			</div>
			<div class="left-menu-container">
				<div class="left-menu">
					<?php  if(is_array($this->left_menus)) { foreach($this->left_menus as $key => $menus) { ?>
					<?php  if((($key == 'store_manage' || $key == 'store_payments') && !($_W['isfounder'] && !user_is_vice_founder()))) { ?>
					<?php  continue;?>
					<?php  } ?>
					<div class="panel panel-menu">
						<div class="panel-heading">
							<span class="no-collapse"<?php  if($_GPC['menu_fold_tag:'.$key] == 1) { ?>collapsed<?php  } ?>" data-toggle="collapse" data-target="#frame-<?php  echo $key;?>" onclick="util.cookie.set('menu_fold_tag:<?php  echo $key;?>', util.cookie.get('menu_fold_tag:<?php  echo $key;?>') == 1 ? 0 : 1)"><?php  echo $menus['title'];?><i class="wi wi-appsetting pull-right setting"></i></span>
						</div>
						<ul class="list-group collapse <?php  if($_GPC['menu_fold_tag:'.$key] == 0) { ?>in<?php  } ?>" id="frame-<?php  echo $key;?>"">
							<?php  if(is_array($menus['menu'])) { foreach($menus['menu'] as $menu_key => $menu) { ?>
							<?php  if($key == 'store_goods' && !empty($_W['setting']['store'][$menu_key])) { ?>
								<?php  continue;?>
							<?php  } ?>
							<li class="list-group-item <?php  if(($_GPC['type'] == $menu['type'] && $_GPC['do'] == 'goodsbuyer') || ($_GPC['do'] == $menu['type'] && $_GPC['do'] != 'goodsbuyer')) { ?>active<?php  } ?>">
								<a href="<?php  echo $menu['url'];?>" class="text-over" >
									<span class="nav-icon" data-container="body" data-toggle="tooltip" data-placement="right" title="<?php  echo $menu['title'];?>"><i class="<?php  echo $menu['icon'];?>"></i></span> <span class="nav-title"><?php  echo $menu['title'];?></span>
								</a>
							</li>
							<?php  } } ?>
						</ul>
					</div>
					<?php  } } ?>
				</div>
			</div>
			<script>
				$(function(){
					$('.left-menu-container').slimScroll({
						width: '210px',
						height: 'calc(100vh - 51px)',
						opacity: .4,
						color: '#aaa',
					});
					$('.main-panel-content .icon-unfold').click(function(){
						$('.main-panel-content').find('.main-panel-body').toggleClass('folded');
					});
					$('.nav-icon').tooltip('hide');
				});
			</script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
			<div class="right-content">
				<div class="content">
<?php  } else { ?>
<div class="head">
<nav class="navbar navbar-default" role="navigation">
<div class="container ">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?php  echo $_W['siteroot'];?>">
			<img src="<?php  if(!empty($_W['setting']['copyright']['blogo']) && function_exists('to_global_media')) { ?><?php  echo to_global_media($_W['setting']['copyright']['blogo'])?><?php  } else { ?>./resource/images/logo/logo.png<?php  } ?>" class="pull-left" width="110px" height="35px">
		</a>
	</div>
	<div class="collapse navbar-collapse">
		<style>
			.nav > li:hover .dropdown-menu {display: block;}
		</style>
		<?php  global $top_nav?>
		<?php  $nav_top_fold=array()?>
		<?php  $nav_top_tiled=array()?>
		<?php  $platform_url=url('account/display')?>
		<?php  $nav_top_fold[] = array('name' => 'all', 'title'=>'全部', 'type' => 'all', 'url' => $platform_url)?>
		<?php  if(is_array($top_nav)) { foreach($top_nav as $nav) { ?>
			<?php  if(in_array($nav['name'], array(ACCOUNT_TYPE_SIGN, WXAPP_TYPE_SIGN, WEBAPP_TYPE_SIGN, PHONEAPP_TYPE_SIGN, XZAPP_TYPE_SIGN))) { ?>
				<?php  $nav_top_fold[]=$nav?>
			<?php  } else if(in_array($nav['name'], array('platform', 'module', 'system', 'site'))) { ?>
				<?php  $nav_top_tiled_system[]=$nav?>
			<?php  } else if(in_array($nav['name'], array('appmarket', 'store', 'help', 'advertisement'))) { ?>
				<?php  $nav_top_tiled_other[]=$nav?>
			<?php  } else if($nav['name']=='custom_help') { ?>
				<?php  $nav_top_help=$nav?>
			<?php  } else { ?>
				<?php  $nav_top_tiled_other[]=$nav?>
			<?php  } ?>
		<?php  } } ?>
		<ul class="nav navbar-nav  navbar-left">
			<?php  if(is_array($nav_top_tiled_system)) { foreach($nav_top_tiled_system as $nav) { ?>
			<li <?php  if(FRAME == $nav['name'] && !defined('IN_MODULE')) { ?> class="active" <?php  } ?>>
			<a href="<?php  if(empty($nav['url'])) { ?><?php  echo url('home/welcome/' . $nav['name']);?><?php  } else { ?><?php  echo $nav['url'];?><?php  } ?>" <?php  if(!empty($nav['blank'])) { ?>target="_blank"<?php  } ?>><?php  echo $nav['title'];?></a>
			</li>
			<?php  } } ?>

			<ul class="other nav navbar-nav navbar-left">
				<?php  if(is_array($nav_top_tiled_other)) { foreach($nav_top_tiled_other as $nav) { ?>
				<li <?php  if($nav['name'] == 'store') { ?> class="active" <?php  } ?>>
				<a href="<?php  if(empty($nav['url'])) { ?><?php  echo url('home/welcome/' . $nav['name']);?><?php  } else { ?><?php  echo $nav['url'];?><?php  } ?>" <?php  if(!empty($nav['blank'])) { ?>target="_blank"<?php  } ?>><?php  echo $nav['title'];?></a>
				</li>
				<?php  } } ?>
			</ul>
		</ul>
		<ul class="nav navbar-nav navbar-left hidden">
			<?php  global $top_nav?>
			<?php  if(is_array($top_nav)) { foreach($top_nav as $nav) { ?>
			<li <?php  if(FRAME == $nav['name'] && !defined('IN_MODULE')) { ?> class="active"<?php  } ?>><a href="<?php  if(empty($nav['url'])) { ?><?php  echo url('home/welcome/' . $nav['name']);?><?php  } else { ?><?php  echo $nav['url'];?><?php  } ?>" <?php  if(!empty($nav['blank'])) { ?>target="_blank"<?php  } ?>><?php  echo $nav['title'];?></a></li>
			<?php  } } ?>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php  if(!empty($nav_top_help)) { ?>
			<li>
				<a href="<?php  if(empty($nav_top_help['url'])) { ?><?php  echo url('home/welcome/' . $nav_top_help['name']);?><?php  } else { ?><?php  echo $nav_top_help['url'];?><?php  } ?>" data-toggle="popover" data-placement="bottom"  data-trigger="hover" data-content="帮助" <?php  if(!empty($nav_top_help['blank'])) { ?>target="_blank"<?php  } ?>>
				<i class="wi wi-explain-sign" ></i>
				</a>
			</li>
			<?php  } ?>

			<?php  $frames_site = buildframes('site')?>
			<?php  $workorder_nav=$frames_site['section']['workorder']['menu']['system_workorder']?>
			<?php  if($workorder_nav['is_display']) { ?>
				<?php  if(permission_check_account_user('see_workorder')) { ?>
					<li>
						<a href="<?php  echo url('system/workorder/display')?>" data-toggle="tooltip"  data-placement="bottom" title="工单">
							<i class="wi wi-system-work color-gray" ></i>
						</a>
					</li>
				<?php  } ?>
			<?php  } ?>

			<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header-notice', TEMPLATE_INCLUDEPATH)) : (include template('common/header-notice', TEMPLATE_INCLUDEPATH));?>
			<li class="dropdown">
				<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="wi wi-user color-gray"></i><?php  echo $_W['username']?> <span class="caret"></span></a>
				<ul class="dropdown-menu color-gray" role="menu">
					<li>
						<a href="<?php  echo url('user/profile');?>" target="_blank"><i class="wi wi-account color-gray"></i> 我的账号</a>
					</li>
					<li class="divider"></li>

					<?php  if(permission_check_account_user('see_system_upgrade')) { ?>
					<li><a href="<?php  echo url('cloud/upgrade');?>" target="_blank"><i class="wi wi-update color-gray"></i> 自动更新</a></li>
					<?php  } ?>

					<?php  if($_W['role'] != ACCOUNT_MANAGE_NAME_CLERK) { ?>
					<li><a href="<?php  echo url('system/updatecache');?>" target="_blank"><i class="wi wi-cache color-gray"></i> 更新缓存</a></li>
					<li class="divider"></li>
					<?php  } ?>

					<li>
						<a href="<?php  echo url('user/logout');?>"><i class="fa fa-sign-out color-gray"></i> 退出系统</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
</nav>
</div>

<div class="main">
<div class="container">
<a href="javascript:;" class="js-big-main button-to-big color-gray" title="加宽">宽屏</a>
<div class="panel panel-content main-panel-content">
	<div class="content-head panel-heading main-panel-heading">
		<span class="font-lg"><i class="wi wi-store"></i> 商城</span></div>
	<div class="panel-body clearfix main-panel-body">
		<div class="left-menu">
			<div class="left-menu-content">
				<?php  if(is_array($this->left_menus)) { foreach($this->left_menus as $key => $menus) { ?>
				<?php  if((($key == 'store_manage' || $key == 'store_payments') && !($_W['isfounder'] && !user_is_vice_founder()))) { ?>
					<?php  continue;?>
				<?php  } ?>
				<div class="panel panel-menu">
					<div class="panel-heading">
						<span class="no-collapse"><?php  echo $menus['title'];?><i class="wi wi-appsetting pull-right setting"></i></span>
					</div>
					<ul class="list-group">
						<?php  if(is_array($menus['menu'])) { foreach($menus['menu'] as $menu_key => $menu) { ?>
						<?php  if($key == 'store_goods' && !empty($_W['setting']['store'][$menu_key])) { ?>
							<?php  continue;?>
						<?php  } ?>
						<li class="list-group-item <?php  if(($_GPC['type'] == $menu['type'] && $_GPC['do'] == 'goodsbuyer') || ($_GPC['do'] == $menu['type'] && $_GPC['do'] != 'goodsbuyer')) { ?>active<?php  } ?>">
							<a href="<?php  echo $menu['url'];?>" class="text-over" >
								<i class="<?php  echo $menu['icon'];?>"></i> <?php  echo $menu['title'];?></a>
						</li>
						<?php  } } ?>
					</ul>
				</div>
				<?php  } } ?>
			</div>
		</div>
		<div class="right-content" style="overflow: hidden;">
<?php  } ?>