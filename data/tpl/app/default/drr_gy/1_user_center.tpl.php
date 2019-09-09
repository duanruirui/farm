<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title>个人中心</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/mobile/css/user_center.css">
</head>
<body>
    <div class="profile">
        <div class="profile_left">
            <?php  if(!empty($user_info['img'])) { ?>
            <img src="<?php  echo $user_info['img'];?>">
            <?php  } else { ?>
            <img src="/addons/drr_gy/template/mobile/images/index/me (2).png">
            <?php  } ?>
        </div>

        <div class="profile_right">duanruirui</div>
    </div>
    <div class="menue">
        <ul>
            <a href=""><li>我的订单</li></a>
            <a href=""><li>问题建议</li></a>
            <a href=""><li>用户协议</li></a>
        </ul>
    </div>

    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

<script>;</script><script type="text/javascript" src="http://farm.com/app/index.php?i=1&c=utility&a=visit&do=showjs&m=drr_gy"></script></body>
</html>
