<?php
/**
 * drr_gy模块微站定义
 *
 * @author drr2019
 * @url
 */
defined('IN_IA') or exit('Access Denied');

require 'inc/func/core.php';

class Drr_gyModuleSite extends Core {


    public function doWebNotify($data){
        global $_W,$_GPC;
        $attach = $data['attach'];
        if($attach){
            $attach_arr = explode("@@@",$attach);
            if(sizeof($attach_arr)==3){
                $_W['uniacid'] = $uniacid = intval($attach_arr[0]);
                $ordertype = intval($attach_arr[1]);//1产品，2活动，3众筹，4众筹
                $oid = intval($attach_arr[2]);
            }else{
                die('FAIL');
            }
        }else{
            die('FAIL');
        }
        $out_trade_no = $data['out_trade_no'];
        
        //获取订单数据
       if($ordertype==1){
            $orderget=pdo_get("lhyzhnc_sun_goodsorder",array('uniacid'=>$_W['uniacid'],'id'=>$oid,'status'=>0));
            if($orderget){
                $order=pdo_get("lhyzhnc_sun_goodsorder",array('uniacid'=>$_W['uniacid'],'id'=>$oid));
                $result=pdo_get('lhyzhnc_sun_goods',array('uniacid'=>$_W['uniacid'],'status'=>2,'id'=>$order['gid']),array('speccontent','specnum'));
                $result['speccontent']=explode(',', $result['speccontent']);
                $result['specnum']=explode(',', $result['specnum']);
                $spec=$order['spec'];
                foreach ($result['speccontent'] as $key => $value) {
                    if($value==$spec){
                        $k=$key;
                    }
                }
                if($result['specnum'][$k]-$order['num']>=0){
                    $result['specnum'][$k]=$result['specnum'][$k]-$order['num'];
                    $result1=pdo_update('lhyzhnc_sun_goods',array('specnum'=>implode(',',$result['specnum'])),array('uniacid'=>$_W['uniacid'],'id'=>$order['gid']));
                    $res=pdo_update('lhyzhnc_sun_goodsorder',array('status'=>1),array('uniacid'=>$_W['uniacid'],'id'=>$oid));
                    if($res){
                        die('SUCCESS');
                        
                    }else{
                    die('FAIL');
                        
                    }
                }else{
                    die('FAIL');
                    
                }
            }else{
                    die('FAIL');

            }
                        die('SUCCESS');
            
            
       }elseif($ordertype==2){
            $orderget=pdo_get('lhyzhnc_sun_activityorder',array('uniacid'=>$_W['uniacid'],'id'=>$oid,'status'=>0));
            if($orderget){
                $res=pdo_update('lhyzhnc_sun_activityorder',array('status'=>1),array('uniacid'=>$_W['uniacid'],'id'=>$oid));
                if($res){
                    die('SUCCESS');
                }else{
                    die('FAIL');
                }
            }else{
                die('FAIL');

            }
            die('SUCCESS');
            

       }elseif($ordertype==3){
        // 载入日志函数
            // load()->func('logging');
            // //记录文本日志
            // logging_run(json_encode($data), 'trace','test2' );
            $orderget=pdo_get('lhyzhnc_sun_crowdorder',array('uniacid'=>$_W['uniacid'],'id'=>$oid,'status'=>1));
            if($orderget){
                $res=pdo_update('lhyzhnc_sun_crowdorder',array('status'=>2),array('uniacid'=>$_W['uniacid'],'id'=>$oid));
                if($res){
                    die('SUCCESS');
                }else{
                    die('FAIL');
                }

            }else{
                die('FAIL');

            }
                die('SUCCESS');
            
       }elseif($ordertype==4){
            $orderget=pdo_get('lhyzhnc_sun_adoptorder',array('uniacid'=>$_W['uniacid'],'id'=>$oid,'status'=>1));
            if($orderget){
                $res=pdo_update('lhyzhnc_sun_adoptorder',array('status'=>2),array('uniacid'=>$_W['uniacid'],'id'=>$oid));
                if($res){
                    die('SUCCESS');
                }else{
                    die('FAIL');
                }

            }else{
                die('FAIL');

            }
                die('SUCCESS');
       }
        
    }

