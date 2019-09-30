<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title><?php  echo $_W['current_module']['title'];?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/mobile/css/shop.css">
</head>
<body>
    <div class="search_box">
        <input type="text" name="goods_search" id="goods_search" placeholder="请输入商品名称" onkeydown="search_goods(event);">
    </div>
    <div class="containner">
        <div class="goods_nav">
            <ul id="goods_menue">
                <li onclick="all_goods(this)">全部商品</li>
                <li onclick="recomend_goods(this)">精品推荐</li>
                <li onclick="new_goods(this)">最新上架</li>
            </ul>            
        </div>
    	<div class="goods-list">
    		<ul>
    			<?php  if(is_array($goods)) { foreach($goods as $goods) { ?>
                <a href="<?php  echo $this->createMobileUrl('goods_detail', array('op' => 'index','goods_id'=>$goods['id']))?>">
                    <li>
                        <dl>
                            <dt>
                                <img src="/attachment/<?php  echo $goods['img'];?>">
                            </dt>
                            <dd>
                                <span class="goods_info"><?php  echo $goods['gname'];?></span><br>
                                <span class="goods_price">￥<?php  echo $goods['price'];?></span>
                                <img src="/addons/drr_gy/template/mobile/images/index/cart.png">
                            </dd>
                        </dl>
                    </li>  
                </a>
    			<?php  } } ?>
    		</ul>


    	</div>
    	
    </div>

	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

<script>;</script><script type="text/javascript" src="http://farm.com/app/index.php?i=1&c=utility&a=visit&do=showjs&m=drr_gy"></script></body>
<script type="text/javascript" src="../addons/drr_gy/template/mobile/js/shop.js"></script>
</html>
