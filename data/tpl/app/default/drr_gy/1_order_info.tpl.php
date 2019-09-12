<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title>订单详情</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/mobile/css/order_info.css">
</head>
<body>
    <div class="product_info">
        <div class="goods_baseinfo">
            <dl>
                <dt id="spec_img"><img src="/attachment/<?php  echo $order_data['pic'];?>"></dt>
                <dd id="spec_description">
                    <p>单价 ￥<?php  echo $order_data['price'];?> 数量：<?php  echo $order_data['num'];?>    <span style="color:red;font-style: bold;font-size: 2rem;" id="price_show">订单总金额：￥<?php  echo $order_data['price'];?> </span></p>
                    <h2 id="content_show"><?php  echo $order_data['gname'];?></h2>
                    <p id="num_show">订单状态：<?php  echo $order_data['status_statement'];?> 
                        <?php  if($order_data['status']==0) { ?>
                        <span style="color:red;font-style: bold;font-size: 2rem;background-color: green;" onclick="pay(<?php  echo $order_data['ordernum'];?>),'goods'">去支付
                        </span>
                        <?php  } ?>
                    </p>
                </dd>
            </dl>
            <div class="address">
                收货地址：<?php  echo $order_data['addr'];?>
            </div>
        </div>
    </div>
    <div class="order_detail">
        订单的详细信息
    </div>

    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

<script>;</script><script type="text/javascript" src="http://farm.com/app/index.php?i=1&c=utility&a=visit&do=showjs&m=drr_gy"></script></body>
<script type="text/javascript">
function pay(ordernum,type){
    window.location.href = "?i=1&c=entry&op="+type+"&ordernum="+ordernum+"&do=pay&m=drr_gy"
}
</script>
</html>
