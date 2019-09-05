<?php defined('IN_IA') or exit('Access Denied');?>    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li class="active"><a href="<?php  echo $this->createWebUrl('article')?>">文章管理</a></li>
    <li><a href="<?php  echo $this->createWebUrl('articleadd',array('op'=>'add'))?>">添加文章</a></li>
</ul>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq"> </div>

    <li <?php  if($type=='all') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('article',array('type'=>all));?>">全部文章</a></li>
    <li <?php  if($type=='wait') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('article',array('type'=>wait,'status'=>1));?>">待审核</a></li>
    <li <?php  if($type=='ok') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('article',array('type'=>ok,'status'=>2));?>">已确认</a></li>
    <li <?php  if($type=='no') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('article',array('type'=>no,'status'=>3));?>">已拒绝</a></li>

</ul>

<!-- <div class="row ygrow">
    <div class="col-lg-12">
        <form action="" method="get" class="col-md-4">
        <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="drr_gy" />
            <input type="hidden" name="do" value="article" />
            <div class="input-group">
                <input type="text" name="keywords" class="form-control" placeholder="请输入文章名称">
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
            文章管理
        </div>
            <div class="panel-body">
                <div class="row">
                    <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">
                            <td class="store_td1 col-md-1">id</td>
                            <td class="col-md-1">排序</td>
                            <td class="col-md-1">文章名称</td>
                            <td class="col-md-1">分类</td>
                            <!-- <td class="col-md-1">所属商家</td>
                            <td class="col-md-1">关联商品</td> -->
                            <td class="col-md-1">封面图</td>
                            <td class="col-md-1">首页推荐</td>

                            <!-- <td class="col-md-1">查看数量</td> -->
                            <!-- <td class="col-md-1">点赞数量</td> -->
                            <!-- <td class="col-md-1">是否最新</td> -->
                            <td class="col-md-1">评论</td>
                            <td class="col-md-1">状态</td>
                            <td class="col-md-2">操作</td>
                        </tr>
                        <?php  if(is_array($list)) { foreach($list as $row) { ?>
                        <tr class="yg5_tr2">
                            <td><div><?php  echo $row['id'];?></div></td>
                            <td><div><?php  echo $row['sort'];?></div></td>
                            <td><?php  echo $row['name'];?></td>
                            <td><?php  echo $row['sc_name'];?></td>
                            <!-- <td><?php  echo $row['storename'];?></td>
                            <td><?php  echo $row['gname'];?></td> -->
                            <td><img src="<?php  echo $_W['attachurl'];?><?php  echo $row['img'];?>" height="50"></td>
                            <!-- <td>
                            <?php  if($row['isrecommend']==1) { ?>
                                <span class="label storered">否</span>
                            <?php  } else if($row['isrecommend']==2) { ?>
                                <span class="label storeblue">是</span>
                            <?php  } ?>
                        </td>  -->
                        <td>
                            <?php  if($row['isshow']==1) { ?>
                                <span class="label storered">否</span>
                            <?php  } else if($row['isshow']==2) { ?>
                                <span class="label storeblue">是</span>
                            <?php  } ?>
                        </td> 
                            <td><?php  if($row['comment']==2) { ?>
                          <span class="label storeblue">开启</span>
                        <?php  } else { ?>
                          <span class="label storered">关闭</span>
                        <?php  } ?>
                        </td>
                            <?php  if($row['status']==1) { ?>
                                <td>
                                    <span class="label storered">待审核</span>
                                </td >
                                <?php  } else if($row['status']==2) { ?>
                                <td >
                                    <span class="label storeblue">已通过</span>
                                </td>
                                <?php  } else if($row['status']==3) { ?>
                                <td>
                                   <span class="label storegrey">已拒绝</span>
                               </td>
                            <?php  } ?>
                            <td>
                        <!-- <?php  if($row['isrecommend']==1) { ?>
                        <a href="<?php  echo $this->createWebUrl('article',array('op'=>'pass1','id'=>$row['id']));?>"><button class="btn storeblue btn-xs">设置最新</button></a>
                       <?php  } else { ?>
                        <a href="<?php  echo $this->createWebUrl('article',array('op'=>'nopass1','id'=>$row['id']));?>"><button class="btn storegrey btn-xs">取消最新</button></a>
                       <?php  } ?> -->
                       
                        <?php  if($row['status']==1) { ?>
                        <a href="<?php  echo $this->createWebUrl('article',array('op'=>'pass','id'=>$row['id'],'cid'=>$row['cid']));?>"><button class="btn storeblue btn-xs">通过</button></a>
                        <a href="<?php  echo $this->createWebUrl('article',array('op'=>'nopass','id'=>$row['id']));?>"><button class="btn storegrey btn-xs">拒绝</button></a>
                        <?php  } ?>
                        <?php  if($row['status']==2) { ?>
                            <?php  if($row['isshow']==1) { ?>
                            <a href="<?php  echo $this->createWebUrl('article',array('op'=>'pass3','id'=>$row['id']));?>"><button class="btn storeblue btn-xs">首页推荐</button></a>
                           <?php  } else { ?>
                          <a href="<?php  echo $this->createWebUrl('article',array('op'=>'nopass3','id'=>$row['id']));?>"><button class="btn storegrey btn-xs">取消推荐</button></a>
                           <?php  } ?>
                            <?php  if($row['comment']==1) { ?>
                            <a href="<?php  echo $this->createWebUrl('article',array('op'=>'pass2','id'=>$row['id']));?>"><button class="btn storeblue btn-xs">开启评论</button></a>
                           <?php  } else { ?>
                            <a href="<?php  echo $this->createWebUrl('article',array('op'=>'nopass2','id'=>$row['id']));?>"><button class="btn storegrey btn-xs">关闭评论</button></a>

                           <?php  } ?>
                            <a href="<?php  echo $this->createWebUrl('articleping',array('op'=>articleping,'id'=>$row['id']));?>"><button class="btn btn-success btn-xs">查看评论</button></a>

                        <a href="<?php  echo $this->createWebUrl('article',array('op'=>'nopass','id'=>$row['id']));?>"><button class="btn storegrey btn-xs">拒绝</button></a>
                        <?php  } ?>
                        <?php  if($row['status']==3) { ?>
                        <a href="<?php  echo $this->createWebUrl('article',array('op'=>'pass','id'=>$row['id'],'cid'=>$row['cid']));?>"><button class="btn storeblue btn-xs">通过</button></a>
                        <?php  } ?>
                                
                                <a href="<?php  echo $this->createWebUrl('articleadd', array('op' => 'edit','id' => $row['id']))?>" class="storespan btn btn-xs">
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
                                            <a href="<?php  echo $this->createWebUrl('article', array('op' => 'delete','id' => $row['id']))?>" type="button" class="btn btn-info" >确定</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  } } ?>
                           <?php  if(empty($list)) { ?>
                            <tr class="yg5_tr2">
                                <td colspan="11">
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
        $("#frame-7").show();
        $("#yframe-7").addClass("wyactive");
    })
</script>