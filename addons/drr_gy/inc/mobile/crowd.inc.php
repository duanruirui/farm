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

error_reporting(E_ALL);

class Crowd extends WeBase{

    public function Index(){
        if( !function_exists("array_column") ) 
        {
            function array_column($input, $column_key, $index_key = NULL) 
            {
                $arr = array( );
                foreach( $input as $d ) 
                {
                    if( !isset($d[$column_key]) ) 
                    {
                        return NULL;
                    }
                    if( $index_key !== NULL ) 
                    {
                        return array( $d[$index_key] => $d[$column_key] );
                    }
                    $arr[] = $d[$column_key];
                }
                if( $index_key !== NULL ) 
                {
                    $tmp = array( );
                    foreach( $arr as $ar ) 
                    {
                        $tmp[key($ar)] = current($ar);
                    }
                    $arr = $tmp;
                }
                return $arr;
            }
        }
        $crowd = pdo_fetchall('select * from ims_lhyzhnc_sun_crowd where status=:status order by sort asc',array('status'=>2));
        if(!empty($crowd)){
            $crowd_orders = pdo_fetchall("select count(*) as counts,uid,sum(num) as num from ims_lhyzhnc_sun_crowdorder where uid in (".implode(',', array_column($crowd, 'id')).")");
            $crowd_orders_arr = array();
            foreach ($crowd_orders as $key => $value) {
                $crowd_orders_arr[$value['uid']] = $value;
            }
            foreach ($crowd as $key => $value) {
                $total_num = $value['vir']+ $crowd_orders_arr[$value['id']]['num'];
                $crowd[$key]['total_buyers'] = $value['vir']+$crowd_orders_arr[$value['id']]['counts'];
                $crowd[$key]['total_num'] = $total_num;
                $crowd[$key]['rate'] = intval($total_num/$value['lower']*100);
                $crowd[$key]['total'] = $total_num*$value['gearone'];
                $crowd[$key]['remain'] = intval(($value['time']+86400*$value['day']-time())/86400);
            }            
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
        $crowd_order = pdo_fetch('select count(*) as counts,sum(num) as num from ims_lhyzhnc_sun_crowdorder where uid=:id',array('id'=>$crowd_id));
        $total_num = $crowd['vir']+$crowd_order['num'];
        $crowd['total_num'] = $total_num;
        $crowd['total_buyers'] = $crowd['vir']+$crowd_order['counts'];
        $crowd['rate'] = intval($total_num/$crowd['lower']*100);
        $crowd['total'] = $total_num*$crowd['gearone'];
        $crowd['remain'] = intval(($crowd['time']+86400*$crowd['day']-time())/86400);
        $banners = explode(',', $crowd['imgs']);
        $gearinfo = array();
        if(!empty($crowd['gearone'])){
            array_push($gearinfo, array('gear'=>$crowd['gearone'],'intro'=>$crowd['introone']));
            if(!empty($crowd['geartwo'])){
                array_push($gearinfo, array('gear'=>$crowd['geartwo'],'intro'=>$crowd['introtwo']));
                if(!empty($crowd['gearthree'])){
                    array_push($gearinfo, array('gear'=>$crowd['gearthree'],'intro'=>$crowd['introthree']));
                    if(!empty($crowd['gearfour'])){
                        array_push($gearinfo, array('gear'=>$crowd['gearfour'],'intro'=>$crowd['introfour']));
                        if(!empty($crowd['gearfive'])){
                            array_push($gearinfo, array('gear'=>$crowd['gearfive'],'intro'=>$crowd['introfive']));
                        }
                    }
                }
            }
        }

        include $this->template('crowd_detail');
    }
}

