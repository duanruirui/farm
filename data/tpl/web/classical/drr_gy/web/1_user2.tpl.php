<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcsslist.css">
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li class="active" ><a >访客管理</a> </li>

</ul>
<div class="row ygrow">
    <div class="col-lg-12">
        <form action="" method="get" class="col-md-4">
          <input type="hidden" name="c" value="site" />
          <input type="hidden" name="a" value="entry" />
          <input type="hidden" name="m" value="drr_gy" />
          <input type="hidden" name="do" value="user2" />
            <div class="input-group" style="width: 300px">
                <input type="text" name="keywords" class="form-control" value="<?php  echo $keyword;?>" placeholder="请输入用户昵称">
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
</div>

<div class="main">

    <div class="panel panel-default">
        <div class="panel-heading">
            访客管理
        </div>
        <div class="panel-body" >
            <div class="row">
                <table class="yg5_tabel col-md-12">
                    <tr class="yg5_tr1">
                        <td class="store_td1 col-md-1">id</td>
                        <td class="col-md-1">openid</td>
                        <td class="col-md-1">用户昵称</td>
                        <td class="col-md-1">用户头像</td>
                        <!-- <td class="col-md-1">邀请次数<span><a  <?php  if($op=='numdao') { ?> style='background: black;border-radius: 4px;color:white;padding: 4px;' <?php  } ?> href="<?php  echo $this->createWebUrl('user2',array('op'=>'numdao'));?>">（降）</a><a <?php  if($op=='numzheng') { ?> style='background: black;border-radius: 4px;color:white;padding: 4px;' <?php  } ?> href="<?php  echo $this->createWebUrl('user2',array('op'=>'numzheng'));?>">（正）</a></span></td>

                        <td class="col-md-1">成功次数<a  <?php  if($op=='successdao') { ?> style='background: black;border-radius: 4px;color:white;padding: 4px;'<?php  } ?> href="<?php  echo $this->createWebUrl('user2',array('op'=>'successdao'));?>">（降）</a><a <?php  if($op=='successzheng') { ?> style='background: black;border-radius: 4px;color:white;padding: 4px;' <?php  } ?> href="<?php  echo $this->createWebUrl('user2',array('op'=>'successzheng'));?>">（正）</a></td>

                        <td class="col-md-1">佣金<a  <?php  if($op=='commissiondao') { ?> style='background: black;border-radius: 4px;color:white;padding: 4px;' <?php  } ?> href="<?php  echo $this->createWebUrl('user2',array('op'=>'commissiondao'));?>">（降）</a><a <?php  if($op=='commissionzheng') { ?> style='background: black;border-radius: 4px;color:white;padding: 4px;' <?php  } ?> href="<?php  echo $this->createWebUrl('user2',array('op'=>'commissionzheng'));?>">（正）</a></td> -->

                        <td class="col-md-1">地址</td>
                        <td class="col-md-1">电话</td>
                        <!-- <td class="col-md-1">vip级别</td> -->
                        <!-- <td class="col-md-1">vip到期的时间</td> -->
                        <!-- <td class="col-md-1">操作</td> -->
                    </tr>
                    <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                    <tr class="yg5_tr2">

                        <td><?php  echo $item['id'];?></td>

                        <td><?php  echo $item['openid'];?></td>
                        <td><?php  echo $item['name'];?></td>
                        <td><img src="<?php  echo $item['img'];?>"  style="width: 50px;height: 50px;"> </td>
                        <!-- <td><?php  echo $item['num'];?></td>
                        <td><?php  echo $item['success'];?></td>
                        <td><?php  echo $item['commission'];?></td> -->
                        <td><?php  echo $item['addr'];?></td>
                        <td><?php  echo $item['phone'];?></td>

                        <!-- <td><?php  echo $item['telphone'];?></td> -->
                        <!-- <td><?php  echo $item['title'];?> </td> -->
                        <!-- <td><?php  echo $item['endtime'];?> </td> -->

                        <!-- <td> -->
                            <!-- <a href="<?php  echo $this->createWebUrl('user2',array('op'=>'edituser','id'=>$item['id']));?>"><button class="btn btn-success btn-xs">编辑</button></a> -->
                            <!-- <a href="<?php  echo $this->createWebUrl('goodsinfo',array('id'=>$item['id']));?>"><button class="btn btn-success btn-xs">查看</button></a>
                           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php  echo $item['id'];?>">删</button> -->
                        <!-- </td> -->

                    </tr>
                    <!-- <div class="modal fade" id="myModal<?php  echo $item['bid'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                    <a href="<?php  echo $this->createWebUrl('brand', array('op' => 'delete', 'bid' => $item['bid']))?>" type="button" class="btn btn-info" >确定</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
</div>
<div class="text-right we7-margin-top">
    <?php  echo $pager;?>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-11").show();
        $("#yframe-11").addClass("wyactive");

    })
</script>