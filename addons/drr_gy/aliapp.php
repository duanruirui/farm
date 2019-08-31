<?php
/**
 * drr_gy支付宝小程序接口定义
 *
 * @author drr2019
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class Drr_gyModuleAliapp extends WeModuleAliapp {
	public function doPageTest(){
		global $_GPC, $_W;
		// 此处开发者自行处理
		include $this->template('test');
	}
}