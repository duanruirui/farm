<?php

if (isset($_GET['op'])) {

	switch ($_GET['op']) {
		case 'index':
            Adopt::Index();
			break;

		case 'adopt_detail':
            Adopt::Detail();
			break;
		
		default:
			Adopt::Index();
			break;
	}

}else{
	Adopt::Index();
}

class Adopt extends WeBase{

    public function Index(){

        $adopt = pdo_getall('lhyzhnc_sun_adopt',array('status'=>2));

        $adopt_ids = array();

        foreach ($adopt as $key => $value) {

            array_push($adopt_ids, $value['id']);

        }

        $adopt_sales = pdo_fetchall('select count(num) as adopt_order_num,aid,count(distinct uid) as adopt_order_people from ims_lhyzhnc_sun_adoptorder where aid in ('.implode(',', $adopt_ids).') group by aid ');

        $adopt_sales_arr = array();

        foreach ($adopt_sales as $key => $value) {

            $adopt_sales_arr[$value['aid']] = $value;
            
        }

        $page = 'index';

        include $this->template('adopt');

    }

    public function Newlly(){

        $crowd = pdo_fetchall('select * from ims_lhyzhnc_sun_adopt where status=:status order by id desc',array('status'=>2));
        
        $page = 'newlly';

        include $this->template('adopt');

    }

    public function Detail(){
        $adopt = pdo_fetch('select * from ims_lhyzhnc_sun_adopt where id=:id order by id desc',array('id'=>$_GET['adopt_id']));
        $banners = explode(',', $adopt['imgs']);
        include $this->template('adopt_detail');
    }
}

