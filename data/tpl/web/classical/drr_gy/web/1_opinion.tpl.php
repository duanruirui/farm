<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/zoomify.min.css">
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
 <li <?php  if($type=='all') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('opinion',array('type'=>all));?>">全部意见</a></li>
 <li <?php  if($type=='wait') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('opinion',array('type'=>wait,'status'=>1));?>">待回复</a></li>
 <li <?php  if($type=='ok') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('opinion',array('type'=>ok,'status'=>2));?>">已回复</a></li>
 <!-- <li <?php  if($type=='no') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('opinion',array('type'=>no,'status'=>3));?>">已拒绝</a></li> -->
 <!-- <li <?php  if($type=='end') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('opinion',array('type'=>end,'status'=>4));?>">已结束</a></li> -->

</ul>
<div class="row ygrow">
    <div class="col-lg-12">
        <form action="" method="get" class="col-md-4">
        <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="drr_gy" />
            <input type="hidden" name="do" value="opinion" />
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="请输入意见" value='<?php  echo $op;?>'> 
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
            意见管理
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
                        <td class="col-md-1">用户名</td>
                        <td class="col-md-1">联系电话</td>
                        <td class="col-md-2">反馈</td>
                        <td class="col-md-1">反馈时间</td>
                        <td class="col-md-2">回复</td>
                        <td class="col-md-1">回复时间</td>
                        <td class="col-md-1">状态</td>
                        <td class="col-md-2">操作</td>
                    </tr>
                    <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                    <tr class="yg5_tr2">
                        <!-- <td>
                          <input type="checkbox" name="test" value="<?php  echo $item['id'];?>">
                        </td> -->
                        <td><?php  echo $item['id'];?></td>
                        <td><?php  echo $item['name'];?></td>
                        <td><?php  echo $item['phone'];?></td>
                        <td><?php  echo $item['question'];?></td>
                        <td><?php  echo $item['time'];?></td>
                        <td>
                            <?php  if($item['status']==2&&$item['reply']=='') { ?>
                                已通过电话回访
                            <?php  } else if($item['status']==2&&$item['reply']!='') { ?>
                                <?php  echo $item['reply'];?>
                            <?php  } else if($item['status']==1) { ?>
                                尚未回访
                            <?php  } ?>
                        </td>
                        <td><?php  echo $item['replytime'];?></td>
                        <td>
                            <?php  if($item['status']==2) { ?>
                                已回复
                            <?php  } else { ?>
                                待回复
                            <?php  } ?>
                        </td>


                       <td>
                           <?php  if($item['status']==1) { ?>
                                <!-- <a href="<?php  echo $this->createWebUrl('reply', array( 'id' => $item['id']))?>"><button class="btn storeblue btn-xs">在线回复</button></a> -->
                                <a href="javascript:void(0);"  data-toggle="modal" data-target="#myModal1<?php  echo $item['id'];?>"><button class="btn storeblue btn-xs">在线回复</button></a>
                                <a href="<?php  echo $this->createWebUrl('opinion', array('op' => 'call', 'id' => $item['id'],'uid' => $item['uid']))?>" ><button class="btn storeblue btn-xs">已回电话</button></a>
                            <?php  } else if($item['status']==2&&$item['reply']!='') { ?>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal1<?php  echo $item['id'];?>"><button class="btn storeblue btn-xs">修改回复</button></a>
                            <?php  } ?>


                       <!-- <a href="<?php  echo $this->createWebUrl('opinioninfo',array('id'=>$item['id']));?>" class="storespan btn btn-xs">
                            <span class="fa fa-pencil"></span>
                            <span class="bianji">编辑
                                <span class="arrowdown"></span>
                            </span>
                        </a> -->
                        <a href="javascript:void(0);" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $item['id'];?>">
                            <span class="fa fa-trash-o"></span>
                            <span class="bianji">删除
                                <span class="arrowdown"></span>
                            </span>
                        </a>

                            <!-- <a href="<?php  echo $this->createWebUrl('opinioninfo',array('id'=>$item['id']));?>"><button class="btn btn-success btn-xs">查看</button></a>
                           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $item['id'];?>">删</button> -->
                       </td>

                   </tr>
                   <div class="modal fade" id="myModal1<?php  echo $item['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel1" style="font-size: 20px;">回复</h4>
                                </div>
                                <form action="" method="get" >
                                      <input type="hidden" name="c" value="site" />
                                      <input type="hidden" name="a" value="entry" />
                                      <input type="hidden" name="m" value="drr_gy" />
                                      <input type="hidden" name="do" value="opinion" />
                                      <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
                                      <input type="hidden" name="uid" value="<?php  echo $item['uid'];?>" />
                                      <input type="hidden" name="op" value="reply" />
                                      <div class="modal-body"  >
                                            <input type="text" name="reply" class="form-control" value="<?php  echo $item['reply'];?>" placeholder='请输入回复内容'/>
                                        
                                        <!-- <?php  echo tpl_ueditor('reply'.$item['id'],$item['reply']);?> -->
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                          <input type="submit" class="btn btn-info" name="submit" value="确定"/>
                                      </div>
                                      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
                                </form>
                            </div>
                        </div>
                    </div>
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
                                    <a href="<?php  echo $this->createWebUrl('opinion', array('op' => 'delete', 'id' => $item['id']))?>" type="button" class="btn btn-info" >确定</a>
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
<script src="../addons/drr_gy/template/public/zoomify.min.js"></script>

<script type="text/javascript">
        $('.yg5_tr2 img').zoomify();

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
        $("#frame-666").show();
        $("#yframe-666").addClass("wyactive");
        
        $(".allcheck").on('click',function(){
            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").prop("checked",checked);
        });
    })
</script>