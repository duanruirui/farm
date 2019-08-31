<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php  if(isset($title)) $_W['page']['title'] = $title?><?php  if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?><?php  } ?><?php  if(empty($_W['page']['copyright']['sitename'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>小程序<?php  } ?><?php  } else { ?> - <?php  echo $_W['page']['copyright']['sitename'];?><?php  } ?></title>
	<meta name="keywords" content="<?php  if(empty($_W['page']['copyright']['keywords'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微擎,微信,微信公众平台,we7.cc<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['keywords'];?><?php  } ?>" />
	<meta name="description" content="<?php  if(empty($_W['page']['copyright']['description'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>公众平台自助引擎（www.zhycms.com），简称cms，cms是一款免费开源的微信公众平台管理系统，是国内最完善移动网站及移动互联网技术解决方案。<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['description'];?><?php  } ?>" />
	<link rel="shortcut icon" href="<?php  echo $_W['siteroot'];?><?php  echo $_W['config']['upload']['attachdir'];?>/<?php  if(!empty($_W['setting']['copyright']['icon'])) { ?><?php  echo $_W['setting']['copyright']['icon'];?><?php  } else { ?>images/global/wechat.jpg<?php  } ?>" />
	<link href="<?php  echo $_W['siteroot'];?>/web/resource/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php  echo $_W['siteroot'];?>/web/resource/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php  echo $_W['siteroot'];?>/web/resource/css/common.css" rel="stylesheet">
	<link rel="stylesheet" href="../addons/lhyzhnc_sun/static/layui/css/layui.css?1"  media="all">

	<script src="../addons/lhyzhnc_sun/static/layui/jquery-3.2.1.min.js" charset="utf-8"></script>
	<script src="../addons/lhyzhnc_sun/static/layui/util.js" charset="utf-8"></script>
	<script src="../addons/lhyzhnc_sun/static/layui/ueditor.config.js" charset="utf-8"></script>
	<script src="../addons/lhyzhnc_sun/static/layui/ueditor.all.min.js" charset="utf-8"></script>
	<script src="../addons/lhyzhnc_sun/static/layui/layui.js" charset="utf-8"></script>
	<script type="text/javascript">
	if(navigator.appName == 'Microsoft Internet Explorer'){
		if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
			alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
		}
	}
	window.sysinfo = {
		<?php  if(!empty($_W['uniacid'])) { ?>'uniacid': '<?php  echo $_W['uniacid'];?>',<?php  } ?>
		<?php  if(!empty($_W['acid'])) { ?>'acid': '<?php  echo $_W['acid'];?>',<?php  } ?>
		<?php  if(!empty($_W['openid'])) { ?>'openid': '<?php  echo $_W['openid'];?>',<?php  } ?>
		<?php  if(!empty($_W['uid'])) { ?>'uid': '<?php  echo $_W['uid'];?>',<?php  } ?>
		'siteroot': '<?php  echo $_W['siteroot'];?>',
		'siteurl': '<?php  echo $_W['siteurl'];?>',
		'attachurl': '<?php  echo $_W['attachurl'];?>',
		'attachurl_local': '<?php  echo $_W['attachurl_local'];?>',
		'attachurl_remote': '<?php  echo $_W['attachurl_remote'];?>',
		<?php  if(defined('MODULE_URL')) { ?>'MODULE_URL': '<?php echo MODULE_URL;?>',<?php  } ?>
		'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'},
		'account' : <?php  echo json_encode($_W['account'])?>
	};
	</script>
	<script>var require = { urlArgs: 'v=20161011' };</script>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>/web/resource/js/lib/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>/web/resource/js/app/util.js?v=20161011"></script>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>/web/resource/js/app/common.min.js?v=20161011"></script>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>/web/resource/js/require.js?v=20161011"></script>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>/web/resource/js/app/config.js?v=20161011"></script>
</head>
<body>
