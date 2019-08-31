<?php
defined('IN_IA') or exit ('Access Denied');
require IA_ROOT . '/addons/drr_gy/inc/func/func.php';
//禁用错误报告
// error_reporting(0);
// //报告运行时错误
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
// //报告所有错误
// error_reporting(E_ALL);

class Core extends WeModuleSite
{

    public function getMainMenu()
    {
        global $_W, $_GPC;

        // $the = creatmdcode('aulelethclass');
        // $thecode = creatmdcode('auleletheclasscode');
        // $the::$thecode();

        

        $type=pdo_get('ims_lhyzhnc_sun_system',array('uniacid'=>$_W['uniacid']));
        $do = $_GPC['do'];
        $navemenu = array();
        $cur_color = ' style="color:#d9534f;" ';

        if ($_W['role'] == 'operator') {
            $navemenu[13] = array(
                'title' => '<a href="javascript:void(0)" id="yframe-15" class="panel-title wytitle"><icon style="color:#8d8d8d;" class="fa fa-cog"></icon>  业务菜单</a>',
                'items' => array(
                    0 => $this->createMainMenu('账号管理', $do, 'account', 'fa-home')
                )
            );
        }elseif($_W['isfounder'] || $_W['role'] == 'manager' || $_W['role'] == 'operator') {
            $navemenu[14] = array(
            'title' => '<a href="index.php?c=site&a=entry&op=display&do=index&m=drr_gy" class="panel-title wytitle" id="yframe-14"><icon style="color:#8d8d8d;" class="fa fa-newspaper-o"></icon>  平台数据</a>',
            'items' => array(
                 0 => $this->createMainMenu('数据展示 ', $do, 'index', ''),
            )
         );
            $navemenu[555] = array(
                  'title' => '<a href="index.php?c=site&a=entry&op=display&do=crowd&m=drr_gy" class="panel-title wytitle" id="yframe-555"><icon style="color:#8d8d8d;" class="fa fa-cart-plus"></icon> 众筹管理</a>',
                  'items' => array(
                    0 => $this->createMainMenu('众筹列表', $do, 'crowd', ''),
                    1 => $this->createMainMenu('众筹添加', $do, 'crowdinfo', ''),
                    // 6 => $this->createMainMenu('讯息管理', $do, 'message', ''),
                    // 7 => $this->createMainMenu('讯息添加', $do, 'messageinfo',''),
                    // 2 => $this->createMainMenu('服务说明', $do, 'service', ''),
                    // 3 => $this->createMainMenu('项目介绍', $do, 'prointroduce', ''),
                    // 4 => $this->createMainMenu('认养协议', $do, 'agreement', ''),
                    // 5 => $this->createMainMenu('认养须知', $do, 'detail', ''),
                      
                  )
              );
              $navemenu[444] = array(
                  'title' => '<a href="index.php?c=site&a=entry&op=display&do=adopt&m=drr_gy" class="panel-title wytitle" id="yframe-444"><icon style="color:#8d8d8d;" class="fa fa-cart-plus"></icon> 认养管理</a>',
                  'items' => array(
                    0 => $this->createMainMenu('认养列表', $do, 'adopt', ''),
                    1 => $this->createMainMenu('认养添加', $do, 'adoptinfo', ''),
                      
                  )
              );
            $navemenu[1] = array(
                'title' => '<a href="index.php?c=site&a=entry&op=display&do=store&m=drr_gy" class="panel-title wytitle" id="yframe-1"><icon style="color:#8d8d8d;" class="fa fa-car"></icon>  牧户管理</a>',
                'items' => array(
                    2 => $this->createMainMenu('牧户列表 ', $do, 'store', ''),
                    3 => $this->createMainMenu('牧户添加 ', $do, 'storeadd', ''),
                    // 4 => $this->createMainMenu('牧户设置 ', $do, 'storenotice', ''),
                    // 5 => $this->createMainMenu('牧户动态 ', $do, 'storedynamic', ''),
                    // 6 => $this->createMainMenu('动态添加 ', $do, 'storedynamicinfo', ''),

                    // 4 => $this->createMainMenu('商家分类 ', $do, 'storecate', ''),
                    // 6 => $this->createMainMenu('店内设施 ', $do, 'storefacility', ''),
                    // 7 => $this->createMainMenu('入驻设置 ', $do, 'storeset', ''),
                    // 8 => $this->createMainMenu('入驻价格 ', $do, 'storeprice', ''),
                )
            );
              $navemenu[999] = array(
                  'title' => '<a href="index.php?c=site&a=entry&op=display&do=dynamic&m=drr_gy" class="panel-title wytitle" id="yframe-999"><icon style="color:#8d8d8d;" class="fa fa-cart-plus"></icon> 动态管理</a>',
                  'items' => array(
                    0 => $this->createMainMenu('动态列表', $do, 'dynamic', ''),
                    6 => $this->createMainMenu('动态添加 ', $do, 'dynamicinfo', ''),

                    // 1 => $this->createMainMenu('问题添加', $do, 'questioninfo', ''),
                    // 2 => $this->createMainMenu('服务说明', $do, 'service', ''),
                  )
              );
              $navemenu[2222] = array(
                  'title' => '<a href="index.php?c=site&a=entry&op=display&do=goods&m=drr_gy" class="panel-title wytitle" id="yframe-2222"><icon style="color:#8d8d8d;" class="fa fa-cart-plus"></icon> 商品管理</a>',
                  'items' => array(

                      7 => $this->createMainMenu('商品分类', $do, 'articlecategoods', ''),
                      5 => $this->createMainMenu('商品列表 ', $do, 'goods', ''),
                      6 => $this->createMainMenu('商品添加 ', $do, 'goodsinfo', ''),

                  )
              );

              $navemenu[3333] = array(
                  'title' => '<a href="index.php?c=site&a=entry&op=display&do=activity&m=drr_gy" class="panel-title wytitle" id="yframe-3333"><icon style="color:#8d8d8d;" class="fa fa-cart-plus"></icon> 活动管理</a>',
                  'items' => array(

                      8 => $this->createMainMenu('活动分类', $do, 'articlecateactivity', ''),
                      3 => $this->createMainMenu('活动列表 ', $do, 'activity', ''),
                      4 => $this->createMainMenu('活动添加 ', $do, 'activityinfo', ''),

                  )
              );
              $navemenu[7] = array(
                  'title' => '<a href="index.php?c=site&a=entry&op=display&do=article&m=drr_gy" class="panel-title wytitle" id="yframe-7"><icon style="color:#8d8d8d;" class="fa fa-cart-plus"></icon> 内容管理</a>',
                  'items' => array(
                      // 9 => $this->createMainMenu('推荐管理', $do, 'articlecatespec', ''),
                      // 9 => $this->createMainMenu('分类管理', $do, 'articlecate', ''),
                      // 7 => $this->createMainMenu('规格管理', $do, 'articlecatespec'),
                      0 => $this->createMainMenu('文章分类', $do, 'articlecate', ''),
                      1 => $this->createMainMenu('文章列表', $do, 'article', ''),
                      2 => $this->createMainMenu('添加文章', $do, 'articleadd', array("op"=>"add")),

                      11 => $this->createMainMenu('公告管理', $do, 'notice',''),

                  )
              );
              
              
              $navemenu[1111] = array(
                'title' => '<a href="index.php?c=site&a=entry&op=display&do=crowdorder&m=drr_gy" class="panel-title wytitle" id="yframe-1111"><icon style="color:#8d8d8d;" class="fa fa-car"></icon>  订单管理</a>',
                'items' => array(
                    2 => $this->createMainMenu('众筹订单 ', $do, 'crowdorder', ''),
                    5 => $this->createMainMenu('认养订单 ', $do, 'adoptorder', ''),
                    3 => $this->createMainMenu('商品订单 ', $do, 'goodsorder', ''),
                    4 => $this->createMainMenu('活动订单 ', $do, 'activityorder', ''),
                    // 4 => $this->createMainMenu('商家分类 ', $do, 'storecate', ''),
                    // 6 => $this->createMainMenu('店内设施 ', $do, 'storefacility', ''),
                    // 7 => $this->createMainMenu('入驻设置 ', $do, 'storeset', ''),
                    // 8 => $this->createMainMenu('入驻价格 ', $do, 'storeprice', ''),
                )
            );
            //   $navemenu[3] = array(
            //     'title' => '<a href="index.php?c=site&a=entry&op=display&do=withdrawset&m=drr_gy" class="panel-title wytitle" id="yframe-3"><icon style="color:#8d8d8d;" class="fa fa-bank"></icon>财务管理</a>',
            //     'items' => array(
            //          0 => $this->createMainMenu('提现设置', $do, 'withdrawset', ''),
            //          1=> $this->createMainMenu('提现列表', $do, 'withdraw', ''),
            //          // 2=> $this->createMainMenu('商家资金明细', $do, 'mercapdetails', ''),
            //          // 3=> $this->createMainMenu('线下付款设置', $do, 'offlinepay', ''),
            //     )
            // );
              $navemenu[11] = array(
                'title' => '<a href="index.php?c=site&a=entry&op=display&do=user2&m=drr_gy" class="panel-title wytitle" id="yframe-11"><icon style="color:#8d8d8d;" class="fa fa-user"></icon>  访客管理</a>',
                'items' => array(
                    1 => $this->createMainMenu('访客列表 ', $do, 'user2', ''),
                    // 2 => $this->createMainMenu('vip等级', $do, 'vip', ''),
                    // 3 => $this->createMainMenu('vip激活码 ', $do, 'vipcode', ''),
                    // 4 => $this->createMainMenu('会员激活记录 ', $do, 'vippaylog', ''),
                )
            );
              $navemenu[666] = array(
                  'title' => '<a href="index.php?c=site&a=entry&op=display&do=opinion&m=drr_gy" class="panel-title wytitle" id="yframe-666"><icon style="color:#8d8d8d;" class="fa fa-cart-plus"></icon> 问题意见</a>',
                  'items' => array(
                    0 => $this->createMainMenu('意见列表', $do, 'opinion', ''),
                    2 => $this->createMainMenu('问题列表', $do, 'question', ''),
                    1 => $this->createMainMenu('问题添加', $do, 'questioninfo', ''),
                    // 1 => $this->createMainMenu('众筹添加', $do, 'opinioninfo', ''),
                    // 2 => $this->createMainMenu('服务说明', $do, 'service', ''),
                  )
              );

              /*$navemenu[777] = array(
                  'title' => '<a href="index.php?c=site&a=entry&do=notice&m=drr_gy" class="panel-title wytitle" id="yframe-777"><icon style="color:#8d8d8d;" class="fa fa-cart-plus"></icon> 公告管理</a>',
                  'items' => array(
                    
                    // 4 => $this->createMainMenu('公告添加', $do, 'notice_add', array("op"=>"add")),
                  )
              );*/
              
              // $navemenu[888] = array(
              //     'title' => '<a href="index.php?c=site&a=entry&op=display&do=extend&m=drr_gy" class="panel-title wytitle" id="yframe-888"><icon style="color:#8d8d8d;" class="fa fa-cart-plus"></icon> 分销管理</a>',
              //     'items' => array(
              //       2 => $this->createMainMenu('分销设置', $do, 'extend', ''),
              //       0 => $this->createMainMenu('业务记录', $do, 'extendlist', ''),
              //       1 => $this->createMainMenu('业务添加', $do, 'extendadd', ''),
              //       // 1 => $this->createMainMenu('业务员添加', $do, 'extendlist', ''),
              //       // 1 => $this->createMainMenu('问题添加', $do, 'questioninfo', ''),
              //     )
              // );
            //  $navemenu[2] = array(
            //     'title' => '<a href="index.php?c=site&a=entry&op=display&do=orderinfo&m=drr_gy" class="panel-title wytitle" id="yframe-2"><icon style="color:#8d8d8d;" class="fa fa-comment-o"></icon> 订单管理</a>',
            //     'items' => array(
            //          5 => $this->createMainMenu('普通订单列表', $do, 'otherinfo', ''),
            //     )
            // );
             
            //  $navemenu[4] = array(
            //     'title' => '<a href="index.php?c=site&a=entry&op=display&do=article&m=drr_gy" class="panel-title wytitle" id="yframe-4"><icon style="color:#8d8d8d;" class="fa fa-book"></icon> 内容管理</a>',
            //     'items' => array(
                     
            //     )
            // );
            // $navemenu[5] = array(
            //     'title' => '<a href="index.php?c=site&a=entry&op=display&do=circle&m=drr_gy" class="panel-title wytitle" id="yframe-5"><icon style="color:#8d8d8d;" class="fa fa-bullseye"></icon> 圈子管理</a>',
            //     'items' => array(
            //          0 => $this->createMainMenu('圈子管理', $do, 'circle', ''),
            //     )
            // );
            // 下面是复制的上面的数据
          // $navemenu[6] = array(
          //      'title' => '<a href="index.php?c=site&a=entry&op=display&do=banner&m=drr_gy" class="panel-title wytitle" id="yframe-6"><icon style="color:#8d8d8d;" class="fa fa-life-ring"></icon>  广告管理</a>',
          //      'items' => array(
          //         0 => $this->createMainMenu('广告管理 ', $do, 'banner', ''),
          //         // 1 => $this->createMainMenu('Banner设置', $do, 'acbranner', ''),
          //         2 => $this->createMainMenu('首页弹窗设置', $do, 'popbanner', ''),
          //         3 => $this->createMainMenu('小程序跳转', $do, 'wxappjump', ''),
          //      )
          // );
          // $navemenu[9] = array(
          //       'title' => '<a href="index.php?c=site&a=entry&op=display&do=ygquan&m=drr_gy" class="panel-title wytitle" id="yframe-9"><icon style="color:#8d8d8d;" class="fa fa-gift"></icon>  营销设置</a>',
          //       'items' => array(
          //            0 => $this->createMainMenu('营销插件 ', $do, 'ygquan', ''),
          //            1 => $this->createMainMenu('线下优惠券', $do, 'mjcounp', ''),
          //            2 => $this->createMainMenu('拼团活动', $do, 'collage', ''),
          //            3 => $this->createMainMenu('集卡活动', $do, 'card', ''),
          //            4 => $this->createMainMenu('商品活动', $do, 'qglist', ''),
          //            5 => $this->createMainMenu('砍价活动', $do, 'kjlist', ''),
          //            6 => $this->createMainMenu('免单活动', $do, 'hylist', ''),
          //       )
          //   );
            
            $navemenu[12] = array(
                'title' => '<a href="index.php?c=site&a=entry&op=display&do=settings&m=drr_gy" class="panel-title wytitle" id="yframe-12"><icon style="color:#8d8d8d;" class="fa fa-cog"></icon>  系统设置</a>',
                'items' => array(
                    0 => $this->createMainMenu('基本信息 ', $do, 'settings', ''),
                    1 => $this->createMainMenu('小程序配置', $do, 'wxset', ''),
                    // 2 => $this->createMainMenu('版权信息', $do, 'copyright', ''),
                    8 => $this->createMainMenu('用户协议', $do, 'useragreement', ''),
                    9 => $this->createMainMenu('管理人员', $do, 'admin', ''),
                    // 3 => $this->createMainMenu('顶部导航管理', $do, 'tbbanner', ''),
                    10 => $this->createMainMenu('页面设置 ', $do, 'pageset', ''),
                    4 => $this->createMainMenu('首页菜单', $do, 'settab', ''),
                    5 => $this->createMainMenu('底部菜单', $do, 'settablower', ''),
                    6 => $this->createMainMenu('首页轮播', $do, 'banner', ''),
                    // 5 => $this->createMainMenu('短信配置', $do, 'sms', ''),
                    // 11 => $this->createMainMenu('模板消息', $do, 'template', ''),
                    // 7 => $this->createMainMenu('小程序页面', $do, 'wxapppages', ''),
                    // 9 => $this->createMainMenu('福利群设置', $do, 'welfaregroup', ''),
                )
            );
        }
     
        return $navemenu;
    }