    //活动评论批量删除
    public function doMobileAlldeleteCar(){
        global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_activityping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));
            $res=pdo_delete('lhyzhnc_sun_activityping',array('id'=>$_GPC['id']));
            if($res){
                message('删除成功',$this->createWebUrl('activityping',array('id'=>$aid['aid'])),'success');
            }else{
                message('删除失败','','error');
            }
    }

    //活动评论批量通过
    public function doMobileAdoptCar(){
         global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_activityping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));

            $res=pdo_update('lhyzhnc_sun_activityping',array('status'=>2),array('id'=>$_GPC['id']));
            if($res){
                message('操作成功',$this->createWebUrl('activityping',array('id'=>$aid['aid'])),'success');
            }else{
                message('操作失败','','error');
            }
    }

    //活动评论批量拒绝
    public function doMobileRejectCar(){
         global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_activityping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));

            $res=pdo_update('lhyzhnc_sun_activityping',array('status'=>1),array('id'=>$_GPC['id']));
            if($res){
                message('操作成功',$this->createWebUrl('activityping',array('id'=>$aid['aid'])),'success');
            }else{
                message('操作失败','','error');
            }
    }
    //文章评论批量删除
    public function doMobileAlldeletearticle(){
        global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_articleping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));
            $res=pdo_delete('lhyzhnc_sun_articleping',array('id'=>$_GPC['id']));
            if($res){
                message('删除成功',$this->createWebUrl('articleping',array('id'=>$aid['aid'])),'success');
            }else{
                message('删除失败','','error');
            }
    }

    //文章评论批量通过
    public function doMobileAdoptarticle(){
         global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_articleping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));

            $res=pdo_update('lhyzhnc_sun_articleping',array('status'=>2),array('id'=>$_GPC['id']));
            if($res){
                message('操作成功',$this->createWebUrl('articleping',array('id'=>$aid['aid'])),'success');
            }else{
                message('操作失败','','error');
            }
    }

    //文章评论批量拒绝
    public function doMobileRejectarticle(){
         global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_articleping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));

            $res=pdo_update('lhyzhnc_sun_articleping',array('status'=>1),array('id'=>$_GPC['id']));
            if($res){
                message('操作成功',$this->createWebUrl('articleping',array('id'=>$aid['aid'])),'success');
            }else{
                message('操作失败','','error');
            }
    }
    //产品评论批量删除
    public function doMobileAlldeletegoods(){
        global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_goodsping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));
            $res=pdo_delete('lhyzhnc_sun_goodsping',array('id'=>$_GPC['id']));
            if($res){
                message('删除成功',$this->createWebUrl('goodsping',array('id'=>$aid['gid'])),'success');
            }else{
                message('删除失败','','error');
            }
    }

    //产品评论批量通过
    public function doMobileAdoptgoods(){
         global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_goodsping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));

            $res=pdo_update('lhyzhnc_sun_goodsping',array('status'=>2),array('id'=>$_GPC['id']));
            if($res){
                message('操作成功',$this->createWebUrl('goodsping',array('id'=>$aid['gid'])),'success');
            }else{
                message('操作失败','','error');
            }
    }

    //产品评论批量拒绝
    public function doMobileRejectgoods(){
         global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_goodsping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));

            $res=pdo_update('lhyzhnc_sun_goodsping',array('status'=>1),array('id'=>$_GPC['id']));
            if($res){
                message('操作成功',$this->createWebUrl('goodsping',array('id'=>$aid['gid'])),'success');
            }else{
                message('操作失败','','error');
            }
    }

    //讯息评论批量删除
    public function doMobileAlldeletemessage(){
        global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_messageping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));
            $res=pdo_delete('lhyzhnc_sun_messageping',array('id'=>$_GPC['id']));
            if($res){
                message('删除成功',$this->createWebUrl('messageping',array('id'=>$aid['mid'])),'success');
            }else{
                message('删除失败','','error');
            }
    }

    //讯息评论批量通过
    public function doMobileAdoptmessage(){
         global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_messageping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));

            $res=pdo_update('lhyzhnc_sun_messageping',array('status'=>2),array('id'=>$_GPC['id']));
            if($res){
                message('操作成功',$this->createWebUrl('messageping',array('id'=>$aid['mid'])),'success');
            }else{
                message('操作失败','','error');
            }
    }

    //讯息评论批量拒绝
    public function doMobileRejectmessage(){
         global $_W, $_GPC;
            $aid = pdo_get('lhyzhnc_sun_messageping',array("uniacid"=>$_W['uniacid'],'id'=>$_GPC['id']));

            $res=pdo_update('lhyzhnc_sun_messageping',array('status'=>1),array('id'=>$_GPC['id']));
            if($res){
                message('操作成功',$this->createWebUrl('messageping',array('id'=>$aid['mid'])),'success');
            }else{
                message('操作失败','','error');
            }
    }

    //批量生成二维码
    public function doMobileallsc(){
        global $_W, $_GPC;

        foreach ($_GPC['ear'] as $key => $value) {
            $res=$this->scerweima($value);
        }
    }
    //批量生成二维码
    public function doMobileallsc1(){
        global $_W, $_GPC;

        foreach ($_GPC['ordernum'] as $key => $value) {
            $ear=pdo_getall('lhyzhnc_sun_choosestore',array('uniacid'=>$_W['uniacid'],'ordernum'=>$value),array('ear'));
            if($ear){
                foreach ($ear as $k => $v) {
                    $res=$this->scerweima($v['ear']);
                    
                }
            }
        }
    }

    function scerweima($url=''){  
        global $_W;
        require_once 'phpqrcode.php';  
        header('Content-type:image/png');
        $value = $url;         
        //二维码内容  
        $errorCorrectionLevel = 'L';  
        //容错级别  
        $matrixPointSize = 10;      
        //生成图片大小  
        //生成二维码图片 
        // $filename = IA_ROOT.'/addons/lhyzhnc_sun/template/images/qrcode.png';  
        $filename = "../attachment/qrcode.png";  

        
        QRcode::png($value,$filename , $errorCorrectionLevel, $matrixPointSize, 2);  
        $QR = $filename;        //已经生成的原始二维码图片文件  
        $QR = imagecreatefromstring(file_get_contents($QR)); 

        $str = $url;
        $im = imagecreate(250,300);
        $white = imagecolorallocate($im,0xFF,0xFF,0xFF);
        imagecolortransparent($im,$white);  //imagecolortransparent() 设置具体某种颜色为透明色，若注释
        $black = imagecolorallocate($im,0x00,0x00,0x00);
         
        imagettftext($im,30,0,18,290,$black,IA_ROOT.'/addons/lhyzhnc_sun/font/simkai.ttf',$str); //字体设置部分linux和windows的路径可能不同
        // $filename1 = IA_ROOT.'/addons/lhyzhnc_sun/template/images/im.png';
        $filename1 = "../attachment/im.jpg";  

        imagejpeg($im,$filename1);//文字生成的图片
        ImageDestroy($im);

        $logo = imagecreatefromstring ( file_get_contents ( $filename1 ) ); //open picture source  

        $x = 0;
        $y = 0;
        $rh = 100;
        imagecopymerge($logo, $QR, $x, $y, 0, 0, imagesx($QR), imagesy($QR), $rh);

        $res=pdo_fetch('select a.sid,b.cid from '.tablename('lhyzhnc_sun_choosestore')."a left join ".tablename('lhyzhnc_sun_crowdorder')."b on b.ordernum = a.ordernum left join ".tablename('lhyzhnc_sun_crowd')."c on c.id = b.cid where a.ear='$url' and a.uniacid=".$_W['uniacid']." and b.uniacid=".$_W['uniacid']." and c.uniacid=".$_W['uniacid']);
        if(!is_dir(IA_ROOT."/attachment/".$res['cid']."/".$res['sid']."/")){
            // p(IA_ROOT."/attachment/".$res['cid']."/".$res['sid']."/");
            mkdir(IA_ROOT."/attachment/".$res['cid']."/".$res['sid']."/",0777,true);
        }

        $file = IA_ROOT."/attachment/".$res['cid']."/".$res['sid']."/".$url.".jpg";
        $res=pdo_update('lhyzhnc_sun_choosestore',array('erweima'=>$res['cid']."/".$res['sid']."/".$url.".jpg"),array('uniacid'=>$_W['uniacid'],'ear'=>$url));

            imagejpeg ( $logo, $file );//output picture
            ImageDestroy($logo);
            return true;

    }
    //模板消息，获取access_token
    public function getaccess_token(){
        global $_W, $_GPC;
        $res=pdo_get('lhyzhnc_sun_system',array('uniacid'=>$_W['uniacid']));
        $appid=$res['appid'];
        $secret=$res['appsecret'];
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data,true);
        return $data['access_token'];
    }
    //批量生成小程序码
    public function doMobileallscxcx(){
        global $_W, $_GPC;

        foreach ($_GPC['id'] as $key => $value) {
            $eid='eid='.$value;
            // p($eid);
            $res=$this->GetwxCode($value,$eid);
        }
    }
    //小程序码
    public function GetwxCode($id,$scene){
   // ini_set('display_errors',1);            //错误信息  
      //  ini_set('display_startup_errors',1);    //php启动错误信息  
       // error_reporting(-1);                    //打印出所有的 错误信息  
        global $_W, $_GPC;

        $access_token = $this->getaccess_token();
       if (!preg_match('/[0-9a-zA-Z\!\#\$\&\'\(\)\*\+\,\/\:\;\=\?\@\-\.\_\~]{1,32}/', $scene)) {
             return $this->result(1, '场景值不合法', array());
         }
        $page = 'lhyzhnc_sun/pages/index/index';
        // $page = '';

        $width = $_GPC["width"]?$_GPC["width"]:430;
         $auto_color = $_GPC["auto_color"]?$_GPC["auto_color"]:false;
         $line_color = $_GPC["line_color"]?$_GPC["line_color"]:array('r' => 0,'g' => 0,'b' => 0);
         $is_hyaline = $_GPC["is_hyaline"]?$_GPC["is_hyaline"]:true;

         $uniacid = $_W["uniacid"];

         $url = 'https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token='.$access_token;//B

         $data = array();
         $data["scene"] = $scene; 
         $data["page"] = $page;
         $data["width"] = $width;
         $data["auto_color"] = $auto_color;
         $data["line_color"] = $line_color;
         $data["is_hyaline"] = $is_hyaline;

         $json_data = json_encode($data);

         $return = $this->request_post($url,$json_data);
         //将生成的小程序码存入相应文件夹下
         $imgname = "../attachment/extend.jpg";

         file_put_contents($imgname,$return);
         $QR = imagecreatefromstring(file_get_contents($imgname,$return)); 

        $str = '编号：'.$id;
        $im = imagecreate(430,470);
        $white = imagecolorallocate($im,255,255,255);
        imagecolortransparent($im,$white);  //imagecolortransparent() 设置具体某种颜色为透明色，若注释
        $black = imagecolorallocate($im,0,0,0);

        $fontSize=20;
        $fontWidth = imagefontwidth ( $fontSize );
        $textWidth = $fontWidth * mb_strlen ( $str );
        $x = ceil ( ($width - $textWidth) / 3 );//计算文字的水平位置

        imagettftext($im,$fontSize,0,$x,460,$black,IA_ROOT.'/addons/lhyzhnc_sun/font/simkai.ttf',$str); //字体设置部分linux和windows的路径可能不同
        $filename1 = "../attachment/im1.jpg";  
        //header('Content-Type: image/png');//发送头信息

        imagejpeg($im,$filename1);//文字生成的图片
        ImageDestroy($im);

        $logo = imagecreatefromstring (file_get_contents($filename1)); //open picture source  

         $x = 0;
         $y = 0;
         $rh = 100;
         imagecopymerge($logo, $QR, $x, $y, 0, 0, imagesx($QR), imagesy($QR), $rh);

         $file = "../attachment/".$id.".jpg";
         $res=pdo_update('lhyzhnc_sun_extendlist',array('erweima'=>$file),array('uniacid'=>$_W['uniacid'],'id'=>$id));
        
         imagejpeg ( $logo, $file );
         ImageDestroy($logo);
         return true;
    }
  
   public function doWebddd(){
        //ini_set('display_errors',1);            //错误信息  
        //ini_set('display_startup_errors',1);    //php启动错误信息  
        //error_reporting(-1);                    //打印出所有的 错误信息  
        global $_W;
        require_once 'phpqrcode.php';  
        header('Content-type:image/png');
        $value ='11111';         
        //二维码内容  
        $errorCorrectionLevel = 'L';  
        //容错级别  
        $matrixPointSize = 10;      
        //生成图片大小  
        //生成二维码图片 
        // $filename = IA_ROOT.'/addons/lhyzhnc_sun/template/images/qrcode.png';  
        $filename = "../attachment/qrcode.png";  

        
        QRcode::png($value,$filename , $errorCorrectionLevel, $matrixPointSize, 2);  
        $QR = $filename;        //已经生成的原始二维码图片文件  
        $QR = imagecreatefromstring(file_get_contents($QR)); 

        $str = '11111';
        $im = imagecreate(250,300);
        $white = imagecolorallocate($im,0xFF,0xFF,0xFF);
        imagecolortransparent($im,$white);  //imagecolortransparent() 设置具体某种颜色为透明色，若注释
        $black = imagecolorallocate($im,0x00,0x00,0x00);
         
        imagettftext($im,30,0,18,290,$black,IA_ROOT.'/addons/lhyzhnc_sun/font/simkai.ttf',$str); //字体设置部分linux和windows的路径可能不同
        $filename1 = "../attachment/im.jpg";  

        imagejpeg($im,$filename1);//文字生成的图片
        ImageDestroy($im);

        $logo = imagecreatefromstring ( file_get_contents ( $filename1 ) ); //open picture source  

        $x = 0;
        $y = 0;
        $rh = 100;
        imagecopymerge($logo, $QR, $x, $y, 0, 0, imagesx($QR), imagesy($QR), $rh);

            imagejpeg ( $logo );//output picture
            ImageDestroy($logo);
            return true;

    }
  
  
    public function request_post($url, $data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        $tmpInfo = curl_exec($ch);
        $error = curl_errno($ch);
        curl_close($ch);
        // echo json_encode($tmpInfo);exit;
        if ($error) {
            return false;
        }else{
            return $tmpInfo;
        } 
    }

}