<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<style>
	.tooltip.right .tooltip-arrow{border-right-color: #428bca;}
	.tooltip.bottom .tooltip-arrow{border-bottom-color: #428bca;}
	.tooltip-inner{background-color: #428bca; padding: 6px 12px;}
</style>
<div class="skin-classical" data-skin="classical">
<?php  $frames = buildframes(FRAME);_calc_current_frames($frames);?>
<div class="first-sidebar">
		<div class="<?php  if(!empty($frames['section']['platform_module_menu']['plugin_menu'])) { ?>plugin-head<?php  } ?>">
			<a class="logo-wrap" href="<?php  echo $_W['siteroot'];?>">
				<img src="<?php  if(!empty($_W['setting']['copyright']['blogo'])) { ?><?php  echo tomedia($_W['setting']['copyright']['blogo'])?><?php  } else { ?>./resource/images/logo/logo.png<?php  } ?>" class="logo">
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
							<a href="<?php  if(empty($nav['url'])) { ?><?php  echo url('home/welcome/' . $nav['name']);?><?php  } else { ?><?php  echo $nav['url'];?><?php  } ?>" <?php  if(!empty($nav['blank'])) { ?>target="_blank"<?php  } ?>><i class="<?php  echo $nav['icon'];?>"></i><?php  echo $nav['title'];?></a>
						</li>
					<?php  } } ?>

					<?php  if(is_array($nav_top_tiled_other)) { foreach($nav_top_tiled_other as $nav) { ?>
						<li <?php  if(FRAME == $nav['name'] && !defined('IN_MODULE')) { ?> class="active" <?php  } ?>>
							<a href="<?php  if(empty($nav['url'])) { ?><?php  echo url('home/welcome/' . $nav['name']);?><?php  } else { ?><?php  echo $nav['url'];?><?php  } ?>" <?php  if(!empty($nav['blank'])) { ?>target="_blank"<?php  } ?>><i class="<?php  echo $nav['icon'];?>"></i><?php  echo $nav['title'];?> </a>
						</li>
					<?php  } } ?>
				</ul>

				<ul class="user-info">
					<li class="dropdown user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="wi wi-user"></i><?php  echo $_W['user']['username'];?><span class="caret"></span></a>
						<ul class="dropdown-menu color-gray dropdown-menu-right" role="menu">
							<li>
								<a href="<?php  echo url('user/profile');?>" target="_blank"><i class="wi wi-account color-gray"></i> 我的账号</a>
							</li>
							<li class="divider"></li>

							<?php  if(permission_check_account_user('see_system_upgrade')) { ?>
							<li><a href="<?php  echo url('cloud/upgrade');?>" target="_blank"><i class="wi wi-update color-gray"></i> 自动更新</a></li>
							<?php  } ?>

							<?php  if(permission_check_account_user('see_system_updatecache')) { ?>
							<li><a href="<?php  echo url('system/updatecache');?>" target="_blank"><i class="wi wi-cache color-gray"></i> 更新缓存</a></li>
							<li class="divider"></li>
							<?php  } ?>

							<li>
								<a href="<?php  echo url('user/logout');?>"><i class="fa fa-sign-out color-gray"></i> 退出系统</a>
							</li>
						</ul>
					</li>

					<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-notice', TEMPLATE_INCLUDEPATH)) : (include template('common/header-notice', TEMPLATE_INCLUDEPATH));?>

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
<div class="main main-classical">
	<div class="right-fixed-top"></div>
	<?php  if(!defined('IN_MESSAGE')) { ?>
	<div class="container">
		<?php  if(in_array(FRAME, array('account', 'system', 'advertisement', 'wxapp', 'site', 'webapp', 'phoneapp', 'xzapp')) && !in_array($_GPC['a'], array('news-show', 'notice-show'))) { ?>
		<div class="panel panel-content main-panel-content <?php  if(!empty($frames['section']['platform_module_menu']['plugin_menu'])) { ?>panel-content-plugin<?php  } ?>">
		<div class="panel-body clearfix main-panel-body <?php  if($_GPC['menu_fold_tag:classical'] == 1 && !defined('IN_MODULE')) { ?>folded<?php  } ?>">
			<?php  if(!defined('IN_MODULE')) { ?>
			<div class="icon-unfold js-folded" onclick="util.cookie.set('menu_fold_tag:classical', util.cookie.get('menu_fold_tag:classical') == 1 ? 0 : 1)">
				<span class="wi wi-folded"></span>
			</div>
			<?php  } ?>
			<div class="left-menu-container">
				<div class="left-menu">
					<div class="left-menu-top">
						<?php  if(!empty($_GPC['m']) && !in_array($_GPC['m'], array('keyword', 'special', 'welcome', 'default', 'userapi', 'service')) || defined('IN_MODULE')) { ?>
						<div class="apply-fixed-top">
							<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-module', TEMPLATE_INCLUDEPATH)) : (include template('common/header-module', TEMPLATE_INCLUDEPATH));?>
						</div>
						<?php  } else { ?>
						<div class="left-menu-top-panel">
							<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-' . FRAME, TEMPLATE_INCLUDEPATH)) : (include template('common/header-' . FRAME, TEMPLATE_INCLUDEPATH));?>
						</div>
						<?php  } ?>
					</div>
					<?php  if(empty($frames['section']['platform_module_menu']['plugin_menu'])) { ?>
						<?php  if(is_array($frames['section'])) { foreach($frames['section'] as $frame_section_id => $frame_section) { ?>
							<?php  if(!isset($frame_section['is_display']) || !empty($frame_section['is_display'])) { ?>
							<div class="panel panel-menu">
								<?php  if($frame_section['title']) { ?>
								<div class="panel-heading">
									<span class="<?php  if($_GPC['menu_fold_tag:'.$frame_section_id] == 1) { ?>collapsed<?php  } ?>" data-toggle="collapse" data-target="#frame-<?php  echo $frame_section_id;?>" onclick="util.cookie.set('menu_fold_tag:<?php  echo $frame_section_id;?>', util.cookie.get('menu_fold_tag:<?php  echo $frame_section_id;?>') == 1 ? 0 : 1)">
										<span class="nav-title"><?php  echo $frame_section['title'];?></span>
										<span class="nav-icon pull-right" data-container="body" data-toggle="tooltip" data-placement="right" title="<?php  echo $frame_section['title'];?>"><i class="wi wi-angle-down"></i></span>
									</span>
								</div>
								<?php  } ?>
								<ul class="list-group collapse <?php  if($_GPC['menu_fold_tag:'.$frame_section_id] == 0) { ?>in<?php  } ?>" id="frame-<?php  echo $frame_section_id;?>" >
									<?php  if(is_array($frame_section['menu'])) { foreach($frame_section['menu'] as $menu_id => $menu) { ?>
										<?php  if(!empty($menu['is_display'])) { ?>
											<?php  if($menu_id == 'platform_module_more') { ?>
											<li class="list-group-item">
												<a href="<?php  echo $menu['url']?>" <?php  if(FRAME != 'webapp') { ?>target="_blank"<?php  } ?> class="text-over">
													<span class="nav-icon" data-container="body" data-toggle="tooltip" data-placement="right" title="更多应用"><span class="icon-more"><i class="wi wi-plus"></i></span></span>
													<span class="nav-title">更多应用</span>
												</a>
											</li>
											<?php  } else { ?>
											<li class="list-group-item <?php  if($menu['active']) { ?>active<?php  } ?>">
												<a href="<?php  echo $menu['url'];?>" class="text-over" <?php  if($frame_section_id == 'platform_module') { ?>target="_blank"<?php  } ?>>
												<?php  if($menu['icon']) { ?>
												<span class="nav-icon" data-container="body" data-toggle="tooltip" data-placement="right" title="<?php  echo $menu['title'];?>">
													<?php  if($frame_section_id == 'platform_module') { ?>
													<img src="<?php  echo $menu['icon'];?>"/>
													<?php  } else { ?>
													<i class="<?php  echo $menu['icon'];?>"></i>
													<?php  } ?>
												</span>
												<?php  } ?>
												<span class="nav-title"><?php  echo $menu['title'];?></span>
												</a>
											</li>
											<?php  } ?>
										<?php  } ?>
									<?php  } } ?>
								</ul>
							</div>
							<script>
								$(function(){
									$('.left-menu-container').slimScroll({
										width: '210px',
										height: 'calc(100vh - 51px)',
										opacity: .4,
										color: '#aaa',
									});
								});
							</script>
							<?php  } ?>
						<?php  } } ?>
					<?php  } else { ?>

					<script>
						$(function(){
							$('.panel-content-plugin .left-menu-container').slimScroll({
								width: '270px',
								height: 'calc(100vh - 51px)',
								opacity: .4,
								color: '#aaa',
							});
						});
					</script>
					<div class="plugin-menu clearfix">
						<div class="plugin-menu-main pull-left">
							<ul class="list-group">
								<li class="list-group-item<?php  if($_W['current_module']['name'] == $frames['section']['platform_module_menu']['plugin_menu']['main_module']) { ?> active<?php  } ?>">
									<a href="<?php  echo url('home/welcome/ext', array('m' => $frames['section']['platform_module_menu']['plugin_menu']['main_module']))?>">
										<i class="wi wi-main-apply"></i>
										<div>主应用</div>
									</a>
								</li>
								<li class="list-group-item">
									<div>插件</div>
								</li>
								<?php  if(is_array($frames['section']['platform_module_menu']['plugin_menu']['menu'])) { foreach($frames['section']['platform_module_menu']['plugin_menu']['menu'] as $plugin_name => $plugin) { ?>
								<li class="list-group-item<?php  if($_W['current_module']['name'] == $plugin_name) { ?> active<?php  } ?>">
									<a href="<?php  echo url('home/welcome/ext', array('m' => $plugin_name))?>">
										<img src="<?php  echo $plugin['icon'];?>" alt="" class="img-icon" />
										<div><?php  echo $plugin['title'];?></div>
									</a>
								</li>
								<?php  } } ?>
							</ul>
							<?php  unset($plugin_name);?>
							<?php  unset($plugin);?>
						</div>
						<div class="plugin-menu-sub pull-left">

							<?php  if(is_array($frames['section'])) { foreach($frames['section'] as $frame_section_id => $frame_section) { ?>
								<?php  if(!isset($frame_section['is_display']) || !empty($frame_section['is_display'])) { ?>
									<div class="panel panel-menu">
										<?php  if($frame_section['title']) { ?>
										<div class="panel-heading">
											<span class="collapsed" data-toggle="collapse" data-target="#frame0-<?php  echo $frame_section_id;?>" aria-expanded="true" aria-controls="frame0-<?php  echo $frame_section_id;?>"><?php  echo $frame_section['title'];?><i class="wi wi-angle-down pull-right"></i></span>
										</div>
										<?php  } ?>
										<ul class="list-group panel-collapse collapse in" id="frame0-<?php  echo $frame_section_id;?>">
											<?php  if(is_array($frame_section['menu'])) { foreach($frame_section['menu'] as $menu_id => $menu) { ?>
												<?php  if(!empty($menu['is_display'])) { ?>
													<?php  if($menu_id == 'platform_module_more') { ?>
													<li class="list-group-item list-group-more">
														<a href="<?php  echo url('module/manage-account');?>" target="_blank"><span class="label label-more">更多应用</span></a>
													</li>
													<?php  } else { ?>
													<li class="list-group-item <?php  if($menu['active']) { ?>active<?php  } ?>">
														<a href="<?php  echo $menu['url'];?>" class="text-over" <?php  if($frame_section_id == 'platform_module') { ?>target="_blank"<?php  } ?>>
														<?php  echo $menu['title'];?>
														</a>
													</li>
													<?php  } ?>
												<?php  } ?>
											<?php  } } ?>
										</ul>
									</div>
								<?php  } ?>
							<?php  } } ?>
						</div>
					</div>
					<?php  } ?>
				</div>
			</div>

			<script>
				$(function(){
					$('.main-panel-content .icon-unfold').click(function(){
						$('.main-panel-content').find('.main-panel-body').toggleClass('folded');
						if($('.main-classical .folded').length == 0){
							$('.nav-icon').attr('data-toggle',false);
						}
					});
				});
			</script>

			<script src="./resource/js/lib/jquery.slimscroll.min.js"></script>

			<div class="right-content">
				<div class="content">
		<?php  } ?>
	<?php  } ?>