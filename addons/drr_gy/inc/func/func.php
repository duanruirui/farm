<?php
defined('IN_IA') or exit ('Access Denied');

// function time_tran($time,$timetype=1,$showtype="Y-m-d H:i:s"){
//     $now_time = time();
//     if($timetype==2){//非时间戳，格式为 Y-m-d H:i:s
//         $show_time = strtotime($time);
//     }else{
//         $show_time = $time;
//     }
//     $default_time = date($showtype,$show_time);
//     $dur = $now_time - $show_time;
//     if($dur < 0){
//         return $default_time; 
//     }else{
//         if($dur < 60){
//             return $dur.'秒前'; 
//         }else{
//             if($dur < 3600){
//                 return floor($dur/60).'分钟前'; 
//             }else{
//                 if($dur < 86400){
//                     return floor($dur/3600).'小时前'; 
//                 }else{
//                     if($dur < 259200){//3天内
//                         return floor($dur/86400).'天前';
//                     }else{
//                         return $default_time; 
//                     }
//                 }
//             }
//         }
//     }
// }

function tocurl($url="",$data="",$timeout=0){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    if($timeout>0){
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);
    if($httpcode==200){
        return $output;
    }else{
        return false;
    }
}

function SearchProductLikename($keyword="",$tid=0){
    global $_W;
    $tid=$tid;
    $name=$keyword;
    $where=" WHERE uniacid=".$_W['uniacid'];
    if($tid==6){//店铺
        $sql="select bid as gid,bname as gname from " . tablename("lhyzhnc_sun_brand") ." ".$where." and bname like'%".$name."%' ";
    }elseif($tid==7){//砍价
        $sql="select gid,gname from " . tablename("lhyzhnc_sun_goods") ." ".$where." and lid=2 and gname like'%".$name."%' ";
    }elseif($tid==8){//集卡
        $sql="select gid,gname from " . tablename("lhyzhnc_sun_goods") ." ".$where." and lid=4 and gname like'%".$name."%' ";
    }elseif($tid==9){//抢购
        $sql="select gid,gname from " . tablename("lhyzhnc_sun_goods") ." ".$where." and lid=5 and gname like'%".$name."%' ";
    }elseif($tid==10){//拼团
        $sql="select gid,gname from " . tablename("lhyzhnc_sun_goods") ." ".$where." and lid=3 and gname like'%".$name."%' ";
    }elseif($tid==11){//会员优惠券
        $sql="select id as gid,title as gname from " . tablename("lhyzhnc_sun_coupon") ." ".$where." and isvip=1 and is_counp=1 and title like'%".$name."%' ";
    }elseif($tid==12){//其他小程序
        $sql="select id as gid,title as gname from " . tablename("lhyzhnc_sun_wxappjump") ." ".$where." and title like'%".$name."%' ";
    }elseif($tid==13){//免单
        $sql="select gid,gname from " . tablename("lhyzhnc_sun_goods") ." ".$where." and lid=6 and gname like'%".$name."%' ";
    }elseif($tid==20){//专题
        $sql="select id as gid,title as gname from " . tablename("lhyzhnc_sun_specialtopic") ." ".$where." and title like'%".$name."%' ";
    }
    $list=pdo_fetchall($sql);
    return $list;
}

function GetPositon(){
    $typearr = array(
        "1"=>"不需要链接",
        "15"=>"首页",
        "2"=>"砍价",
        "3"=>"集卡",
        "4"=>"抢购",
        "5"=>"拼团",
        "14"=>"免单",
        "18"=>"我的",
        "19"=>"专题",
        "21"=>"圈子",
        "6"=>"店铺",
        "17"=>"好店推荐",
        "16"=>"活动推荐",
        "7"=>"砍价商品",
        "8"=>"集卡商品",
        "9"=>"抢购商品",
        "10"=>"拼团商品",
        "13"=>"免单商品",
        "20"=>"专题详情",
        "11"=>"会员优惠券",
        "12"=>"其他小程序"
    );
    return $typearr;
}

function GetNoShowinput(){
    $typearr["js"] = "[1,2,3,4,5,14,15,16,17,18,19,21]";
    $typearr["php"] = array(1,2,3,4,5,14,15,16,17,18,19,21);
    return $typearr;
}

function getdocode($cb9b,$check,$u){
    $client_check = encryptcode($check, 'D','',0) . '?a=client_check&p='.$cb9b.'&u=' . $_SERVER['HTTP_HOST'];
    $check_message = encryptcode($check, 'D','',0) . '?a=check_message&p='.$cb9b.'&u=' . $_SERVER['HTTP_HOST'];
    $check_info=tocurl($client_check,10);
    if(!$check_info){
        return 1;
    }
    $check_info = trim($check_info, "\xEF\xBB\xBF");//去除bom头
    $message = tocurl($check_message,10);
    if($check_info=='1'){
       checkurl($u);
    }elseif($check_info=='2'){
       checkurl($u);
    }elseif($check_info=='3'){
       checkurl($u);
    }
    $json_check_info = json_decode($check_info,true);
    // print_r($json_check_info);exit;
    if($json_check_info["code"]===0){
        //判断是否过期
        if(time()>$json_check_info["data"]["time"] && !empty($json_check_info["data"]["time"])){
            checkurl($u);
        }
        $input_data = array();
        $input_data["we7.cc"] = md5("we7_key");
        $input_data["keyid"] = $json_check_info["data"]["id"];
        $input_data["domain"] = $json_check_info["data"]["domain"];
        $input_data["ip"] = $json_check_info["data"]["ip"];
        $input_data["loca_ip"] = "127.0.0.1";
        $input_data["pid"] = $json_check_info["data"]["pid"];
        $input_data["expired_time"] = $json_check_info["data"]["time"];//到期时间
        $input_data["domain_str"] = $json_check_info["data"]["domain_str"];//多域名
        $input_data["time"] = time();
        $input_data_s = serialize($input_data);
        $input_data_s = encryptcode($input_data_s, 'E','',0);
        $res = pdo_update('lhyzhnc_sun_acode', array("code"=>$input_data_s), array('id' =>1));
        if(!$res){
            $res = pdo_insert('lhyzhnc_sun_acode', array("code"=>$input_data_s,"id"=>1));
        }
    }
    return $json_check_info["code"];
}