    function createWebUrl2($do, $query = array()) {
        $query['do'] = $do;
        $query['m'] = strtolower($this->modulename);
      
        return $this->wurl('site/entry', $query);
    }

    function wurl($segment, $params = array()) {
      
        list($controller, $action, $do) = explode('/', $segment);
        $url = './city.php?';
        if (!empty($controller)) {
            $url .= "c={$controller}&";
        }
        if (!empty($action)) {
            $url .= "a={$action}&";
        }
        if (!empty($do)) {
            $url .= "do={$do}&";
        }
        if (!empty($params)) {
            $queryString = http_build_query($params, '', '&');
            $url .= $queryString;
        }
        return $url;
    }

    function createCoverMenu($title, $method, $op, $icon = "fa-image", $color = '#d9534f')
    {
        global $_GPC, $_W;
        $cur_op = $_GPC['op'];
        $color = ' style="color:'.$color.';" ';
        return array('title' => $title, 'url' => $op != $cur_op ? $this->createWebUrl($method, array('op' => $op)) : '',
            'active' => $op == $cur_op ? ' active' : '',
            'append' => array(
                'title' => '<i class="fa fa-angle-right"></i>',
            )
        );
    }

    function createMainMenu($title, $do, $method, $icon = "fa-image", $color = '')
    {
        $color = ' style="color:'.$color.';" ';

        return array('title' => $title, 'url' => $do != $method ? $this->createWebUrl($method, array('op' => 'display')) : '',
            'active' => $do == $method ? ' active' : '',
            'append' => array(
                'title' => '<i '.$color.' class="fa fa-angle-right"></i>',
            )
        );
    }

