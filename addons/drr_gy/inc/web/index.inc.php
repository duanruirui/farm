<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$uniacid = $_W['uniacid'];
//会员信息
$time=date("Y-m-d");
$time2=date("Y-m-d",strtotime("-1 day"));
$time3=date("Y-m");
$time4=date("Y-m",strtotime("-1 month"));
$time5=date("Y");
$time6=date("Y",strtotime("-1 year"));



//会员总数
$totalhy=pdo_get('lhyzhnc_sun_user', array('uniacid'=>$_W['uniacid']), array('count(id) as count'));

//今日新增会员
$sql=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_user')." where uniacid={$_W['uniacid']}) a where time like '%{$time}%' ";
$jir=count(pdo_fetchall($sql));

//昨日新增
$sql2=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_user')." where uniacid={$_W['uniacid']}) a where time like '%{$time2}%' ";
$zuor=count(pdo_fetchall($sql2));

//本月新增
$sql3=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_user')." where uniacid={$_W['uniacid']}) a where time like '%{$time3}%' ";
$beny=count(pdo_fetchall($sql3));

//今日新增产品订单
$sql4=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_goodsorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time}%' ";
$day_order=count(pdo_fetchall($sql4));

//昨日新增产品订单
$sql5=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_goodsorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time2}%' ";
$yesterday_order=count(pdo_fetchall($sql5));

//本月新增产品订单
$sql6=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_goodsorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time3}%' ";
$thismonth_order=count(pdo_fetchall($sql6));

//上月新增产品订单
$sql7=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_goodsorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time4}%' ";
$lastmonth_order=count(pdo_fetchall($sql7));

//今年新增产品订单
$sql8=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_goodsorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time5}%' ";
$thisyear_order=count(pdo_fetchall($sql8));

//今年新增产品订单
$sql9=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_goodsorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time6}%' ";
$lastyear_order=count(pdo_fetchall($sql9));


//今日新增活动订单
$sql11=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_activityorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time}%' ";
$day_order1=count(pdo_fetchall($sql11));

//昨日新增活动订单
$sql12=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_activityorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time2}%' ";
$yesterday_order1=count(pdo_fetchall($sql12));

//本月新增活动订单
$sql13=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_activityorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time3}%' ";
$thismonth_order1=count(pdo_fetchall($sql13));

//上月新增活动订单
$sql14=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_activityorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time4}%' ";
$lastmonth_order1=count(pdo_fetchall($sql14));

//今年新增活动订单
$sql15=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_activityorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time5}%' ";
$thisyear_order1=count(pdo_fetchall($sql15));

//今年新增活动订单
$sql16=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_activityorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time6}%' ";
$lastyear_order1=count(pdo_fetchall($sql16));

//今日新增众筹订单
$sql21=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_crowdorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time}%' ";
$day_order2=count(pdo_fetchall($sql21));

//昨日新增众筹订单
$sql22=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_crowdorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time2}%' ";
$yesterday_order2=count(pdo_fetchall($sql22));

//本月新增众筹订单
$sql23=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_crowdorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time3}%' ";
$thismonth_order2=count(pdo_fetchall($sql23));

//上月新增众筹订单
$sql24=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_crowdorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time4}%' ";
$lastmonth_order2=count(pdo_fetchall($sql24));

//今年新增众筹订单
$sql25=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_crowdorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time5}%' ";
$thisyear_order2=count(pdo_fetchall($sql25));

//去年新增众筹订单
$sql26=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_crowdorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time6}%' ";
$lastyear_order2=count(pdo_fetchall($sql26));

//今日新增认养订单
$sql31=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_adoptorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time}%' ";
$day_order3=count(pdo_fetchall($sql31));

//昨日新增认养订单
$sql32=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_adoptorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time2}%' ";
$yesterday_order3=count(pdo_fetchall($sql32));

//本月新增认养订单
$sql33=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_adoptorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time3}%' ";
$thismonth_order3=count(pdo_fetchall($sql33));

//上月新增认养订单
$sql34=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_adoptorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time4}%' ";
$lastmonth_order3=count(pdo_fetchall($sql34));

//今年新增认养订单
$sql35=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_adoptorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time5}%' ";
$thisyear_order3=count(pdo_fetchall($sql35));

//去年新增认养订单
$sql36=" select a.* from (select  id,FROM_UNIXTIME(time) as time  from".tablename('lhyzhnc_sun_adoptorder')." where uniacid={$_W['uniacid']}) a where time like '%{$time6}%' ";
$lastyear_order3=count(pdo_fetchall($sql36));

include $this->template('web/index');