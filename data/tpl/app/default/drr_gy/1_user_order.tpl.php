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
            <a href="?i=1&c=entry&op=adopt&do=user_order&m=drr_gy"><li>认养订单</li></a>
            <a href="?i=1&c=entry&op=crowd&do=user_order&m=drr_gy"><li>众筹订单</li></a>
            <a href="?i=1&c=entry&op=activity&do=user_order&m=drr_gy"><li>活动订单</li></a>
            <a href="?i=1&c=entry&op=goods&do=user_order&m=drr_gy"><li>商品订单</li></a>
        </ul>
    </div>
    <div class="order_container">
        <div class="order_list">
            <ul>
                <?php  if(is_array($order_data)) { foreach($order_data as $list) { ?>
                <li>
                    <dl>
                        <dt><img src="/attachment/<?php  echo $list['img'];?>"></dt>
                        <dd>
                            <div class="order_name"> <?php  echo $list['name'];?></div>
                            <div class="order_detail">价格<?php  echo $list['price'];?>元，数量<?php  echo $list['num'];?></div>
                            <div class="order_hande">订单状态：<?php  echo $list['status_state'];?>&nbsp;&nbsp;<?php  if($list['status_state']=='未支付') { ?>去支付&nbsp;&nbsp;取消订单&nbsp;&nbsp;<?php  } else if($list['status_state']=='已发货') { ?>快递公司：<?php  echo $list['way'];?>&nbsp;&nbsp;快递单号：<?php  echo $list['waybill'];?><?php  } ?></div>
                            <div class="order_mum">订单编号:  <?php  echo $list['ordernum'];?></div>
                            <div class="order_time">下单时间:  <?php  echo $list['time'];?></div>
                            <div class="order_addr">收货地址:  <?php  echo $list['addr'];?></div>
                        </dd>
                    </dl>
                </li>
                <?php  } } ?>
            </ul>            
        </div>
    </div>

    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

<script>;</script><script type="text/javascript" src="http://farm.com/app/index.php?i=1&c=utility&a=visit&do=showjs&m=drr_gy"></script></body>
<script type="text/javascript" src="../addons/drr_gy/template/mobile/js/user_order.js"></script>
</html>
