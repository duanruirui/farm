<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title><?php  echo $_W['current_module']['title'];?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/mobile/css/crowd_detail.css">
</head>
<body>
	<?php  if(is_array($banners)) { foreach($banners as $scoll) { ?>
    <input type="hidden" name="scoll_img_data" value="/attachment/<?php  echo $scoll;?>">
    <?php  } } ?>
	<div class="banner" id="banner">
        <img src="" id="banner_img">
    </div>
    <div class="containner">
        <div class="goods-list">
            <ul>
                <li>
                    <dl>
                        <dt>
                            <span><?php  echo $crowd['lottery'];?></span>
                        </dt>
                        <dd>
                            <div class="schadule" id="schedule">10%</div>
                            <span style="float: left;">6666人支持</span>
                            <div class="crowd_info">
                                <ul>
                                    <li><p>支持人数</p>1888人</li>
                                    <li><p>已筹金额</p>1888元</li>
                                    <li><p>剩余时间</p>3天</li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
                </li>  
            </ul>
        </div>
    </div>
    <div class="goods_info">
        <h3>商品详情</h3>
        <?php  if(is_array($banners)) { foreach($banners as $scoll) { ?>
        <img src="/attachment/<?php  echo $scoll;?>">
        <?php  } } ?>
        <?php  echo $goods['content'];?>
        <?php  echo $goods['detail'];?>
    </div>
    <div class="bottom_nav" id="bottom_nav">
        <span style="display: block;background-color: orange;border-radius:1rem;color: white;" id="toindex">首页</span>
        <span style="display: block;background-color: #FF3300;border-radius:1rem;color: white;" id="buynow">参与众筹</span>
    </div>
    <div class="select_spec" id="select_spec" style="display:none">
        <div class="blank" id="blank"></div>
        <div class="goods_baseinfo">
            <dl>
                <dt id="spec_img"><img src="/attachment/<?php  echo $crowd['img'];?>"></dt>
                <dd id="spec_description">
                    <p><span style="color:red;font-style: bold;font-size: 2rem;" id="price_show">￥<?php  echo $specprices['0'];?></span></p>
                    <h2 id="content_show"><?php  echo $crowd['gname'];?></h2>
                    <p id="num_show">库存：<?php  echo $specnums['0'];?></p>
                </dd>
            </dl>
            <div class="address">
                收货地址：<input type="text" name="input_address" id="input_address">
            </div>
            <p style="float:left;width: 100%;padding-left:0;margin-left:0;text-align: left;">选择规格型号</p>
            <div class="goods_spec">
                <ul>
                    <?php  if(is_array($specs)) { foreach($specs as $key => $list) { ?>
                    <li class="<?php  if($key == 0) { ?> onselect <?php  } else { ?> onrelease <?php  } ?>">
                        <span onclick="choose_spec('<?php  echo $list['spec'];?>','<?php  echo $list['spec'];?><?php  echo $list['speccontent'];?>','<?php  echo $list['specnums'];?>','<?php  echo $list['specprices'];?>'),label_change(this)">
                            <?php  echo $list['spec'];?>-<?php  echo $list['speccontent'];?>
                        </span>
                    </li>
                    <?php  } } ?>
                </ul>
                购买数量:

                <span style="color: green;float: right;font-size: 3rem;line-height: 2rem;" onclick="input_add()">+</span>
                <input type="num" name="order_num"  id="goods_num" placeholder="" value="1">
                <span style="color: green;float: right;font-size: 3rem;line-height: 2rem;" onclick="input_minus()">-</span>
                <input type="hidden" name="price" id="input_price" value="<?php  echo $crowd['price'];?>">
                <input type="hidden" name="specnum" id="specnum" value="<?php  echo $specnums['0'];?>">
                <input type="hidden" name="gid" id="input_gid" value="<?php  echo $crowd['id'];?>">
                <input type="hidden" name="spec" id="input_spec" value="<?php  echo $specs['0'];?><?php  echo $speccontent['0'];?><?php  echo $specprices['0'];?>">
            </div>

            <div  id="buysure">
                <span style="display: block;background-color: #FF3300;border-radius:1rem;color: white;text-align: center;">确定</span>
            </div>
        </div>
    </div>
<script>;</script><script type="text/javascript" src="http://farm.com/app/index.php?i=1&c=utility&a=visit&do=showjs&m=drr_gy"></script></body>
<script type="text/javascript" src="../addons/drr_gy/template/mobile/js/goods_detail.js"></script>
</html>
