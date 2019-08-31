<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/lhyzhnc_sun/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
 <li <?php  if($type=='all') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('goods',array('type'=>all));?>">全部商品</a></li>
 <li <?php  if($type=='wait') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('goods',array('type'=>wait,'status'=>1));?>">待审核</a></li>
 <li <?php  if($type=='ok') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('goods',array('type'=>ok,'status'=>2));?>">已确认</a></li>
 <li <?php  if($type=='no') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('goods',array('type'=>no,'status'=>3));?>">已拒绝</a></li>

</ul>
<div class="row ygrow">
    <div class="col-lg-12">
        <form action="" method="get" class="col-md-4">
        <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="lhyzhnc_sun" />
            <input type="hidden" name="do" value="goods" />
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="请输入商品名称">
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
            商品管理
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
                        <td class="col-md-1">商品名称</td>
                        <!-- <td class="col-md-2">牧户</td> -->
                        <td class="col-md-1">分类</td>
                        <td class="col-md-1">价格</td>
                        <td class="col-md-1">已售</td>
                        <!-- <td class="col-md-1">库存</td> -->
                        <td class="col-md-1">首页推荐</td>

                        <td class="col-md-1">评论</td>
                        
                        <td class="col-md-1">状态</td>
                        <!-- <td class="col-md-1">链接</td> -->
                        <td class="col-md-2">操作</td>
                    </tr>
                    <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                    <tr class="yg5_tr2">
                       <!--  <td>
                          <input type="checkbox" name="test" value="<?php  echo $item['id'];?>">
                        </td> -->
                        <td><?php  echo $item['id'];?></td>
                        <td><?php  echo $item['sort'];?></td>
                        <td><?php  echo $item['gname'];?></td>
                        <!-- <td><?php  echo $item['storename'];?></td> -->
                        <td><?php  echo $item['sc_name'];?></td>
                        <td><?php  echo $item['price'];?>元</td>
                        <td><?php  echo $item['buynum'];?>(虚拟：<?php  echo $item['num'];?>)</td>
                        
                        <!-- <td><?php  echo $item['num'];?></td> -->
                        <td>
                            <?php  if($item['isshow']==1) { ?>
                                <span class="label storered">否</span>
                            <?php  } else if($item['isshow']==2) { ?>
                                <span class="label storeblue">是</span>
                            <?php  } ?>
                        </td> 
                        
                        <td><?php  if($item['comment']==2) { ?>
                          <span class="label storeblue">开启</span>
                        <?php  } else { ?>
                          <span class="label storered">关闭</span>
                        <?php  } ?>
                        </td>
                        <td>
                            <?php  if($item['status']==1) { ?>
                                <span class="label storered">待审核</span>
                            <?php  } else if($item['status']==2) { ?>
                                <span class="label storeblue">已通过</span>
                            <?php  } else if($item['status']==3) { ?>
                                <span class="label storegrey">已拒绝</span>
                            <?php  } ?>
                        </td>                     
                       <!-- <td>
                           <input type="text" style="width: 100px;" id="sclink<?php  echo $item['id'];?>" name="link" value="lhyzhnc_sun/pages/index/goods/goods?id=<?php  echo $item['id'];?>">
                           <span class="label" id="copybtn" data-clipboard-action="copy" style="color: #fff;background-color: #409e40; cursor: pointer;" data-clipboard-target="#sclink<?php  echo $item['id'];?>">复制链接</span>
                       </td> -->

                       <td>
                        <!-- <?php  if($item['isrecommend']==1) { ?>
                        <a href="<?php  echo $this->createWebUrl('goods',array('op'=>'pass1','id'=>$item['id']));?>"><button class="btn storeblue btn-xs">设置最新</button></a>
                       <?php  } else { ?>
                        <a href="<?php  echo $this->createWebUrl('goods',array('op'=>'nopass1','id'=>$item['id']));?>"><button class="btn storegrey btn-xs">取消最新</button></a>
                       <?php  } ?> -->
                       
                       <?php  if($item['status']==1) { ?>
                       <a href="<?php  echo $this->createWebUrl('goods',array('op'=>'pass','id'=>$item['id'],'cid'=>$item['cid']));?>"><button class="btn storeblue btn-xs">通过</button></a>
                       <a href="<?php  echo $this->createWebUrl('goods',array('op'=>'nopass','id'=>$item['id']));?>"><button class="btn storegrey btn-xs">拒绝</button></a>
                       <?php  } ?>
                       <?php  if($item['status']==2) { ?>
                           <?php  if($item['isshow']==1) { ?>
                            <a href="<?php  echo $this->createWebUrl('goods',array('op'=>'pass3','id'=>$item['id']));?>"><button class="btn storeblue btn-xs">首页推荐</button></a>
                           <?php  } else { ?>
                          <a href="<?php  echo $this->createWebUrl('goods',array('op'=>'nopass3','id'=>$item['id']));?>"><button class="btn storegrey btn-xs">取消推荐</button></a>
                           <?php  } ?>
                           <?php  if($item['comment']==1) { ?>
                            <a href="<?php  echo $this->createWebUrl('goods',array('op'=>'pass2','id'=>$item['id']));?>"><button class="btn storeblue btn-xs">开启评论</button></a>
                           <?php  } else { ?>
                            <a href="<?php  echo $this->createWebUrl('goods',array('op'=>'nopass2','id'=>$item['id']));?>"><button class="btn storegrey btn-xs">关闭评论</button></a>
                           <?php  } ?>
                           <a href="<?php  echo $this->createWebUrl('goodsping',array('op'=>goodsping,'gid'=>$item['id']));?>"><button class="btn btn-success btn-xs">查看评论</button></a>
                           
                       <a href="<?php  echo $this->createWebUrl('goods',array('op'=>'nopass','id'=>$item['id']));?>"><button class="btn storegrey btn-xs">拒绝</button></a>
                       <?php  } ?>
                       <?php  if($item['status']==3) { ?>
                       <a href="<?php  echo $this->createWebUrl('goods',array('op'=>'pass','id'=>$item['id'],'cid'=>$item['cid']));?>"><button class="btn storeblue btn-xs">通过</button></a>
                       <?php  } ?>
                        
                        
                       <a href="<?php  echo $this->createWebUrl('goodsinfo',array('id'=>$item['id']));?>" class="storespan btn btn-xs">
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

                            <!-- <a href="<?php  echo $this->createWebUrl('goodsinfo',array('id'=>$item['id']));?>"><button class="btn btn-success btn-xs">查看</button></a>
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
                            <a href="<?php  echo $this->createWebUrl('goods', array('op' => 'delete', 'id' => $item['id']))?>" type="button" class="btn btn-info" >确定</a>
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
        $("#frame-2222").show();
        $("#yframe-2222").addClass("wyactive");
        
        $(".allcheck").on('click',function(){
            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").prop("checked",checked);
        });
    })
</script>