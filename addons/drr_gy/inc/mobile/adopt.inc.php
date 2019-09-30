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

        $crowd = pdo_getall('lhyzhnc_sun_adopt',array('status'=>2));

        $page = 'index';

        include $this->template('adopt');

    }

    public function Newlly(){

        $crowd = pdo_fetchall('select * from lhyzhnc_sun_adopt where status=:status order by id desc',array('status'=>2));
        
        $page = 'newlly';

        include $this->template('crowd');

    }

    public function Detail(){
        $crowd = pdo_fetch('select * from lhyzhnc_sun_adopt where id=:id order by id desc',array('id'=>$crowd_id));
        $crowd['rate'] = intval($crowd['vir']/$crowd['lower']*100);
        $crowd['total'] = $crowd['vir']*$crowd['gearone'];
        $crowd['remain'] = intval(($crowd['time']+86400*$crowd['day']-time())/86400);
        $banners = explode(',', $crowd['imgs']);
        include $this->template('crowd_detail');
    }
}

