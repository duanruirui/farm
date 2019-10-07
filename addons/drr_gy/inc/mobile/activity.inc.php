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

        $crowd = pdo_fetchall('select * from ims_lhyzhnc_sun_activity where status=:status order by id desc',array('status'=>2));
        
        $page = 'newlly';

        include $this->template('activity');

    }

    public function Detail(){
        $activity = pdo_fetch('select * from ims_lhyzhnc_sun_activity where id=:id order by id desc',array('id'=>$_GET['activity_id']));
        $banners = explode(',', $activity['imgs']);
        include $this->template('activity_detail');
    }
}

