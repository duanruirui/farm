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
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/hhr.png"></dt>
	    				<dd>认养众筹</dd>
	    			</dl>    				
    			</a>
    		</li>
    		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/add/icon07.png"></dt>
	    				<dd>个人中心</dd>
	    			</dl>    				
    			</a>
    		</li>
    		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/hhr.png"></dt>
	    				<dd>果农等级</dd>
	    			</dl>    				
    			</a>
    		</li>
    		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/hhr.png"></dt>
	    				<dd>果树复购</dd>
	    			</dl>    				
    			</a>
    		</li>
    		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/hhr.png"></dt>
	    				<dd>累计收益</dd>
	    			</dl>    				
    			</a>
    		</li>
    		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/hhr.png"></dt>
	    				<dd>果园监控</dd>
	    			</dl>    				
    			</a>
    		</li>
    		<li>
    			<a href="">
	    			<dl>
	    				<dt><img src="/addons/drr_gy/template/mobile/images/hhr.png"></dt>
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
    			<?php  if(is_array($crowds)) { foreach($crowds as $crowd) { ?>
    			<li>
    				<dl>
    					<dt>
    						<img src="/attachment/<?php  echo $crowd['pic'];?>">
    					</dt>
    					<dd>
							<span class="goods_info"><?php  echo $crowd['name'];?></span><br>
							<img src="/addons/drr_gy/template/mobile/images/add/icon11.png">
    					</dd>
    				</dl>
    			</li>
    			<?php  } } ?>
    		</ul>

    		<div class="list-title">众筹列表</div>
    		<ul>
    			<li>
    				<dl>
    					<dt>
    						<img src="/addons/drr_gy/template/mobile/images/hhr.png">
    					</dt>
    					<dd>
							<span class="goods_info">果苗一棵</span><br>
    					</dd>
    				</dl>
    			</li>
    		</ul>

    		<div class="list-title">商品列表</div>
    		<ul>
    			<?php  if(is_array($goods)) { foreach($goods as $goods) { ?>
    			<li>
    				<dl>
    					<dt>
    						<img src="/addons/drr_gy/template/mobile/images/hhr.png">
    					</dt>
    					<dd>
							<span class="goods_info"><?php  echo $goods['gname'];?></span><br>
							<span class="goods_price">￥<?php  echo $goods['price'];?></span>
							<img src="/addons/drr_gy/template/mobile/images/add/icon11.png">
    					</dd>
    				</dl>
    			</li>
    			<?php  } } ?>
    		</ul>


    	</div>
    	
    </div>

    <div class="footer">
    	<ul>
    		<li>
    			<dl>
    				<dt><img src="/addons/drr_gy/template/mobile/images/indexIconS.png"></dt>
    				<dd>首页</dd>
    			</dl>
    		</li>
    		<li>
    			<dl>
    				<dt><img src="/addons/drr_gy/template/mobile/images/user.png"></dt>
    				<dd>认养</dd>
    			</dl>
    		</li>
    		<li>
    			<dl>
    				<dt><img src="/addons/drr_gy/template/mobile/images/indexIcon.png"></dt>
    				<dd>众筹</dd>
    			</dl>
    		</li>
    		<li>
    			<dl>
    				<dt><img src="/addons/drr_gy/template/mobile/images/indexMy.png"></dt>
    				<dd>我</dd>
    			</dl>
    		</li>
    	</ul>
    </div>

	<a href="<?php  echo $this->createMobileUrl('index', array('op' => 'login'))?>">登录模块</a>

<script>;</script><script type="text/javascript" src="http://farm.com/app/index.php?i=1&c=utility&a=visit&do=showjs&m=drr_gy"></script></body>
<script type="text/javascript" src="../addons/drr_gy/template/mobile/js/index.js"></script>
</html>
