<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title><?php  echo $_W['current_module']['title'];?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/mobile/css/crowd.css">
</head>
<body>
    <div class="containner">
    	<div class="goods-list">
    		<ul>
    			<?php  if(is_array($crowd)) { foreach($crowd as $list) { ?>
                <a href="<?php  echo $this->createMobileUrl('crowd', array('op' => 'crowd_detail','crowd_id'=>$list['id']))?>">
                    <li>
                        <dl>
                            <dt>
                                <img src="/attachment/<?php  echo $list['img'];?>">
                                <span><?php  echo $list['content'];?></span>
                            </dt>
                            <dd>
                                <div class="schadule" style="width: <?php  echo $list['rate'];?>%;"><?php  echo $list['rate'];?> %</div>
                                <span style="float: left;"><?php  echo $list['total_num'];?>人支持</span>
                                <div class="crowd_info">
                                    <ul>
                                        <li><p>支持人数</p><?php  echo $list['total_buyers'];?>人</li>
                                        <li><p>已筹金额</p><?php  echo $list['total'];?>元</li>
                                        <li><p>剩余时间</p><?php  echo $list['remain'];?>天</li>
                                    </ul>
                                </div>
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
</html>
