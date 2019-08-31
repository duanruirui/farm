<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/lhyzhnc_sun/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
  <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li  <?php  if($type=='all') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('type'=>all));?>">全部订单</a></li>
    <li   <?php  if($type=='waitpay') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('type'=>waitpay,'status'=>1,'state'=>$state,'stateid'=>$stateid,'refund'=>$refund,'istui'=>$istui));?>">待支付</a></li>
    <!-- <li   <?php  if($type=='wait') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('type'=>wait,'status'=>1,'state'=>$state,'stateid'=>$stateid,'refund'=>$refund,'istui'=>$istui));?>">待选牧户</a></li> -->
    <li   <?php  if($type=='yes') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('type'=>yes,'status'=>2,'state'=>$state,'stateid'=>$stateid,'refund'=>$refund,'istui'=>$istui));?>">已支付</a></li>
    <li   <?php  if($type=='no') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('type'=>no,'status'=>3,'state'=>$state,'stateid'=>$stateid,'refund'=>$refund,'istui'=>$istui));?>">已发货</a></li>
    <li   <?php  if($type=='end') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('type'=>end,'status'=>4,'state'=>$state,'stateid'=>$stateid,'refund'=>$refund,'istui'=>$istui));?>">已完成</a></li>
    <li   <?php  if($type=='cancel') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('type'=>cancel,'status'=>5,'state'=>$state,'stateid'=>$stateid,'refund'=>$refund,'istui'=>$istui));?>">已取消</a></li>
    <li   <?php  if($type=='refundyes') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('type'=>refundyes,'status'=>6,'state'=>$state,'stateid'=>$stateid,'refund'=>$refund,'istui'=>$istui));?>">退款成功</a></li>
    <!-- <li   <?php  if($type=='refundno') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('type'=>refundno,'status'=>7,'state'=>$state,'stateid'=>$stateid,'refund'=>$refund,'istui'=>$istui));?>">退款失败</a></li> -->
    <span class="ygxian"></span>
    <div class="ygdangq">退款处理:</div>
    <li   <?php  if($refund=='refund') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('refund'=>refund,'istui'=>1,'state'=>$state,'stateid'=>$stateid,'type'=>$type,'status'=>$status));?>">未处理</a></li>
    <!-- <li   <?php  if($refund=='refundyes') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('refund'=>refundyes,'istui'=>2,'state'=>$state,'stateid'=>$stateid,'type'=>$type,'status'=>$status));?>">退款成功</a></li> -->
    <li   <?php  if($refund=='refundno') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('refund'=>refundno,'istui'=>3,'state'=>$state,'stateid'=>$stateid,'type'=>$type,'status'=>$status));?>">退款失败</a></li>
</ul>

