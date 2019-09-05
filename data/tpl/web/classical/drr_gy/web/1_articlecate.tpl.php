<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li class="active"><a href="<?php  echo $this->createWebUrl('articlecate')?>">文章分类管理</a></li>
    <li><a href="<?php  echo $this->createWebUrl('articlecate',array('op'=>'add'))?>">添加文章分类</a></li>
</ul>
<div class="main">

    <div class="panel panel-default">
        <div class="panel-heading">
            文章分类管理
        </div>
            <div class="panel-body">
                <div class="row">
                    <table class="yg5_tabel col-md-12">
                        <tr class="yg5_tr1">
                            <td class="store_td1 col-md-1">id</td>
                            <td class="col-md-1">排序</td>
                            <!-- <td class="col-md-1">数值</td> -->
                            <td class="col-md-2">分类名称</td>
                            <td class="col-md-1">分类图</td>
                            <td class="col-md-3">操作</td>
                        </tr>
                        <?php  if(is_array($list)) { foreach($list as $row) { ?>
                        <tr class="yg5_tr2">
                            <td><?php  echo $row['id'];?></td>
                            <td><?php  echo $row['sort'];?></td>
                            <!-- <td><?php  echo $row['num'];?></td> -->
                            <td><?php  echo $row['name'];?></td>
                            <td><img src="<?php  echo $_W['attachurl'];?><?php  echo $row['img'];?>" width="50" height="50"></td>
                            <td>
                                <a href="<?php  echo $this->createWebUrl('articlecate', array('op' => 'edit','id' => $row['id']))?>" class="storespan btn btn-xs">
                                    <span class="fa fa-pencil"></span>
                                    <span class="bianji">编辑
                                        <span class="arrowdown"></span>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="storespan btn btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $row['id'];?>">
                                    <span class="fa fa-trash-o"></span>
                                    <span class="bianji">删除
                                        <span class="arrowdown"></span>
                                    </span>
                                </a>
                            </td>
                        </tr>
                            <div class="modal fade" id="myModal<?php  echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                            <a href="<?php  echo $this->createWebUrl('articlecate', array('op' => 'delete','id' => $row['id']))?>" type="button" class="btn btn-info" >确定</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  } } ?>
                           <?php  if(empty($list)) { ?>
                            <tr class="yg5_tr2">
                                <td colspan="5">
                                    暂无信息
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
        $("#frame-7").show();
        $("#yframe-7").addClass("wyactive");
    })
</script>