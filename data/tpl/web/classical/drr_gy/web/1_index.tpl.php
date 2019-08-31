<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
    .navback{display: none;}
    .yg_back{margin-left: 170px;}
    .yg9_content{padding:0px;}
    .yg9_content>li>.col-md-12{
        height: 130px;
        box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
        border-radius: 6px;
        overflow: hidden;
    }    
    .yg9_content>li:nth-child(1)>.col-md-12{
        background-color: #32CC7F;
        color: white;
        /*background:url(../addons/lhyzhnc_sun/template/images/tuceng4.png) no-repeat center;
        background-size: 100%;*/
    }
    .yg9_content>li:nth-child(2)>.col-md-12{
        background-color: #f17c67;
        color: white;
    }
    .yg9_content>li:nth-child(3)>.col-md-12{
        background-color: #99CC33;
        color: white;
    }
    .yg9_content>li:nth-child(4)>.col-md-12{
        background-color: #6C6FBF;
        color: #fff;
    }
    .yg9_content>li:nth-child(5)>.col-md-12{
        background-color: #a958b9;
        color: #fff;
    }
    .tmoney{font-size: 26px;margin-top: 30px;text-align: center;}
    .today{font-size: 14px;text-align: center;}
    .vipbanner{padding:0px;}
    .vipbox{
        background-color: white;
        box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
        border-radius: 6px;
        overflow: hidden;
    }
    .vipbig1{padding-left: 0px;} 
    .vipbig2{padding-right: 0px;}
    .vipcontent{
        border-bottom: 1px solid #E4EAEC;
        height: 60px;
        line-height: 60px;
        padding:0px;
    }  
    .vipright{float: right;}
    .vipleft{float: left;}
    .vipleft>img{
        width: 20px;
        height: 20px;
    }
    .vipadd{
        height: 210px;
        text-align: center;
    }
    .vipadd>li{
        padding-top: 50px;
    }
    .font1{font-size: 30px;color: #333;}
    .font2{font-size: 15px;color: #666;margin-top: 15px;}
    .vipsell{padding:0px;}
    .vipsell>li:nth-child(1){padding-left: 0px;}
    .vipsell>li:nth-child(2){padding-right: 0px;}
    .vipsell{
        height: 210px;
        padding: 25px 0px;
    }
    .vipsell>li{height: 100%;}
    .vipsell>li>div{
        background-color: #F7F7F7;
        height: 100%;
        border-radius: 6px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .xuni{color: #666;text-align: center;}
    .xuni>span{color: #ff6363;}
    .viptitle{
        color: #333;
        border-bottom:1px solid #DEDEDE;
        padding-bottom: 15px;
        margin-bottom: 20px;
        text-align: center;
        width: 50%;
        font-size: 16px;
    }
    .botul{
        display: flex;
    }
    .botul>li{
        width: 13%;
        margin-right: 1.5%;
        height: 220px;
        background-color: white;
        padding: 50px 0px;
    }
    .botul>li:last-child{
        margin-right:0px;
        box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
    }
    .boxcon{
        width: 100%;
        height: 100%;
        text-align: center;
    }
    .boxcon>img{
        margin-bottom: 10px;
        width: 55px;
        height: 55px;
    }
    .bfont1{
        color: #666;
        font-size: 15px;
        margin-bottom: 5px;
    }
    .bfont2{
        color: #ED5D5D;
        font-size: 20px;
    }
    .backimg{
        width: 71px;
        height: 74px;
        margin-top: 30px;
    }
</style>

 <div class="main" style="height: 270px;">
    <div class="col-md-12 vipbanner">
        <div class="col-md-6 vipbig1">
            <div class="col-md-12 vipbox">
                <div class="col-md-12 vipcontent">
                    <div class="vipleft">
                        <img src="../addons/lhyzhnc_sun/template/images/ygrz.png">
                        <span>会员信息</span>
                    </div>
                    <div class="vipright">(单位：人)</div>
                </div>
                <ul class="col-md-12 vipadd">
                    <li class="col-md-3">
                        <p class="font1"><?php  echo $jir;?></p>
                        <p class="font2">今日新增</p>
                    </li>
                    <li class="col-md-3">
                        <p class="font1"><?php  echo $zuor;?></p>
                        <p class="font2">昨日新增</p>
                    </li>
                    <li class="col-md-3">
                        <p class="font1"><?php  echo $beny;?></p>
                        <p class="font2">本月新增</p>
                    </li>
                    <li class="col-md-3">
                        <p class="font1"><?php  echo $totalhy['count'];?></p>
                        <p class="font2">会员总数</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 vipbig2">
            <div class="col-md-12 vipbox">
                <div class="col-md-12 vipcontent">
                    <div class="vipleft">
                        <img src="../addons/lhyzhnc_sun/template/images/6.png">
                        <span>产品订单一览</span>
                    </div>
                    <div class="vipright">(单位：件)</div>
                </div>
                <ul class="col-md-12 vipsell">
                    <!-- <li class="col-md-6">
                        <div>
                            <div class="viptitle">商品</div>
                            <div class="col-md-12">
                                <div class="col-md-6 xuni">新增：<span><?php  echo $jrgoods;?></span></div>
                                <div class="col-md-6 xuni">总数：<span><?php  echo $goodstotal['count'];?></span></div>
                            </div>
                        </div>
                    </li> -->
                    <li class="col-md-12">
                        <div>
                            <div class="viptitle">产品订单</div>
                            <div class="col-md-12">
                                <div class="col-md-2 xuni">今日：<span><?php  echo $day_order;?></span></div>
                                <div class="col-md-2 xuni">昨日：<span><?php  echo $yesterday_order;?></span></div>
                                <div class="col-md-2 xuni">本月：<span><?php  echo $thismonth_order;?></span></div>
                                <div class="col-md-2 xuni">上月：<span><?php  echo $lastmonth_order;?></span></div>
                                <div class="col-md-2 xuni">今年：<span><?php  echo $thisyear_order;?></span></div>
                                <div class="col-md-2 xuni">去年：<span><?php  echo $lastyear_order;?></span></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main" style="height: 270px;">
    <div class="col-md-12 vipbanner">
        <div class="col-md-6 vipbig1">
            <div class="col-md-12 vipbox">
                <div class="col-md-12 vipcontent">
                    <div class="vipleft">
                        <img src="../addons/lhyzhnc_sun/template/images/6.png">
                        <span>活动订单一览</span>
                    </div>
                    <div class="vipright">(单位：次)</div>
                </div>
                <ul class="col-md-12 vipsell">

                    <li class="col-md-12">
                        <div>
                            <div class="viptitle">活动订单</div>
                            <div class="col-md-12">
                                <div class="col-md-2 xuni">今日：<span><?php  echo $day_order1;?></span></div>
                                <div class="col-md-2 xuni">昨日：<span><?php  echo $yesterday_order1;?></span></div>
                                <div class="col-md-2 xuni">本月：<span><?php  echo $thismonth_order1;?></span></div>
                                <div class="col-md-2 xuni">上月：<span><?php  echo $lastmonth_order1;?></span></div>
                                <div class="col-md-2 xuni">今年：<span><?php  echo $thisyear_order1;?></span></div>
                                <div class="col-md-2 xuni">去年：<span><?php  echo $lastyear_order1;?></span></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 vipbig2">
            <div class="col-md-12 vipbox">
                <div class="col-md-12 vipcontent">
                    <div class="vipleft">
                        <img src="../addons/lhyzhnc_sun/template/images/6.png">
                        <span>众筹订单一览</span>
                    </div>
                    <div class="vipright">(单位：件)</div>
                </div>
                <ul class="col-md-12 vipsell">
                    <li class="col-md-12">
                        <div>
                            <div class="viptitle">众筹订单</div>
                            <div class="col-md-12">
                                <div class="col-md-2 xuni">今日：<span><?php  echo $day_order2;?></span></div>
                                <div class="col-md-2 xuni">昨日：<span><?php  echo $yesterday_order2;?></span></div>
                                <div class="col-md-2 xuni">本月：<span><?php  echo $thismonth_order2;?></span></div>
                                <div class="col-md-2 xuni">上月：<span><?php  echo $lastmonth_order2;?></span></div>
                                <div class="col-md-2 xuni">今年：<span><?php  echo $thisyear_order2;?></span></div>
                                <div class="col-md-2 xuni">去年：<span><?php  echo $lastyear_order2;?></span></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<div class="main" >
    <div class="col-md-12 vipbanner">
        <div class="col-md-6 vipbig1">
            <div class="col-md-12 vipbox">
                <div class="col-md-12 vipcontent">
                    <div class="vipleft">
                        <img src="../addons/lhyzhnc_sun/template/images/6.png">
                        <span>认养订单一览</span>
                    </div>
                    <div class="vipright">(单位：件)</div>
                </div>
                <ul class="col-md-12 vipsell">

                    <li class="col-md-12">
                        <div>
                            <div class="viptitle">认养订单</div>
                            <div class="col-md-12">
                                <div class="col-md-2 xuni">今日：<span><?php  echo $day_order3;?></span></div>
                                <div class="col-md-2 xuni">昨日：<span><?php  echo $yesterday_order3;?></span></div>
                                <div class="col-md-2 xuni">本月：<span><?php  echo $thismonth_order3;?></span></div>
                                <div class="col-md-2 xuni">上月：<span><?php  echo $lastmonth_order3;?></span></div>
                                <div class="col-md-2 xuni">今年：<span><?php  echo $thisyear_order3;?></span></div>
                                <div class="col-md-2 xuni">去年：<span><?php  echo $lastyear_order3;?></span></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(function(){
        // $("#frame-14").show();
        $("#yframe-14").addClass("wyactive");
    })
</script>