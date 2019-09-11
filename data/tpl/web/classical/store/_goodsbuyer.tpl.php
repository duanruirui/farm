<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<?php  if($operate == 'display') { ?>
	<?php  if($_GPC['type'] != STORE_TYPE_PACKAGE && $_GPC['type'] != STORE_TYPE_USER_PACKAGE) { ?>
	<div class="store module">
		<div class="modules clearfix">
		<?php  if(is_array($store_goods)) { foreach($store_goods as $goods) { ?>
			<div class="item active">
			<a href="<?php  echo $this->createWebUrl('goodsbuyer', array('operate' => 'goods_info', 'direct' => 1, 'goods' => $goods['id']))?>">
				<?php  if($goods['type'] == STORE_TYPE_API) { ?>
				<div class="icon icon-api"><span class="wi wi-api"></span></div>
				<?php  } else if(in_array($goods['type'], array(STORE_TYPE_PACKAGE, STORE_TYPE_ACCOUNT, STORE_TYPE_WXAPP, STORE_TYPE_ACCOUNT_RENEW, STORE_TYPE_WXAPP_RENEW))) { ?>
				<div class="icon icon-wi"><span class="wi wi-appjurisdiction"></span></div>
				<?php  } else { ?>
				<img src="<?php  echo $goods['module']['logo'];?>" alt="icon" class="icon" onerror="this.src='./resource/images/nopic-107.png'"/>
				<?php  } ?>
				<div class="name text-over"><?php  if($goods['type'] == STORE_TYPE_PACKAGE) { ?><?php  echo $module_groups[$goods['module_group']]['name'];?><?php  } ?><?php  echo $goods['title']?></div>
				<div class="price">￥<?php  echo $goods['price'];?>元 /
					<?php  if($goods['unit'] == 'month') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?><?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?><?php  echo $goods['wxapp_num'];?><?php  } ?>月
					<?php  } else if($goods['unit'] == 'ten_thousand') { ?> <?php  echo $goods['api_num'];?>万次
					<?php  } else if($goods['unit'] == 'day') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?><?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?><?php  echo $goods['wxapp_num'];?><?php  } ?>天
					<?php  } else if($goods['unit'] == 'year') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?><?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?><?php  echo $goods['wxapp_num'];?><?php  } ?>年
					<?php  } ?>
				</div>
				<div class="text-right view">
					查看详情>
				</div>
			</a>
			</div>
		<?php  } } ?>
		</div>
	</div>
	<?php  } ?>
	<?php  if($_GPC['type'] == STORE_TYPE_PACKAGE) { ?>
	<div><span class="wi wi-appjurisdiction">应用权限组</span></div>
	<div class="store">
		<div class="jurisdiction-list">
			<?php  if(is_array($store_goods)) { foreach($store_goods as $goods) { ?>
			<div class="panel we7-panel">
				<div class="panel-body">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr class="group_menu">
							<td class="td_1"><span class="head"><i class="wi wi-appjurisdiction"></i></span></td>
							<td class="td_2"><span class="name"><?php  echo $module_groups[$goods['module_group']]['name'];?></span><span class="price">¥ <?php  echo $goods['price'];?>元/<?php  if($goods['type'] != STORE_TYPE_API) { ?><?php  if($goods['unit'] == 'month') { ?>月<?php  } else if($goods['unit'] == 'day') { ?>日<?php  } else if($goods['unit'] == 'year') { ?>年<?php  } ?><?php  } ?></span></td>
							<td class="td_3">
								<a href="<?php  echo $this->createWebUrl('goodsbuyer', array('operate' => 'goods_info', 'direct' => 1, 'goods' => $goods['id']))?>" class="more">查看详情 >
								</a>
							</td>
						</tr>
						<tr class="submenu">
							<td class="td_one" colspan="3">
								<span class="tit">可使用模块</span>
								<span class="icon">
									<i class="wi wi-wechat"></i> <?php  echo count($module_groups[$goods['module_group']]['modules'])?>
									<i class="wi wi-wxapp" ></i> <?php  echo count($module_groups[$goods['module_group']]['wxapp'])?>
									<i class="wi wi-pc-circle"></i> <?php  echo count($module_groups[$goods['module_group']]['webapp'])?>
									<i class="wi wi-app"></i> <?php  echo count($module_groups[$goods['module_group']]['phoneapp'])?>
								</span>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<?php  } } ?>
		</div>
	</div>
	<?php  } ?>

	<?php  if($_GPC['type'] == STORE_TYPE_USER_PACKAGE) { ?>
<div><span class="wi wi-userjurisdiction">应用权限组</span></div>
<div class="store">
	<div class="jurisdiction-list">
		<?php  if(is_array($store_goods)) { foreach($store_goods as $goods) { ?>
		<div class="panel we7-panel">
			<div class="panel-body">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr class="group_menu">
						<td class="td_1"><span class="head"><i class="wi wi-userjurisdiction"></i></span></td>
						<td class="td_2"><span class="name"><?php  echo $user_groups[$goods['user_group']]['name'];?></span><span class="price">¥ <?php  echo $goods['price'];?>元/<?php  if($goods['type'] != STORE_TYPE_API) { ?><?php  if($goods['unit'] == 'month') { ?>月<?php  } else if($goods['unit'] == 'day') { ?>日<?php  } else if($goods['unit'] == 'year') { ?>年<?php  } ?><?php  } ?></span></td>
						<td class="td_3">
							<a href="<?php  echo $this->createWebUrl('goodsbuyer', array('operate' => 'goods_info', 'direct' => 1, 'goods' => $goods['id']))?>" class="more">查看详情 >
							</a>
						</td>
					</tr>
					<tr class="submenu">
						<td class="td_one" colspan="3">
							<span class="tit">可创建</span>
							<span class="icon">
								<i class="wi wi-wechat"></i> <?php  echo $user_groups[$goods['user_group']]['maxaccount'];?>
								<i class="wi wi-wxapp" ></i> <?php  echo $user_groups[$goods['user_group']]['maxwxapp'];?>
								<i class="wi wi-pc-circle"></i> <?php  echo $user_groups[$goods['user_group']]['maxwebapp'];?>
								<i class="wi wi-app"></i> <?php  echo $user_groups[$goods['user_group']]['maxphoneapp'];?>
							</span>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<?php  } } ?>
	</div>
</div>
	<?php  } ?>

	<div class="text-right">
		<?php  echo $pager;?>
	</div>