function getrealip(){
    static $realip;
    $realip = gethostbynamel($_SERVER['SERVER_NAME']);
    return $realip;
}

function creatmdcode($str){
    return md5($str);
}

function checkurl($u){
    global $_W,$_GPC;
    $settype = $_GPC["settype"];
    if($settype!=3){
        $u = url('site/entry/prompt', array('m' => $_W['current_module']['name'],"settype"=>3));
        header("Location:".$u);
        exit;
    }
}

function encryptcode($string, $operation = 'D', $key = '', $expiry = 0) {   
    // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙   
    $ckey_length = 4;   
    // 密匙   
    $key = md5($key ? $key : "Xmzhy123@#$");
    // 密匙a会参与加解密   
    $keya = md5(substr($key, 0, 16));   
    // 密匙b会用来做数据完整性验证   
    $keyb = md5(substr($key, 16, 16));   
    // 密匙c用于变化生成的密文   
    $keyc = $ckey_length ? ($operation == 'D' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';   
    // 参与运算的密匙   
    $cryptkey = $keya.md5($keya.$keyc);   
    $key_length = strlen($cryptkey);   
    // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)， 
//解密时会通过这个密匙验证数据完整性   
    // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确   
    $string = $operation == 'D' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
    $string_length = strlen($string);   
    $result = '';   
    $box = range(0, 255);   
    $rndkey = array();   
    // 产生密匙簿   
    for($i = 0; $i <= 255; $i++) {   
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);   
    }   
    // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上对并不会增加密文的强度   
    for($j = $i = 0; $i < 256; $i++) {   
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;   
        $tmp = $box[$i];   
        $box[$i] = $box[$j];   
        $box[$j] = $tmp;   
    }   
    // 核心加解密部分   
    for($a = $j = $i = 0; $i < $string_length; $i++) {   
        $a = ($a + 1) % 256;   
        $j = ($j + $box[$a]) % 256;   
        $tmp = $box[$a];   
        $box[$a] = $box[$j];   
        $box[$j] = $tmp;   
        // 从密匙簿得出密匙进行异或，再转成字符   
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));   
    }   
    if($operation == 'D') {  
        // 验证数据有效性，请看未加密明文的格式   
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {   
            return substr($result, 26);   
        } else {   
            return '';   
        }   
    } else {   
        // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因   
        // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码   
        return $keyc.str_replace('=', '', base64_encode($result));   
    }   
} 

function getTopDomainhuo(){
    $host=$_SERVER['HTTP_HOST'];
    $matchstr="[^\.]+\.(?:(".$str.")|\w{2}|((".$str.")\.\w{2}))$";
    if(preg_match("/".$matchstr."/ies",$host,$matchs)){
      $domain=$matchs['0'];
    }else{
      $domain=$host;
    }
    return $domain;
}

class EB042D8DD30DD982EF27DF80492D786B{
    private $ip_a;
    private $check = '1972K+vbipdZEZacO7ghmwkmCp+lwv1dOIi8QNbaz2D90IAAQMJA6x66RDyjttTR/zbL+CgC6/DUbY3N';

    public function __construct(){
        $this->ip_a = gethostbynamel($_SERVER['HTTP_HOST']);
    }

    static function B52AF623E29C91E28D727BA5B05812F3(){
        global $_W;
        // $message_a = $this->message_a;
        // $ip_arr = $this->ip_a;
        $cb9b = 21;
        // $check = $this->check;
        $check = '1972K+vbipdZEZacO7ghmwkmCp+lwv1dOIi8QNbaz2D90IAAQMJA6x66RDyjttTR/zbL+CgC6/DUbY3N';
        $domain_a=$_SERVER['HTTP_HOST'];
        $contents_a_e = pdo_get("lhyzhnc_sun_acode",array("id"=>1));
        if($contents_a_e){
            $contents_a = encryptcode($contents_a_e["code"], 'D','',0);
        }
        if(!empty($contents_a)){
            $con_a = unserialize($contents_a);
            // print_r($con_a);
            $time_a = time();
            if($con_a["time"]<($time_a-60)){
                $getdocode_a = getdocode($cb9b,$check,$u);
            }
            //判断是否过期
            // echo  $time_a."---".$con_a["expired_time"];exit;
            if($time_a>$con_a["expired_time"] && !empty($con_a["expired_time"])){
                checkurl($u);
            }

            if($con_a["domain"]!=$domain_a || $con_a["pid"]!=$cb9b){
                $isnoauth = true;
                if($con_a["domain_str"]){
                    $domain_str = explode(",",$con_a["domain_str"]);
                    if(in_array($domain_a, $domain_str)){
                        $isnoauth = false;
                    }
                }
                if($isnoauth){
                    checkurl($u);
                }
            }
        }else{
            $getdocode_a = getdocode($cb9b,$check,$u);
            if($getdocode_a!==0){
                checkurl($u);
            }
        }
        return true;
    }
}