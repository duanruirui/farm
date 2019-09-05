<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
 <li <?php  if($type=='all') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('dynamic',array('type'=>all));?>">全部动态</a></li>
 <li <?php  if($type=='wait') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('dynamic',array('type'=>wait,'status'=>1,'storeid'=>$storeid));?>">待审核</a></li>
 <li <?php  if($type=='yes') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('dynamic',array('type'=>yes,'status'=>2,'storeid'=>$storeid));?>">已通过</a></li>


</ul>
<!-- <ul class="nav nav-tabs">
  <span class="ygxian"></span>
  <div class="ygdangq">发布对象:</div>
 <li <?php  if($storeid=='0') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('dynamic',array('storeid'=>0,'type'=>$type,'status'=>$status));?>">平台发布</a></li>
  <?php  if(is_array($storename)) { foreach($storename as $row) { ?>
    <li  <?php  if($storeid==$row['id']) { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('dynamic',array('storeid'=>$row['id'],'type'=>$type,'status'=>$status));?>"><?php  echo $row['storename'];?></a></li>
  <?php  } } ?>
</ul> -->
<!-- <div class="row ygrow">
    <div class="col-lg-12">
        <form action="" method="get" class="col-md-4">
        <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="drr_gy" />
            <input type="hidden" name="do" value="dynamic" />
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="请输入牧户名称" value='<?php  echo $op;?>'> 
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" name="submit" value="查找"/>
                </span>
            </div>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </form>

        <div class="col-md-4">
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
        </div>
    </div>
</div>   -->
<div class="main">
    <div class="panel panel-default">
        <div class="panel-heading">
            动态管理
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
                        <td class="col-md-1">牧户</td>
                        <td class="col-md-1">联系方式</td>
                        <td class="col-md-2">内容</td>
                        <td class="col-md-1">时间</td>
                        <td class="col-md-1">类型</td>
                        <td class="col-md-1">状态</td>
                        <td class="col-md-1">操作</td>
                    </tr>
                    <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                    <tr class="yg5_tr2">
                        <!-- <td>
                          <input type="checkbox" name="test" value="<?php  echo $item['id'];?>">
                        </td> -->
                        <td><?php  echo $item['id'];?></td>
                        <td><?php  echo $item['res']['storename'];?></td>
                        <td><?php  echo $item['res']['phone'];?></td>
                        <td><?php  echo $item['content'];?></td>
                        <td><?php  echo $item['time'];?></td>
                        <td>
                            <?php  if($item['state']==1) { ?>
                                认养项目：<?php  echo $item['res']['name'];?>
                            <?php  } else { ?>
                                众筹项目：<?php  echo $item['res']['name'];?>
                            <?php  } ?>
                        </td>
                        <td>
                            <?php  if($item['status']==1) { ?>
                                待审核
                            <?php  } else { ?>
                                已确认
                            <?php  } ?>
                        </td>
                       <td>
                       <?php  if($item['status']==1) { ?>
                        <a href="<?php  echo $this->createWebUrl('dynamic',array('op'=>'pass','id'=>$item['id'],'sid'=>$item['sid'],'state'=>$item['state'],'uid'=>$item['uid']));?>"><button class="btn storeblue btn-xs">确认</button></a>
                        
                        <?php  } else { ?>
                        <a href="<?php  echo $this->createWebUrl('dynamic',array('op'=>'nopass','id'=>$item['id']));?>"><button class="btn storegrey btn-xs">拒绝</button></a>
                       <?php  } ?>
                       <a href="<?php  echo $this->createWebUrl('dynamicinfo',array('id'=>$item['id']));?>" class="storespan btn btn-xs">
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
                                    <a href="<?php  echo $this->createWebUrl('dynamic', array('op' => 'delete', 'id' => $item['id']))?>" type="button" class="btn btn-info" >确定</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php  } } ?>
            <?php  if(empty($list)) { ?>
            <tr class="yg5_tr2">
                <td colspan="8">
                      暂无动态信息
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
    requireConfig.paths.copy2 = "https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min";
    require.config(requireConfig);
    require(['copy2'],function(Clipboard){
        var clipboard = new Clipboard('#copybtn');
        clipboard.on('success', function(e) {
            alert("复制成功");
            console.log(e);
        });
        clipboard.on('error', function(e) {
            alert("复制失败");
            console.log(e);
        });
    })

    $(function(){
        $("#frame-999").show();
        $("#yframe-999").addClass("wyactive");
        
        $(".allcheck").on('click',function(){
            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").prop("checked",checked);
        });
    })
</script>