<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title>个人中心</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/mobile/css/user_order.css">
</head>
<body>
    <div class="order_nav">
        <ul>
            <a href=""><li>认养订单</li></a>
            <a href=""><li>众筹订单</li></a>
            <a href=""><li>活动订单</li></a>
            <a href=""><li>商品订单</li></a>
        </ul>
    </div>
    <div class="order_container">
<!--         <div class="order_status">
            <ul id="deliver">
                <li>待支付</li>
                <li>已支付</li>
                <li>已发货</li>
                <li>已完成</li>
            </ul>
            <ul id="active">
                <li>待支付</li>
                <li>待核销</li>
                <li>已核销</li>
            </ul>
        </div> -->
        <div class="order_list">
            <ul>
                <li>
                    <div class="order_state">
                        <span style="float: left;">订单状态:  待支付</span>
                    </div>
                    <dl>
                        <dt>图片1</dt>
                        <dd>
                            <div class="order_name">订单1</div>
                            <div class="order_detail">价格，数量</div>
                            <div class="order_hande">订单状态</div>
                        </dd>
                    </dl>
                </li>
            </ul>            
        </div>
    </div>

    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

<script>;</script><script type="text/javascript" src="http://farm.com/app/index.php?i=1&c=utility&a=visit&do=showjs&m=drr_gy"></script></body>
<script type="text/javascript" src="../addons/drr_gy/template/mobile/js/user_order.js"></script>
</html>