<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title><?php  echo $_W['current_module']['title'];?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/mobile/css/index.css">
</head>
<body>
	<?php  if(is_array($banners)) { foreach($banners as $scoll) { ?>
    <input type="hidden" name="scoll_img_data" value="/attachment/<?php  echo $scoll['img'];?>">
    <?php  } } ?>
	<div class="banner" id="banner">
        <img src="" id="banner_img">
    </div>
    <div class="message">
    	<div class="message-left"><span class="message-title">资讯</span></div>
    	<div class="message-right"><a href=""><?php  echo $notice['text'];?></a></div>
    </div>
    <div class="menue_button">
    	<ul>
    		<li>
    			<a href="<?php  echo $this->createMobileUrl('shop', array('op' => 'index'))?>">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/index/hand-holding-seedling.png"></dt>
	    				<dd>果树商城</dd>
	    			</dl>    				
    			</a>
    		</li>
    		<li>
    			<a href="<?php  echo $this->createMobileUrl('crowds', array('op' => 'index'))?>">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/index/tudi.png"></dt>
	    				<dd>果园众筹</dd>
	    			</dl>    				
    			</a>
    		</li>
<!--     		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/index/dengji.png"></dt>
	    				<dd>果农等级</dd>
	    			</dl>    				
    			</a>
    		</li>
    		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/index/buyotherplus.png"></dt>
	    				<dd>果树复购</dd>
	    			</dl>    				
    			</a>
    		</li>
    		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/index/profit01.png"></dt>
	    				<dd>累计收益</dd>
	    			</dl>    				
    			</a>
    		</li> -->
    		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/index/localsee.png"></dt>
	    				<dd>果园监控</dd>
	    			</dl>    				
    			</a>
    		</li>
    		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/index/activity.png"></dt>
	    				<dd>活动报名</dd>
	    			</dl>    				
    			</a>
    		</li>
    	</ul>
    </div>

    <div class="containner">
    	<div class="goods-list">
    		<div class="list-title">认养果树列表</div>
    		<ul>
    			<?php  if(is_array($adopts)) { foreach($adopts as $adopt) { ?>
    			<li>
    				<dl>
    					<dt>
    						<img src="/attachment/<?php  echo $adopt['pic'];?>">
    					</dt>
    					<dd>
							<span class="goods_info"><?php  echo $adopt['name'];?></span><br>
							<span class="goods_price">￥<?php  echo $adopt['price'];?></span>
							<img src="/addons/drr_gy/template/mobile/images/index/cart.png">
    					</dd>
    				</dl>
    			</li>
    			<?php  } } ?>
    		</ul>

    		<div class="list-title">众筹列表</div>
    		<ul>
    			<?php  if(is_array($crowds)) { foreach($crowds as $crowd) { ?>
    			<li>
    				<dl>
    					<dt>
    						<img src="/attachment/<?php  echo $crowd['pic'];?>">
    					</dt>
    					<dd>
							<span class="goods_info"><?php  echo $crowd['name'];?></span><br>
							<img src="/addons/drr_gy/template/mobile/images/index/cart.png">
    					</dd>
    				</dl>
    			</li>
    			<?php  } } ?>
    		</ul>

    		<div class="list-title">商品列表</div>
    		<ul>
    			<?php  if(is_array($goods)) { foreach($goods as $goods) { ?>
    			<li onclick="goods_detail(<?php  echo $goods['id'];?>)">
    				<dl>
    					<dt>
    						<img src="/addons/drr_gy/template/mobile/images/hhr.png">
    					</dt>
    					<dd>
							<span class="goods_info"><?php  echo $goods['gname'];?></span><br>
							<span class="goods_price">￥<?php  echo $goods['price'];?></span>
							<img src="/addons/drr_gy/template/mobile/images/index/cart.png">
    					</dd>
    				</dl>
    			</li>
    			<?php  } } ?>
    		</ul>
    	</div>
    	
    </div>

	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

<script>;</script><script type="text/javascript" src="http://farm.com/app/index.php?i=1&c=utility&a=visit&do=showjs&m=drr_gy"></script></body>
<script type="text/javascript" src="../addons/drr_gy/template/mobile/js/index.js"></script>
</html>
