<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcss.css">
<style type="text/css">
    #goodsinput{font-size: 14px;height: 33px;border-radius: 4px;border:1px solid #e7e7eb;padding-left: 10px;}
    .searchname{font-size: 14px;color: #666;width: 220px;}
    .searchname>a>p{color: #666;}
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li ><a href="<?php  echo $this->createWebUrl('settab')?>">首页菜单管理</a></li>
    <li  class="active"><a href="<?php  echo $this->createWebUrl('settabadd')?>">首页菜单添加</a></li>
    <!-- <li class="active"><a href="<?php  echo $this->createWebUrl('settab',array('op'=>'add'))?>">添加底部导航</a></li> -->
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                添加菜单导航
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" value="<?php  echo $info['name'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('img', $info['img']);?>
                        <span class="help-block" id="">*建议比例 24*24</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">路径</label>
                    <div class="col-sm-10">
                        <input type="text" name="path" class="form-control" value="<?php  echo $info['path'];?>" />
                        <span class="help-block" id="">*首页:/drr_gy/pages/index/index</span>
                        <span class="help-block" id="">*文章列表:/drr_gy/pages/discovery/discovery?type=1</span>
                        <span class="help-block" id="">*商品列表:/drr_gy/pages/discovery/discovery?type=2</span>
                        <span class="help-block" id="">*活动列表:/drr_gy/pages/discovery/discovery?type=3</span>
                        <span class="help-block" id="">*我的:/drr_gy/pages/my/my</span>
                        <span class="help-block" id="">*认养列表:/drr_gy/pages/lists/lists?id=1</span>
                        <span class="help-block" id="">*认养详情:/drr_gy/pages/project/introduce/introduce?id=认养项目ID&sid=1,</span>
                        <span class="help-block" id="">*众筹列表:/drr_gy/pages/lists/lists?id=2</span>
                        <span class="help-block" id="">*众筹详情:/drr_gy/pages/project/introduce/introduce?id=众筹项目ID&sid=2,</span>
                    </div>
                    <!-- <br> -->
                    
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="sort" class="form-control" value="<?php  echo $info['sort'];?>" />
                    </div>
                </div>
                 
            </div>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="提交" class="btn col-lg-3" style="color: white;background-color: #444444;margin-left: 450px;"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            <input type="hidden" name="id" value="<?php  echo $info['id'];?>" />
            <!-- <input type="hidden" name="op" value="save" /> -->
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-12").show();
        $("#yframe-12").addClass("wyactive");
        

    })
</script>