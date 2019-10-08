<?php

if (isset($_GET['op'])) {

	switch ($_GET['op']) {
		case 'index':
            Activity::Index();
			break;

		case 'activity_detail':
            Activity::Detail();
			break;
		
		default:
			Activity::Index();
			break;
	}

}else{
	Activity::Index();
}

class Activity extends WeBase{

    public function Index(){

        $activity = pdo_getall('lhyzhnc_sun_activity',array('status'=>2));

        $activity_ids = array();

        foreach ($activity as $key => $value) {

            array_push($activity_ids, $value['id']);

        }

        $activity_sales = pdo_fetchall('select count(num) as activity_order_num,aid,count(distinct uid) as activity_order_people from ims_lhyzhnc_sun_activityorder where aid in ('.implode(',', $activity_ids).') group by aid ');

        $activity_sales_arr = array();

        foreach ($activity_sales as $key => $value) {

            $activity_sales_arr[$value['aid']] = $value;
            
        }

        $page = 'index';

        include $this->template('activity');

    }

    public function Newlly(){

        $activity = pdo_fetchall('select * from ims_lhyzhnc_sun_activity where status=:status order by id desc',array('status'=>2));
        
        $page = 'newlly';

        include $this->template('activity');

    }

    public function Detail(){
        $activity = pdo_fetch('select * from ims_lhyzhnc_sun_activity where id=:id order by id desc',array('id'=>$_GET['activity_id']));
        $activity_order = pdo_fetch('select count(*) as counts,sum(num) as num from ims_lhyzhnc_sun_activityorder where aid=:id',array('id'=>$_GET['activity_id']));
        $total_num = $activity['vir']+$activity_order['num'];
        $activity['total_num'] = $total_num;
        $activity['total_buyers'] = $activity['vir']+$activity_order['counts'];
        $activity['rate'] = intval($total_num/$activity['num']*100);
        $activity['total'] = pdo_fetchcolumn('select sum(price) as total from ims_lhyzhnc_sun_activityorder where aid='.$_GET['activity_id'])+$activity['vir']*$activity['price'];
        $activity['remain'] = intval(($activity['time']+86400*$activity['day']-time())/86400);
        $banners = explode(',', $activity['imgs']);
        include $this->template('activity_detail');
    }
}

