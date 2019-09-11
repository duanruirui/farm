<?php

$goods_id = $_GET['goods_id'];

Goods::Index($goods_id);

class Goods extends WeBase{

    public function Index($id){

        $goods = pdo_get('lhyzhnc_sun_goods',array('status'=>2,'id'=>$id));

        $spec = explode(',', $goods['spec']);

        $speccontent = explode(',', $goods['speccontent']);

        $specnums = explode(',', $goods['specnum']);

        $specprices = explode(',', $goods['specprice']);


        $specs = array();

        for ($i=0; $i < count($spec); $i++) {
        	$specs[$i]['spec'] = $spec[$i];
        	$specs[$i]['speccontent'] = $speccontent[$i];
        	$specs[$i]['specnums'] = $specnums[$i];
        	$specs[$i]['specprices'] = $specprices[$i];
        }

        $banners = explode(',', $goods['imgs']);

        $goods_comments = pdo_get('lhyzhnc_sun_goodsping',array('gid'=>$id));

        include $this->template('goods_detail');

    }


}

