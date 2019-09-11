<?php

if (isset($_GET['op'])) {

	switch ($_GET['op']) {
		case 'recommend':
            Shop::Recommend();
			break;

		case 'newlly':
            Shop::Newlly();
			break;
		
		default:
			Shop::Index();
			break;
	}

}else{
	Shop::index();
}

class Shop extends WeBase{

    public function Index(){

        $goods = pdo_getall('lhyzhnc_sun_goods',array('status'=>2));

        $page = 'index';

        include $this->template('shop');

    }

    public function Recommend(){

        $goods = pdo_getall('lhyzhnc_sun_goods',array('status'=>2,'cid'=>1));

        $page = 'recomend';

        include $this->template('shop');
    }

    public function Newlly(){

        $goods = pdo_fetchall('select * from ims_lhyzhnc_sun_goods where status=:status order by id desc',array('status'=>2));
        
        $page = 'newlly';

        include $this->template('shop');

    }
}