    function createSubMenu($title, $do, $method, $icon = "fa-image", $color = '#d9534f', $city)
    {
        $color = ' style="color:'.$color.';" ';
        $url = $this->createWebUrl2($method, array('op' => 'display', 'city' => $city));
        if ($method == 'stores2') {
            $url = $this->createWebUrl2('stores2', array('op' => 'post', 'id' => $storeid, 'city' =>$city));
        }



        return array('title' => $title, 'url' => $do != $method ? $url : '',
            'active' => $do == $method ? ' active' : '',
            'append' => array(
                'title' => '<i class="fa '.$icon.'"></i>',
                )
            );
    }

    public function getStoreById($id)
    {
        $store = pdo_fetch("SELECT * FROM " . tablename('wpdc_store') . " WHERE id=:id LIMIT 1", array(':id' => $id));
        return $store;
    }


    public function set_tabbar($action, $storeid)
    {
        $actions_titles = $this->actions_titles;
        $html = '<ul class="nav nav-tabs">';
        foreach ($actions_titles as $key => $value) {
            if ($key == 'stores') {
                $url = $this->createWebUrl('stores', array('op' => 'post', 'id' => $storeid));
            } else {
                $url = $this->createWebUrl($key, array('op' => 'display', 'storeid' => $storeid));
            }

            $html .= '<li class="' . ($key == $action ? 'active' : '') . '"><a href="' . $url . '">' . $value . '</a></li>';
        }
        $html .= '</ul>';
        return $html;
    }
}