<?php

if (isset($_GET['op'])) {

	switch ($_GET['op']) {
		case 'index':
            Crowd::Index();
			break;

		case 'crowd_detail':
            Crowd::Detail($_GET['crowd_id']);
			break;
		
		default:
			Crowd::Index();
			break;
	}

}else{
	Crowd::Index();
}

class Crowd extends WeBase{

    public function Index(){

        $crowd = pdo_getall('lhyzhnc_sun_crowd',array('status'=>2));

        foreach ($crowd as $key => $value) {
            $crowd[$key]['rate'] = intval($value['vir']/$value['lower']*100);
        }

        $page = 'index';

        include $this->template('crowd');

    }

    public function Newlly(){

        $crowd = pdo_fetchall('select * from ims_lhyzhnc_sun_crowd where status=:status order by id desc',array('status'=>2));
        
        $page = 'newlly';

        include $this->template('crowd');

    }

    public function Detail($crowd_id){
        $crowd = pdo_fetch('select * from ims_lhyzhnc_sun_crowd where id=:id order by id desc',array('id'=>$crowd_id));
        $banners = explode(',', $crowd['imgs']);
        include $this->template('crowd_detail');
    }
}

