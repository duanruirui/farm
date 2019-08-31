<?php
/**
 * drr_gy模块PC接口定义
 *
 * @author drr2019
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class Drr_gyModuleWebapp extends WeModuleWebapp {
	public function doPageTest(){
		global $_GPC, $_W;
		$errno = 0;
		$message = '返回消息';
		$data = array();
		return $this->result($errno, $message, $data);
	}

}