<?php  } else if($operate == 'goods_info') { ?>
<div class="panel-body js-goods-buyer" ng-controller="goodsBuyerCtrl">
	<ol class="breadcrumb we7-breadcrumb">
		<a href="<?php  echo $this->createWebUrl('goodsbuyer', array('operate' => 'display', 'direct' => 1))?>"><i class="wi wi-back-circle"></i> </a>
		<li>
			商城列表
		</li>
		<li>
			<?php  echo $goods['title'];?>
		</li>
	</ol>
	<div class="store <?php  if($goods['type'] == STORE_TYPE_PACKAGE) { ?>jurisdiction-detail<?php  } else { ?>module-detail<?php  } ?>">
		<div class="top">
			<?php  if($goods['type'] == STORE_TYPE_API) { ?>
			<div class="icon"><span class="icon-box"><i class="wi wi-api"></i></span></div>
			<?php  } else if(in_array($goods['type'], array(STORE_TYPE_PACKAGE, STORE_TYPE_ACCOUNT, STORE_TYPE_WXAPP, STORE_TYPE_ACCOUNT_RENEW, STORE_TYPE_WXAPP_RENEW))) { ?>
			<div class="icon"><span class="icon-box"><i class="wi wi-appjurisdiction"></i></span></div>
			<?php  } else if($goods['type'] == STORE_TYPE_USER_PACKAGE) { ?>
			<div class="icon"><span class="icon-box"><i class="wi wi-userjurisdiction"></i></span></div>
			<?php  } else { ?>
			<div class="icon"><img src="<?php  echo $goods['module']['logo'];?>" alt="icon" class="icon" onerror="this.src='./resource/images/nopic-107.png'"/></div>
			<?php  } ?>

			<div class="introduce">
				<div class="name">
					<?php  if(in_array($goods['type'], array(STORE_TYPE_MODULE, STORE_TYPE_WXAPP_MODULE, STORE_TYPE_API, STORE_TYPE_ACCOUNT_RENEW, STORE_TYPE_WXAPP_RENEW))) { ?>
					<?php  echo $goods['title'];?>
					<?php  } else if(in_array($goods['type'], array(STORE_TYPE_ACCOUNT, STORE_TYPE_WXAPP))) { ?>
					创建<?php  echo $goods['num'];?>个<?php  echo $goods['title'];?>
					<?php  } else if($goods['type'] == STORE_TYPE_USER_PACKAGE) { ?>
					<?php  echo $user_group_info['name'];?> 套餐
					<?php  } else { ?>
					<?php  echo $module_groups[$goods['module_group']]['name'];?> 套餐
					<?php  } ?>
				</div>
				<div class="help-block">
					<?php  if(in_array($goods['type'], array(STORE_TYPE_MODULE, STORE_TYPE_WXAPP_MODULE))) { ?>
					<?php  echo $goods['synopsis'];?>
					<?php  } else if(in_array($goods['type'], array(STORE_TYPE_ACCOUNT, STORE_TYPE_WXAPP))) { ?>
					增加创建<?php  echo $goods['title'];?>数量
					<?php  } else if($goods['type'] == STORE_TYPE_API) { ?>
					总计<span class="color-red"><?php  echo $goods['api_num'];?><?php  if($goods['unit'] == 'ten_thousand') { ?>万次</span><?php  } ?>浏览次数，不限时间
					<?php  } else if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?>
					延长公众号到期时间
					<?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?>
					延长小程序到期时间
					<?php  } else { ?>
					增加公众号应用，小程序，模板数量
					<?php  } ?>
				</div>
			</div>
			<div class="buy pull-right">
				<div class="price">单价￥<span class="fee">
					<?php  echo $goods['price'];?></span>
					<?php  if($goods['type'] != STORE_TYPE_API) { ?>/<?php  if($goods['unit'] == 'month') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?><?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?><?php  echo $goods['wxapp_num'];?><?php  } ?>月
					<?php  } else if($goods['unit'] == 'day') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?><?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?><?php  echo $goods['wxapp_num'];?><?php  } ?>日
					<?php  } else if($goods['unit'] == 'year') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?><?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?><?php  echo $goods['wxapp_num'];?><?php  } ?>年
					<?php  } ?>
					<?php  } ?>
				</div>
				<div class="buy-btn">
					<?php  if(in_array($goods['type'], array(STORE_TYPE_MODULE, STORE_TYPE_WXAPP_MODULE, STORE_TYPE_PACKAGE, STORE_TYPE_ACCOUNT_RENEW, STORE_TYPE_WXAPP_RENEW, STORE_TYPE_USER_PACKAGE))) { ?>
					<button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModalBuy">立即购买</button>
					<?php  } else if($goods['type'] == STORE_TYPE_API) { ?>
					<button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#BuyApi">立即购买</button>
					<?php  } else { ?>
					<button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#Buyaccount">立即购买</button>
					<?php  } ?>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalBuy">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">
							<?php  if($goods['type'] == STORE_TYPE_PACKAGE) { ?>
							购买应用套餐
							<?php  } else if($goods['type'] == STORE_TYPE_USER_PACKAGE) { ?>
							购买用户组权限套餐
							<?php  } else if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?>
							续费公众号
							<?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?>
							续费小程序
							<?php  } else { ?>
							购买<span><?php  echo $goods['title'];?></span>应用
							<?php  } ?>
						</h4>
					</div>
					<div class="modal-body">
						<form action="" method="get" class="we7-form">
							<div class="form-group">
								<label class="control-label col-sm-2">应用单价</label>
								<div class="col-sm-8 form-control-static">￥<?php  echo $goods['price'];?><?php  if($goods['type'] != STORE_TYPE_API) { ?>/
									<?php  if($goods['unit'] == 'month') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?><?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?><?php  echo $goods['wxapp_num'];?><?php  } ?>月
									<?php  } else if($goods['unit'] == 'day') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?><?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?><?php  echo $goods['wxapp_num'];?><?php  } ?>日
									<?php  } else if($goods['unit'] == 'year') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?><?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?><?php  echo $goods['wxapp_num'];?><?php  } ?>年
									<?php  } ?>
									<?php  } ?></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">购买时长</label>
								<div class="col-sm-8">
									<div class="clearfix we7-margin-bottom-sm" style="line-height: 34px;">
										<input type="number" class="form-control pull-left" style="width: 80px;" value="1" ng-model="duration"/>&nbsp;
										<?php  if($goods['type'] != STORE_TYPE_API) { ?>
										<?php  if($goods['unit'] == 'month') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?>*<?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?>*<?php  echo $goods['wxapp_num'];?><?php  } ?>月
										<?php  } else if($goods['unit'] == 'day') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?>*<?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?>*<?php  echo $goods['wxapp_num'];?><?php  } ?>日
										<?php  } else if($goods['unit'] == 'year') { ?><?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?>*<?php  echo $goods['account_num'];?><?php  } else if($goods['type'] == STORE_TYPE_WXAPP_RENEW) { ?>*<?php  echo $goods['wxapp_num'];?><?php  } ?>年
										<?php  } ?>
										<?php  } ?>
										<?php  if($goods['type'] == STORE_TYPE_MODULE || $goods['type'] == STORE_TYPE_WXAPP_MODULE) { ?>
										,有效期至{{ expiretime }}
										<?php  } ?>
									</div>
									<div class="select-btn">
										<button type="button" class="btn" ng-class="duration == 1? 'btn-primary' : 'btn-default'" ng-click="changeDuration(1)">1</button>
										<button type="button" class="btn" ng-class="duration == 3? 'btn-primary' : 'btn-default'" ng-click="changeDuration(3)">3</button>
										<button type="button" class="btn" ng-class="duration == 6? 'btn-primary' : 'btn-default'" ng-click="changeDuration(6)">6</button>
										<button type="button" class="btn" ng-class="duration == 12? 'btn-primary' : 'btn-default'" ng-click="changeDuration(12)">12</button>
									</div>
								</div>
							</div>
							<?php  if(in_array($goods['type'], array(STORE_TYPE_MODULE, STORE_TYPE_WXAPP_MODULE, STORE_TYPE_WXAPP_RENEW, STORE_TYPE_ACCOUNT_RENEW)) || $goods['type'] == STORE_TYPE_PACKAGE && !empty($user_account)) { ?>
							<div class="form-group">
								<label class="control-label col-sm-2"><?php  if($goods['type'] == STORE_TYPE_WXAPP_MODULE) { ?>小程序<?php  } else { ?>公众号<?php  } ?></label>
								<div class="col-sm-10">
									<div class="clearfix" style="line-height: 34px;">
										<!-- <select class="we7-select" style="width:150px;" ng-model="<?php  if($goods['type'] == STORE_TYPE_WXAPP_MODULE) { ?>wxapp<?php  } else { ?>uniacid<?php  } ?>"> -->
										<select class="we7-select" style="width:150px;" ng-model="uniacid">
											<option value="{{ uniacid }}" ng-repeat="(uniacid, account) in account_list track by uniacid">{{ account.name }}</option>
										</select>
										<span class="text-error">注意!</span>请确认服务所需绑定的公众号,购买后不可更换.
									</div>
								</div>
							</div>
							<?php  } ?>
							<?php  if($goods['type'] == STORE_TYPE_PACKAGE && !empty($wxapp_account_list)) { ?>
							<div class="form-group">
								<label class="control-label col-sm-2">小程序</label>
								<div class="col-sm-10">
									<div class="clearfix" style="line-height: 34px;">
										<select class="we7-select" style="width:150px;" ng-model="wxapp">
											<option value="{{ account.uniacid }}" ng-repeat="account in wxapp_account_list">{{ account.name }}</option>
										</select>
										<span class="text-error">注意!</span>请确认服务所需绑定的小程序,购买后不可更换.
									</div>
								</div>
							</div>
							<?php  } ?>
							<div class="form-group">
								<label class="control-label col-sm-2">费用明细</label>
								<div class="col-sm-8 form-control-static">实付总计<span class="we7-margin-left">￥{{ price }}</span></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">支付方式</label>
								<div class="select-btn">
									<button type="button" ng-repeat="(way, pay_way_info) in pay_way_list track by way" ng-class="pay_way == way? 'btn btn-primary' : 'btn btn-default'" ng-click="changePayWay(way)">{{ pay_way_info.title }}</button>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" ng-click="submit_order('order')">提交订单</button>
						<button type="button" class="btn btn-primary hidden" ng-click="submit_order('pay')">立即支付</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="Buyaccount">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">购买<span><?php  echo $goods['title'];?></span></h4>
					</div>
					<div class="modal-body">
						<form action="" method="get" class="we7-form">
							<div class="form-group">
								<label class="control-label col-sm-2">应用单价</label>
								<div class="col-sm-8 form-control-static">￥<?php  echo $goods['price'];?><?php  if($goods['type'] != STORE_TYPE_API) { ?>/<?php  if($goods['unit'] == 'month') { ?>月<?php  } else if($goods['unit'] == 'day') { ?>日<?php  } else if($goods['unit'] == 'year') { ?>年<?php  } ?><?php  } ?></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">费用明细</label>
								<div class="col-sm-8 form-control-static">实付总计<span class="we7-margin-left">￥{{ price }}</span></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">支付方式</label>
								<div class="select-btn">
									<button type="button" ng-repeat="(way, pay_way_info) in pay_way_list track by way" ng-class="pay_way == way? 'btn btn-primary' : 'btn btn-default'" ng-click="changePayWay(way)">{{ pay_way_info.title }}</button>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" ng-click="submit_order('order')">提交订单</button>
						<button type="button" class="btn btn-primary" ng-click="submit_order('pay')">立即支付</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="BuyApi">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">购买API浏览次数</h4>
					</div>
					<div class="modal-body">
						<form action="" method="get" class="we7-form">
							<div class="form-group">
								<label class="control-label col-sm-2">商品单价</label>
								<div class="col-sm-8 form-control-static color-red">￥<?php  echo $goods['price'];?> / <?php  echo $goods['api_num'];?><?php  if($goods['unit'] == 'ten_thousand') { ?>万次<?php  } ?></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">购买份数</label>
								<div class="col-sm-8">
									<div class="clearfix we7-margin-bottom-sm" style="line-height: 34px;">
										<input type="number" class="form-control pull-left" style="width: 80px;" value="1" ng-model="duration"/>份，共购买<span class="color-red" ng-bind="goods.api_num * duration"></span>万次浏览量
									</div>
									<div class="select-btn">
										<button type="button" class="btn" ng-class="duration == 10? 'btn-primary' : 'btn-default'" ng-click="changeDuration(10)">10</button>
										<button type="button" class="btn" ng-class="duration == 20? 'btn-primary' : 'btn-default'" ng-click="changeDuration(20)">20</button>
										<button type="button" class="btn" ng-class="duration == 30? 'btn-primary' : 'btn-default'" ng-click="changeDuration(30)">30</button>
										<button type="button" class="btn" ng-class="duration == 50? 'btn-primary' : 'btn-default'" ng-click="changeDuration(50)">50</button>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">公众号</label>
								<div class="col-sm-10">
									<div class="clearfix" style="line-height: 34px;">
										<select class="we7-select" style="width:150px;" ng-model="uniacid">
											<option value="{{ uniacid }}" ng-repeat="(uniacid, account) in account_list track by uniacid">{{ account.name }}</option>
										</select>
										<span class="text-error">注意!</span>请确认服务所需绑定的公众号,购买后不可更换.
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">费用明细</label>
								<div class="col-sm-8 form-control-static">实付总计 ￥<span class="color-red" ng-bind="goods.price * duration"></span></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">支付方式</label>
								<div class="select-btn">
									<button type="button" ng-repeat="(way, pay_way_info) in pay_way_list track by way" class="btn" ng-class="pay_way == way? 'btn-primary' : 'btn-default'" ng-click="changePayWay(way)">{{ pay_way_info.title }}</button>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" ng-click="submit_order('order')">提交订单</button>
						<button type="button" class="btn btn-primary" ng-click="submit_order('pay')">立即支付</button>
					</div>
				</div>
			</div>
		</div>

		<?php  if(in_array($goods['type'], array(STORE_TYPE_MODULE, STORE_TYPE_WXAPP_MODULE))) { ?>
		<div class="swiper">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php  if(is_array($goods['slide'])) { foreach($goods['slide'] as $picture) { ?>
					<div class="swiper-slide"><img src="<?php  echo tomedia($picture)?>" alt="" class="img-responsive"/></div>
					<?php  } } ?>
				</div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</div>
		<div class="summary">
			<div class="title">应用介绍</div>
			<div class="content">
				<?php  echo $goods['description'];?>
			</div>
		</div>
		<?php  } else if(in_array($goods['type'], array(STORE_TYPE_ACCOUNT, STORE_TYPE_WXAPP, STORE_TYPE_API))) { ?>
		<div class="summary">
			<div class="title">商品介绍</div>
			<div class="content help-block">
				<?php  if($goods['type'] == STORE_TYPE_API) { ?>
				购买API浏览次数，购买之后使用时间不限
				<?php  } else { ?>
				1.购买商品后您将多创建<?php  echo $goods['num'];?>个<?php  echo $goods['title'];?>, 不受已有用户组限制。<br/>
				2.购买的<?php  echo $goods['title'];?>是有时效的，到期需要继续购买方可使用。
				<?php  } ?>
			</div>
		</div>
		<?php  } else if(in_array($goods['type'], array(STORE_TYPE_ACCOUNT_RENEW, STORE_TYPE_WXAPP_RENEW))) { ?>
		<div class="summary">
			<div class="title">商品介绍</div>
			<div class="content help-block">
				<?php  if($goods['type'] == STORE_TYPE_ACCOUNT_RENEW) { ?>
				续费公众号
				<?php  } else { ?>
				续费小程序
				<?php  } ?>
			</div>
		</div>
		<?php  } else if($goods['type'] == STORE_TYPE_USER_PACKAGE) { ?>
		<div class="bg-gray">
			<div class="txt">
				<p>购买商品后您将拥有相应的公众号应用，小程序应用，模板的使用权限，不受已有用户组的限制。 </p>
			</div>
			<div class="creat">
				<h1>可创建数量</h1>
				<ul class="clearfloat">
					<li>
						<div class="type"><div>公众号</div><i class="wi wi-wechat"></i></div>
						<div class="num"><?php  echo $user_group_info['maxaccount'];?></div>
					</li>
					<li>
						<div class="type"><div>子公众号</div><i class="wi wi-wechat"></i></div>
						<div class="num"><?php  echo $user_group_info['maxsubaccount'];?></div>
					</li>
					<li>
						<div class="type"><div>小程序</div><span><i class="wi wi-wxapp"></i></span></div>
						<div class="num"><?php  echo $user_group_info['maxwxapp'];?></div>
					</li>
					<li>
						<div class="type"><div>PC应用</div><i class="wi wi-pc"></i></div>
						<div class="num"><?php  echo $user_group_info['maxwebapp'];?></div>
					</li>
					<li>
						<div class="type"><div>APP</div><i class="wi wi-app"></i></div>
						<div class="num"><?php  echo $user_group_info['maxphoneapp'];?></div>
					</li>
				</ul>
			</div>
			<div class="about" >
				<h1>包含应用权限组</h1>
				<div class="box" >
					<div class="nav" ng-repeat="pack in packages">
						<div class="menu">
								<span class="pull-right link-group">
									<a href="javascript:;" class="open color-default"  data-toggle="collapse" data-target="#demo-{{pack.id}}">展开</a>
								</span>
							{{ pack.name}}
						</div>
						<ul class="submenu" style="" id="demo-{{pack.id}}">
							<li ng-if="pack.modules">
								<span class="tit">公众号应用</span>
								<ul>
									<li ng-repeat="module in pack.modules">
										<img class="head" ng-src="{{module.logo}}}" alt=""><span class="name" ng-bind=" module.title "></span>
									</li>
								</ul>
							</li>
							<li ng-if="pack.wxapp">
								<span class="tit">小程序应用</span>
								<ul>
									<li ng-repeat="wxapp in pack.wxapp">
										<img class="head" ng-src="{{wxapp.logo}}"><span class="name" ng-bind="wxapp.title"></span>
									</li>
								</ul>
							</li>
							<li ng-if="pack.webapp">
								<span class="tit">PC应用</span>
								<ul >
									<li ng-repeat="webapp in pack.webapp">
										<img class="head" ng-src="{{webapp.logo}}"><span class="name" ng-bind="webapp.title"> </span>
									</li>
								</ul>
							</li>
							<li ng-if="pack.phoneapp">
								<span class="tit">APP应用</span>
								<ul >
									<li ng-repeat="phoneapp in pack.phoneapp">
										<img class="head" ng-src="{{phoneapp.logo}}"><span class="name" ng-bind="phoneapp.title"> </span>
									</li>
								</ul>
							</li>

						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php  } else { ?>
		<div class="summary">
			<div class="color-gray">购买商品后您将拥有相应的公众号应用，小程序应用，模板的使用权限，不受已有用户组的限制。</div>
			<div class="title">公众号应用</div>
			<div class="item-list clearfix">
				<?php  if(is_array($module_groups[$goods['module_group']]['modules'])) { foreach($module_groups[$goods['module_group']]['modules'] as $module) { ?>
				<div class="item">
					<img src="<?php  echo $module['logo'];?>" alt="" class="icon"/>
					<div class="text-over"><?php  echo $module['title'];?></div>
				</div>
				<?php  } } ?>
			</div>
			<div class="title">小程序应用</div>
			<div class="item-list clearfix">
				<?php  if(is_array($module_groups[$goods['module_group']]['wxapp'])) { foreach($module_groups[$goods['module_group']]['wxapp'] as $wxapp_module) { ?>
				<div class="item">
					<img src="<?php  echo $wxapp_module['logo'];?>" alt="" class="icon"/>
					<div class="text-over"><?php  echo $wxapp_module['title'];?></div>
				</div>
				<?php  } } ?>
			</div>
			<div class="title">模板</div>
			<div class="item-list clearfix">
				<?php  if(is_array($module_groups[$goods['module_group']]['templates'])) { foreach($module_groups[$goods['module_group']]['templates'] as $template) { ?>
				<div class="item">
					<div class="text-over"><?php  echo $template['title'];?></div>
				</div>
				<?php  } } ?>
			</div>
		</div>
		<?php  } ?>
	</div>
</div>
<script>
	<?php  $first_account = current($user_account);?>
	angular.module('storeApp').value('config', {
		'singlePrice' : <?php  echo $goods['price'];?>,
		'wxapp' : '<?php  echo $default_wxapp;?>',
		'unit' : '<?php  echo $goods['unit'];?>',
		account_list : <?php  echo json_encode($user_account)?>,
		wxapp_account_list : <?php  echo json_encode($wxapp_account_list)?>,
		pay_way : <?php  echo json_encode($pay_way)?>,
		expiretime : "<?php  echo date('Y-m-d', strtotime('+1 ' . $goods['unit'], time()))?>",
		first_uniacid : "<?php  echo $default_account;?>",
		goods : <?php  echo json_encode($goods)?>,
		packages : <?php echo !empty($user_group_info['package_info']) ? json_encode($user_group_info['package_info']) : 'null'?>,
	});
	angular.bootstrap($('.js-goods-buyer'), ['storeApp']);
	$(function() {
		require(['swiper'], function () {
			var mySwiper = new Swiper('.swiper-container', {
				loop: true,
				width: 240,
				height: 400,
				spaceBetween: 20,
				// 如果需要前进后退按钮
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev'
			})
		});
	});
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>