<!-- <ul class="nav nav-tabs">
  <span class="ygxian"></span>
  <div class="ygdangq">众筹项目:</div>
  
  <?php  if(is_array($crowd)) { foreach($crowd as $row) { ?>
    <li  <?php  if($state==$row['id']) { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('crowdorder',array('state'=>$row['id'],'stateid'=>$row['id'],'type'=>$type,'status'=>$status,'refund'=>$refund,'istui'=>$istui));?>"><?php  echo $row['name'];?></a></li>
  <?php  } } ?>
</ul> -->


  <div class="row ygrow">
      <div class="col-lg-12">
          <form action="" method="get" class="col-lg-4">
          <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="lhyzhnc_sun" />
            <input type="hidden" name="do" value="crowdorder" />
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
            <input type="hidden" name="m" value="lhyzhnc_sun" />
            <input type="hidden" name="do" value="crowdorder" />
              <div class="input-group" style="width: 350px">
                  <input type="text" name="phone" class="form-control" placeholder="请输入买家手机号" value="<?php  echo $phone;?>">
                  <span class="input-group-btn">
                     <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                  </span>
              </div>
              <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
          </form>
      </div>    
  </div>
  <!-- <div class="row ygrow">
      <div class="col-lg-12">
          <form action="" method="get" class="col-lg-4">
          <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="lhyzhnc_sun" />
            <input type="hidden" name="do" value="crowdorder" />
              <div class="input-group" style="width: 350px">
                  <input type="text" name="ear" class="form-control" placeholder="请输入耳标号" value="<?php  echo $ear;?>">
                  <span class="input-group-btn">
                     <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                  </span>
              </div>
              <div>搜索示例：YG-123456 ,请输入 YG-123456 </div>
              <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
          </form>
      </div>    
  </div> -->
  <div class="row ygrow">
      <div class="col-lg-12">
          <form action="" method="get" class="col-lg-4">
          <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="lhyzhnc_sun" />
            <input type="hidden" name="do" value="crowdorder" />
              <div class="input-group" style="width: 350px">
                  <input type="text" name="active" class="form-control" placeholder="请输入众筹名称" value="<?php  echo $active;?>">
                  <span class="input-group-btn">
                     <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                  </span>
              </div>
              <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
          </form>

      </div>    
  </div>
<div class="main">
    <!-- <form action="<?php  echo $_W['siteroot'];?>/app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=alldownloadear&m=lhyzhnc_sun" method='post' id='downloadform1'> -->
    
    <!-- <div class="panel panel-default">
        <div class="panel-body ygbtn eygbtn">
            <button class="btn ygyouhui2" style='width: 110px;' id="alldownload">批量下载</button>
        </div>        
    </div> -->
    <div class="panel panel-default">
      <div class="panel-heading">全部订单</div>
        <div class="table-responsive">
          <table class="col-md-12">
              <tr class="yg5_tr1">
                <!-- <td class="store_td1 col-md-1" style="text-align: center;">
                    <input type="checkbox" class="allcheck" />
                    <span class="store_inp">全选</span>
                </td> -->
                <th class="store_td1 col-md-1">订单号</th>
                <th class="col-md-1">用户</th>
                <th class="col-md-1">电话</th>
                <th class="col-md-1">地址</th>
                <th class="col-md-1">时间</th>
                <th class="col-md-1">众筹名称</th>
                <th class="col-md-1">数量</th>
                <th class="col-md-1">价格</th>
                <th class="col-md-1">快递方式</th>
                <th class="col-md-1">快递单号</th>
                <th class="col-md-1">状态</th>
               
                <th class="col-md-2">操作</th>
              </tr>
              <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
              <tr class="yg5_tr2">
                <!-- <td>
                    <input type="checkbox" name="test" value="<?php  echo $item['ordernum'];?>">
                </td> -->
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
                <?php  echo $item['name'];?>
                </td>
                <td >
                  <?php  echo $item['num'];?>
                </td>
                <td >
                  <?php  echo $item['price'];?>
                </td>
                <td >
                  <?php  echo $item['way'];?>
                </td>
                <td >
                  <?php  echo $item['waybill'];?>
                </td>
                <td >
                  <?php  if($item['status']==1) { ?>
                      <span class="label storeblue">待支付</span>
                  <?php  } else if($item['status']==2) { ?>
                      <span class="label storeblue">已支付</span>
                  <?php  } else if($item['status']==3) { ?>
                      <span class="label storeblue">已发货</span>
                  <?php  } else if($item['status']==4) { ?>
                      <span class="label storeblue">已完成</span>
                  <?php  } else if($item['status']==5) { ?>
                      <span class="label storeblue">已取消</span>
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
                  <?php  if($item['status']==2) { ?>
                    <a data-toggle="modal" data-target="#myModal1<?php  echo $item['id'];?>"><button class="btn btn-xs storeblue">确认发货</button></a>
                  <?php  } else if($item['status']==3) { ?>
                    <a data-toggle="modal" data-target="#myModal1<?php  echo $item['id'];?>"><button class="btn btn-xs storeblue">修改快递</button></a>
                    <a href="<?php  echo $this->createWebUrl('crowdorder', array('op'=>complete,'id'=>$item['id']))?>"><button class="btn btn-xs storeblue">完成订单</button></a>
                  <?php  } ?>
                  <a href="javascript:void(0);"  data-toggle="modal" data-target="#myModal2<?php  echo $item['id'];?>"><button class="btn storeblue btn-xs">修改地址</button></a>
                  <?php  if($item['istui']==1) { ?>
                    <a href="<?php  echo $this->createWebUrl('crowdorder', array('op'=>refund,'id'=>$item['id'],'refund'=>2))?>"><button class="btn btn-xs storeblue">通过退款申请</button></a>
                    <a href="<?php  echo $this->createWebUrl('crowdorder', array('op'=>refund,'id'=>$item['id'],'refund'=>3))?>"><button class="btn btn-xs storeblue">拒绝退款申请</button></a>
                  <?php  } ?>
                  <a class="storespan btn btn-xs" href="<?php  echo $this->createWebUrl('crowdorder', array('id'=>$item['id'],'op'=>'delete'))?>" onclick="return confirm('确认删除吗？');return false;">
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
                                  <input type="hidden" name="m" value="lhyzhnc_sun" />
                                  <input type="hidden" name="do" value="crowdorder" />
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
              <div class="modal fade" id="myModal1<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">输入快递信息</h4>
                              </div>
                              <form action="" method="get" >
                                  <input type="hidden" name="c" value="site" />
                                  <input type="hidden" name="a" value="entry" />
                                  <input type="hidden" name="m" value="lhyzhnc_sun" />
                                  <input type="hidden" name="do" value="crowdorder" />
                                  <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
                                  <input type="hidden" name="op" value="renewal" />
                                  <div class="modal-body" style="font-size: 20px">
                                        <label  control-label">快递方式</label>
                                        <input type="text" name="way" value="<?php  echo $item['way'];?>"  class="form-control"  placeholder='请输入快递方式，如中通，圆通等'"/>
                                        <label  control-label">快递单号</label>
                                        <input type="text" name="waybill" value="<?php  echo $item['waybill'];?>"  class="form-control"  placeholder='请输入快递单号'"/>
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
  <!-- </form> -->
</div>
<div class="text-right we7-margin-top"><?php  echo $pager;?></div>
<script type="text/javascript">
    $(function(){
        $("#frame-1111").show();
        $("#yframe-1111").addClass("wyactive");


        $(".allcheck").on('click',function(){
            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").prop("checked",checked);
        });
    })
</script>