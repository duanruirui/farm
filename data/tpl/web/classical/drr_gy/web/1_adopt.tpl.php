<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
 <li <?php  if($type=='all') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('adopt',array('type'=>all));?>">全部认养</a></li>
 <li <?php  if($type=='wait') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('adopt',array('type'=>wait,'status'=>1));?>">待审核</a></li>
 <li <?php  if($type=='ok') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('adopt',array('type'=>ok,'status'=>2));?>">已确认</a></li>
 <li <?php  if($type=='no') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('adopt',array('type'=>no,'status'=>3));?>">已拒绝</a></li>
 <li <?php  if($type=='end') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('adopt',array('type'=>end,'status'=>4));?>">已结束</a></li>

</ul>
<div class="row ygrow">
    <div class="col-lg-12">
        <form action="" method="get" class="col-md-4">
        <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="drr_gy" />
            <input type="hidden" name="do" value="adopt" />
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="请输入认养名称" value='<?php  echo $op;?>'> 
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                </span>
            </div>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </form>

        <div class="col-md-4">
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </div>
    </div><!-- /.col-lg-6 -->
</div>  
<div class="main">
    <div class="panel panel-default">
        <div class="panel-heading">
            认养管理
        </div>
        <div class="panel-body" style="padding: 0px 15px;">
            <div class="row">
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">
                        <!-- <td class="store_td1 col-md-1" style="text-align: center;">
                          <input type="checkbox" class="allcheck" />
                          <span class="store_inp">全选</span>                      
                        </td> -->
                        <td class="store_td1 col-md-1">ID</td>
                        <td class="col-md-1">排序</td>
                        <td class="col-md-1">名称</td>
                        <td class="col-md-1">牧户</td>
                        <td class="col-md-1">价格</td>
                        <td class="col-md-1">已售</td>
                        <td class="col-md-1">开始时间</td>
                        <!-- <td class="col-md-1">结束时间</td> -->
                        <td class="col-md-1">状态</td>
                        <td class="col-md-1">推荐</td>
                        <td class="col-md-2">操作</td>
                    </tr>
                    <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                    <tr class="yg5_tr2">
                        <!-- <td>
                          <input type="checkbox" name="test" value="<?php  echo $item['id'];?>">
                        </td> -->
                        <td><?php  echo $item['id'];?></td>
                        <td><?php  echo $item['sort'];?></td>
                        <td><?php  echo $item['name'];?></td>
                        <td><?php  echo $item['storename'];?></td>
                        <td><?php  echo $item['price'];?>元</td>
                        <td><?php  echo $item['buynum'];?>(虚拟：<?php  echo $item['vir'];?>)</td>
                        
                        <td>
                            <?php  if($item['status']==1) { ?>
                                未开始
                            <?php  } else { ?>
                                <?php  echo $item['time'];?>
                            <?php  } ?>
                        </td>
                        <td>
                            <?php  if($item['status']==1) { ?>
                                <span class="label storered">待审核</span>
                            <?php  } else if($item['status']==2) { ?>
                                <span class="label storeblue">认养中</span>
                            <?php  } else if($item['status']==3) { ?>
                                <span class="label storegrey">已拒绝</span>
                            <?php  } else if($item['status']==4) { ?>
                                <span class="label storegrey">已结束</span>
                            <?php  } ?>
                            
                        </td>    
                        <td>
                            <?php  if($item['isshow']==1) { ?>
                                未推荐
                            <?php  } else { ?>
                                已推荐
                            <?php  } ?>
                        </td>                 
                       <!-- <td>
                           <input type="text" style="width: 100px;" id="sclink<?php  echo $item['id'];?>" name="link" value="drr_gy/pages/index/adopt/adopt?id=<?php  echo $item['id'];?>">
                           <span class="label" id="copybtn" data-clipboard-action="copy" style="color: #fff;background-color: #409e40; cursor: pointer;" data-clipboard-target="#sclink<?php  echo $item['id'];?>">复制链接</span>
                       </td> -->

                       <td>
                       
                       <?php  if($item['status']==1) { ?>
                       <a href="<?php  echo $this->createWebUrl('adopt',array('op'=>'pass','id'=>$item['id']));?>"><button class="btn storeblue btn-xs">开启</button></a>
                       <a href="<?php  echo $this->createWebUrl('adopt',array('op'=>'nopass','id'=>$item['id']));?>"><button class="btn storegrey btn-xs">关闭</button></a>
                       <?php  } ?>
                       <?php  if($item['status']==2) { ?>
                            <?php  if($item['isshow']==1) { ?>
                           <a href="<?php  echo $this->createWebUrl('adopt',array('op'=>'tj','id'=>$item['id']));?>"><button class="btn storeblue btn-xs">推荐</button></a>
                           <?php  } ?>
                           <?php  if($item['isshow']==2) { ?>
                           <a href="<?php  echo $this->createWebUrl('adopt',array('op'=>'qx','id'=>$item['id']));?>"><button class="btn storeblue btn-xs">取消</button></a>
                           <?php  } ?>
                        <a href="<?php  echo $this->createWebUrl('adopt',array('op'=>'nopass','id'=>$item['id']));?>"><button class="btn storegrey btn-xs">关闭</button></a>
                       <?php  } ?>
                       <?php  if($item['status']==3) { ?>
                       <a href="<?php  echo $this->createWebUrl('adopt',array('op'=>'pass','id'=>$item['id']));?>"><button class="btn storeblue btn-xs">开启</button></a>
                       <?php  } ?>


                       <a href="<?php  echo $this->createWebUrl('adoptinfo',array('id'=>$item['id']));?>" class="storespan btn btn-xs">
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

                            <!-- <a href="<?php  echo $this->createWebUrl('adoptinfo',array('id'=>$item['id']));?>"><button class="btn btn-success btn-xs">查看</button></a>
                           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $item['id'];?>">删</button> -->
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
                                    <a href="<?php  echo $this->createWebUrl('adopt', array('op' => 'delete', 'id' => $item['id']))?>" type="button" class="btn btn-info" >确定</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php  } } ?>
            <?php  if(empty($list)) { ?>
            <tr class="yg5_tr2">
                <td colspan="8">
                      暂无商品信息
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
    // requireConfig.paths.copy2 = "https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min";
    // require.config(requireConfig);
    // require(['copy2'],function(Clipboard){
    //     var clipboard = new Clipboard('#copybtn');
    //     clipboard.on('success', function(e) {
    //         alert("复制成功");
    //         console.log(e);
    //     });
    //     clipboard.on('error', function(e) {
    //         alert("复制失败");
    //         console.log(e);
    //     });
    // })

    $(function(){
        $("#frame-444").show();
        $("#yframe-444").addClass("wyactive");
        
        $(".allcheck").on('click',function(){
            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").prop("checked",checked);
        });
    })
</script>