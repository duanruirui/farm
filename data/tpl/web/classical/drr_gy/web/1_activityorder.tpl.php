<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
  <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li  <?php  if($type=='all') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('activityorder',array('type'=>all));?>">全部订单</a></li>
    <li  <?php  if($type=='waitpay') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('activityorder',array('type'=>waitpay,'status'=>0,'refund'=>$refund,'istui'=>$istui));?>">待支付</a></li>
    <li   <?php  if($type=='wait') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('activityorder',array('type'=>wait,'status'=>1,'refund'=>$refund,'istui'=>$istui));?>">待核销</a></li>
    <li   <?php  if($type=='yes') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('activityorder',array('type'=>yes,'status'=>2,'refund'=>$refund,'istui'=>$istui));?>">已核销</a></li>
    <li   <?php  if($type=='cancel') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('activityorder',array('type'=>cancel,'status'=>3,'refund'=>$refund,'istui'=>$istui));?>">已取消</a></li>
    <li   <?php  if($type=='refundyes') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('activityorder',array('type'=>refundyes,'status'=>4,'refund'=>$refund,'istui'=>$istui));?>">退款成功</a></li>
    <span class="ygxian"></span>
    <div class="ygdangq">退款处理:</div>
    <li   <?php  if($refund=='refund') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('activityorder',array('refund'=>refund,'istui'=>1,'type'=>$type,'status'=>$status));?>">未处理</a></li>
    <!-- <li   <?php  if($refund=='refundyes') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('activityorder',array('refund'=>refundyes,'istui'=>2,'type'=>$type,'status'=>$status));?>">退款成功</a></li> -->
    <li   <?php  if($refund=='refundno') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('activityorder',array('refund'=>refundno,'istui'=>3,'type'=>$type,'status'=>$status));?>">退款失败</a></li>
  <!-- <?php  if(is_array($activitytype)) { foreach($activitytype as $row) { ?>
    <li  <?php  if($type==$row['name']) { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('activityorder',array('type'=>$row['name'],'typeid'=>$row['id']));?>"><?php  echo $row['name'];?></a></li>
  <?php  } } ?> -->
</ul>

  <div class="row ygrow">
      <div class="col-lg-12">
          <form action="" method="get" class="col-lg-4">
          <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="drr_gy" />
            <input type="hidden" name="do" value="activityorder" />
              <div class="input-group" style="width: 350px">
                  <input type="text" name="keywords" class="form-control" placeholder="请输入买家姓名" value="<?php  echo $op;?>">
                  <span class="input-group-btn">
                     <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                  </span>
              </div>
              <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
          </form>

      </div>    
  </div>
  <div class="row ygrow">
      <div class="col-lg-12">
          <form action="" method="get" class="col-lg-4">
          <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="drr_gy" />
            <input type="hidden" name="do" value="activityorder" />
              <div class="input-group" style="width: 350px">
                  <input type="text" name="active" class="form-control" placeholder="请输入活动名称" value="<?php  echo $active;?>">
                  <span class="input-group-btn">
                     <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                  </span>
              </div>
              <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
          </form>

      </div>    
  </div>
<div class="main">
    <div class="panel panel-default">
      <div class="panel-heading">全部订单</div>
        <div class="table-responsive">
          <table class="col-md-12">
              <tr class="yg5_tr1">
                <th class="store_td1 col-md-1">订单号</th>
                <th class="col-md-1">用户</th>
                <th class="col-md-1">电话</th>
                <th class="col-md-1">地址</th>
                <th class="col-md-1">时间</th>
                <th class="col-md-1">活动</th>
                <th class="col-md-1">人数</th>
                <th class="col-md-1">价格</th>
                <!-- <th class="col-md-1">剩余次数</th> -->
                <!-- <th class="col-md-1">餐劵价格</th> -->
                <th class="col-md-1">状态</th>
               
                  <th class="col-md-2">操作</th>
              </tr>
              <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
              <tr class="yg5_tr2">
                <td>
                <?php  echo $item['ordernum'];?>
                </td>
                <td>
                <?php  echo $item['uname'];?>
                </td>
                <td>
                <?php  echo $item['phone'];?>
                </td>
                <td>
                <?php  echo $item['addr'];?>
                </td>
                <td>
                <?php  echo $item['time'];?>
                </td>
                 <td >
                  <?php  echo $item['acname'];?>
                </td>
                <td >
                  <?php  echo $item['num'];?>
                </td>
                <td >
                  <?php  echo $item['price'];?>
                </td>
                <td >
                  <?php  if($item['status']==1) { ?>
                      <span class="label storegrey">待核销</span>
                  <?php  } else if($item['status']==2) { ?>
                      <span class="label storeblue">已核销</span>
                  <?php  } else if($item['status']==3) { ?>
                      <span class="label storeblue">已取消</span>
                  <?php  } else if($item['status']==0) { ?>
                      <span class="label storeblue">待支付</span>
                  <?php  } ?>
                  <?php  if($item['istui']==2) { ?>
                      <span class="label storegrey">退款成功</span>
                  <?php  } else if($item['istui']==3) { ?>
                      <span class="label storeblue">退款失败</span>
                  <?php  } else if($item['istui']==1) { ?>
                      <span class="label storeblue">退款申请中</span>
                  <?php  } ?>
                </td>
                <td>
                  
                  <?php  if($item['istui']==1) { ?>
                    <a href="<?php  echo $this->createWebUrl('activityorder', array('op'=>refund,'id'=>$item['id'],'refund'=>2))?>"><button class="btn btn-xs storeblue">通过退款申请</button></a>
                    <a href="<?php  echo $this->createWebUrl('activityorder', array('op'=>refund,'id'=>$item['id'],'refund'=>3))?>"><button class="btn btn-xs storeblue">拒绝退款申请</button></a>
                  <?php  } ?>
                  <a href="javascript:void(0);"  data-toggle="modal" data-target="#myModal2<?php  echo $item['id'];?>"><button class="btn storeblue btn-xs">修改地址</button></a>

                  <a class="storespan btn btn-xs" href="<?php  echo $this->createWebUrl('activityorder', array('id'=>$item['id'],'op'=>'delete'))?>" onclick="return confirm('确认删除吗？');return false;">
                      <span class="fa fa-trash-o"></span>
                      <span class="bianji">删除
                          <span class="arrowdown"></span>
                      </span>
                  </a>
                </td>
              </tr>
              <div class="modal fade" id="myModal2<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">修改订单地址</h4>
                              </div>
                              <form action="" method="get" >
                                  <input type="hidden" name="c" value="site" />
                                  <input type="hidden" name="a" value="entry" />
                                  <input type="hidden" name="m" value="drr_gy" />
                                  <input type="hidden" name="do" value="activityorder" />
                                  <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
                                  <input type="hidden" name="op" value="addr" />
                                  <div class="modal-body" style="font-size: 20px">
                                        <label  control-label">用户名称</label>
                                        <input type="text" name="uname" value="<?php  echo $item['uname'];?>"  class="form-control"  placeholder='请输入用户的名称'"/>
                                        <label  control-label">用户电话</label>
                                        <input type="text" name="phone" value="<?php  echo $item['phone'];?>"  class="form-control"  placeholder='请输入用户的电话'"/>
                                        <label  control-label">用户地址</label>
                                        <input type="text" name="addr" value="<?php  echo $item['addr'];?>"  class="form-control"  placeholder='请输入用户的地址'"/>
                                  </div>
                                  <!-- <div class="modal-body" style="font-size: 20px">
                                        
                                  </div> -->
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                      <input type="submit" class="btn btn-info" name="submit" value="确定"/>
                                  </div>
                                  <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
                              </form>
                            </div>
                          </div>
                      </div>
              <?php  } } ?>
             
                <?php  if(empty($list)) { ?>
               <tr>
                  <td colspan="12" style="padding: 10px 30px;">
                    暂无订单信息
                  </td>
                </tr>
             
              <?php  } ?>
          </table>
        </div>
    </div>
</div>
<div class="text-right we7-margin-top"><?php  echo $pager;?></div>
<script type="text/javascript">
    $(function(){
        $("#frame-1111").show();
        $("#yframe-1111").addClass("wyactive");
    })
</script>