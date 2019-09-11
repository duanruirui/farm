<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title>订单详情</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/mobile/css/order_info.css">
</head>
<body>
    <div class="product_info">
        产品的基本情况
    </div>
    <div class="order_detail">
        订单的详细信息
    </div>

    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

<script>;</script><script type="text/javascript" src="http://farm.com/app/index.php?i=1&c=utility&a=visit&do=showjs&m=drr_gy"></script></body>
</html>
