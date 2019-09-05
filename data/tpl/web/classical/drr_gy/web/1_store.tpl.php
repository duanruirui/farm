<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li class="active" ><a >牧户管理</a> </li>
</ul>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq"> </div>

    <li <?php  if($type=='all') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('store',array('type'=>all));?>">全部牧户</a></li>
    <li <?php  if($type=='wait') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('store',array('type'=>wait,'status'=>1));?>">待审核</a></li>
    <li <?php  if($type=='ok') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('store',array('type'=>ok,'status'=>2));?>">已确认</a></li>
    <li <?php  if($type=='no') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('store',array('type'=>no,'status'=>3));?>">已拒绝</a></li>

</ul>
<div class="main">

    <div class="panel panel-default">
        <div class="panel-heading">
            牧户管理
        </div>
            <div class="panel-body">
                <div class="row">
                    <table class="yg5_tabel col-md-12">
                        <tr class="yg5_tr1">
                            <td class="store_td1 col-md-1">id</td>
                            <td class="col-md-1">排序</td>
                            <td class="col-md-1">名称</td>
                            <td class="col-md-1">绑定用户</td>
                            <!-- <td class="col-md-1">数量（领/总）</td> -->
                            <td class="col-md-1">牧龄</td>
                            <td class="col-md-1">联系方式</td>
                            <td class="col-md-2">牧户地址</td>
                            <!-- <td class="col-md-1">虚拟牧户</td> -->
                            <td class="col-md-1">状态</td>
                            <td class="col-md-3" >操作</td>
                        </tr>
                        <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                        <tr class="yg5_tr2">
                            <td><?php  echo $item['id'];?></td>
                        <td><?php  echo $item['sort'];?></td>
                        <td><?php  echo $item['storename'];?></td>
                        <td>
                        <?php  if($item['username']=='') { ?>
                              尚未绑定用户
                          <?php  } else { ?>
                              <?php  echo $item['username'];?>
                          <?php  } ?>
                        
                        </td>
                        <!-- <td>
                          <?php  if($item['state']==2) { ?>
                              <?php  echo $item['num'];?>/<?php  echo $item['num'];?>
                          <?php  } else if($item['state']==1) { ?>
                              <?php  echo $item['count'];?>/<?php  echo $item['num'];?>
                          <?php  } ?>
                        </td> -->
                        <td><?php  echo $item['memdiscount'];?></td>

                        <td><?php  echo $item['phone'];?></td>
                        <td><?php  echo $item['address'];?></td>
                        <!-- <td>
                            <?php  if($item['state']==2) { ?>
                                <span class="label storered">是</span>
                            <?php  } else if($item['state']==1) { ?>
                                <span class="label storeblue">否</span>
                            <?php  } ?>

                        </td> -->
                        <td>
                        <?php  if($item['status']==1) { ?>
                        <!-- <td> -->
                            <span class="label storered">待审核</span>
                        <!-- </td > -->
                        <?php  } else if($item['status']==2) { ?>
                        <!-- <td > -->
                            <span class="label storeblue">已通过</span>
                        <!-- </td> -->
                        <?php  } else if($item['status']==3) { ?>
                        
                           <span class="label storegrey">已拒绝</span>
                       
                       <?php  } ?>
                       </td>
                       <td>
                          <!-- <?php  if($item['dynamic']!=0) { ?>
                           <a href="<?php  echo $this->createWebUrl('storedynamicinfo',array('op'=>'storedynamicinfo','id'=>$item['dynamic']));?>"><button class="btn storeblue btn-xs">修改动态</button></a>
                           <?php  } else if($item['dynamic']==0&&$item['state']!=2) { ?>
                           <a href="<?php  echo $this->createWebUrl('storedynamicinfo',array('op'=>'storedynamicinfo'));?>"><button class="btn storeblue btn-xs">添加动态</button></a>
                           <?php  } ?> -->
                           <?php  if($item['state']==1) { ?>
                            <a href="<?php  echo $this->createWebUrl('storeorderinfo',array('op'=>'storeorderinfo','id'=>$item['id']));?>"><button class="btn storeblue btn-xs">查看牧户订单</button></a>
                            <?php  } ?>

                           <?php  if($item['status']==1) { ?>
                           <a href="<?php  echo $this->createWebUrl('store',array('op'=>'pass','id'=>$item['id']));?>"><button class="btn storeblue btn-xs">通过</button></a>
                           <a href="<?php  echo $this->createWebUrl('store',array('op'=>'nopass','id'=>$item['id']));?>"><button class="btn storegrey btn-xs">拒绝</button></a>
                           <?php  } ?>
                           <?php  if($item['status']==2) { ?>
                           <a href="<?php  echo $this->createWebUrl('store',array('op'=>'nopass','id'=>$item['id']));?>"><button class="btn storegrey btn-xs">拒绝</button></a>
                           
                           <?php  } ?>
                           <?php  if($item['status']==3) { ?>
                           <a href="<?php  echo $this->createWebUrl('store',array('op'=>'pass','id'=>$item['id']));?>"><button class="btn storeblue btn-xs">通过</button></a>
                           <?php  } ?>
                                 <!-- <?php  if($item['istop']==0) { ?>
                                  <a href="<?php  echo $this->createWebUrl('store',array('op'=>'top','id'=>$item['id'],'istop'=>1));?>"><button class="btn storeblue btn-xs">置顶</button></a>
                                 <?php  } else { ?>
                                  <a href="<?php  echo $this->createWebUrl('store',array('op'=>'top','id'=>$item['id'],'istop'=>0));?>"><button class="btn storeblue btn-xs">取消置顶</button></a>
                                 <?php  } ?> -->

                                 <a href="<?php  echo $this->createWebUrl('storeadd',array('id'=>$item['id']));?>" class="storespan btn btn-xs">
                                      <span class="fa fa-pencil"></span>
                                      <span class="bianji">编辑
                                          <span class="arrowdown"></span>
                                      </span>
                                  </a>
                                  <a href="javascript:void(0);" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $item['id'];?>">
                                      <span class="fa fa-trash-o"></span>
                                      <span class="bianji">删除
                                          <span class="arrowdown"></span>
                                      </span>
                                  </a>
                             </td>
                         </tr>
                            <div class="modal fade" id="myModal<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
                                  </div>
                                  <div class="modal-body" style="font-size: 20px">
                                      确定删除么？
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                      <a href="<?php  echo $this->createWebUrl('store', array('op' => 'delete', 'id' => $item['id']))?>" type="button" class="btn btn-info" >确定</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php  } } ?>
                           <?php  if(empty($list)) { ?>
                            <tr class="yg5_tr2">
                                <td colspan="5">
                                    暂无牧户信息
                                </td>
                            </tr>
                          <?php  } ?>
                        </table>
                    </div>
                    
            </div>
        </div>

</div>
<div class="text-right we7-margin-top">
   <?php  echo $pager;?>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-1").show();
        $("#yframe-1").addClass("wyactive");

    })
</script>