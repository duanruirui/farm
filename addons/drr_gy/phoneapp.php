<?php
/**
 * drr_gy模块APP接口定义
 *
 * @author drr2019
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class Drr_gyModulePhoneapp extends WeModulePhoneapp {
	public function doPageTest(){
		global $_GPC, $_W;
		$errno = 0;
		$message = '返回消息';
		$data = array();
		return $this->result($errno, $message, $data);
	}
	
	
}