<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li class="active"><a href="<?php  echo $this->createWebUrl('banner')?>">轮播图管理</a></li>
    <li><a href="<?php  echo $this->createWebUrl('banner',array('op'=>'add'))?>">添加轮播图</a></li>
</ul>
<div class="main">

    <div class="panel panel-default">
        <div class="panel-heading">
            轮播图管理
        </div>
            <div class="panel-body">
                <div class="row">
                    <table class="yg5_tabel col-md-12">
                        <tr class="yg5_tr1">
                            <td class="store_td1 col-md-1">id</td>
                            <td class="col-md-1">排序</td>
                            <!-- <td class="col-md-2">名称</td> -->
                            <!-- <td class="col-md-1">位置</td> -->
                            <td class="col-md-1">路径</td>
                            <td class="col-md-1">轮播图</td>
                            <td class="col-md-1">状态</td>
                            <td class="col-md-2">操作</td>
                        </tr>
                        <?php  if(is_array($list)) { foreach($list as $row) { ?>
                        <tr class="yg5_tr2">
                            <td><div><?php  echo $row['id'];?></div></td>
                            <td><div><?php  echo $row['sort'];?></div></td>
                            <!-- <td><?php  echo $row['pop_title'];?></td> -->
                            <!-- <td><?php  echo $position[$row['position']];?></td> -->
                            <td><?php  echo $row['path'];?></td>
                            <td><img src="<?php  echo $_W['attachurl'];?><?php  echo $row['img'];?>" height="50"></td>
                            <td>
                                
                                <?php  if($row['status']==1) { ?>
                                    待审核
                                <?php  } else if($row['status']==2) { ?>
                                    已通过
                                <?php  } else { ?>
                                    已拒绝
                                <?php  } ?>
                            </td>
                            <td>
                                <?php  if($row['status']==1) { ?>
                                <a href="<?php  echo $this->createWebUrl('banner',array('op'=>'pass','id'=>$row['id']));?>"><button class="btn storeblue btn-xs">通过</button></a>
                                <a href="<?php  echo $this->createWebUrl('banner',array('op'=>'nopass','id'=>$row['id']));?>"><button class="btn storegrey btn-xs">拒绝</button></a>
                                <?php  } ?>
                                <?php  if($row['status']==2) { ?>
                                <a href="<?php  echo $this->createWebUrl('banner',array('op'=>'nopass','id'=>$row['id']));?>"><button class="btn storegrey btn-xs">拒绝</button></a>
                                <?php  } ?>
                                <?php  if($row['status']==3) { ?>
                                <a href="<?php  echo $this->createWebUrl('banner',array('op'=>'pass','id'=>$row['id']));?>"><button class="btn storeblue btn-xs">通过</button></a>
                                <?php  } ?>
                                <a href="<?php  echo $this->createWebUrl('banner', array('op' => 'edit','id' => $row['id']))?>" class="storespan btn btn-xs">
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
                                            <a href="<?php  echo $this->createWebUrl('banner', array('op' => 'delete','id' => $row['id']))?>" type="button" class="btn btn-info" >确定</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  } } ?>
                           <?php  if(empty($list)) { ?>
                            <tr class="yg5_tr2">
                                <td colspan="8">
                                    暂无信息
                                </td>
                            </tr>
                          <?php  } ?>
                        </table>
                    </div>
            </div>
        </div>
    <div class="text-right we7-margin-top">
        <?php  echo $pager;?>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $("#frame-12").show();
        $("#yframe-12").addClass("wyactive");
    })
</script>