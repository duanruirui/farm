<?php defined('IN_IA') or exit('Access Denied');?><link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/mobile/css/footer.css">
<div class="footer">
	<ul>
		<a href="http://farm.com/app/index.php?i=1&c=entry&op=index&do=index&m=drr_gy">
    		<li>
    			<dl>
    				<dt><img src="/addons/drr_gy/template/mobile/images/index/home.png"></dt>
    				<dd>首页</dd>
    			</dl>
    		</li>    			
		</a>

		<li>
			<dl>
				<dt><img src="/addons/drr_gy/template/mobile/images/index/hand-holding-seedling (2).png"></dt>
				<dd>认养</dd>
			</dl>
		</li>

		<li>
			<dl>
				<dt><img src="/addons/drr_gy/template/mobile/images/index/fs-funding (2).png"></dt>
				<dd>众筹</dd>
			</dl>
		</li>

		<a href="<?php  echo $this->createMobileUrl('user_center', array('op' => 'index'))?>">
    		<li>
    			<dl>
    				<dt><img src="/addons/drr_gy/template/mobile/images/index/me (2).png"></dt>
    				<dd>我</dd>
    			</dl>
    		</li>    			
		</a>
		
	</ul>
</div>