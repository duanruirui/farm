<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcss.css">
<ul class="nav nav-tabs">    
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
   <li class="active"><a href="javascript:void(0);">基本信息</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                基本信息
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">平台名称</label>
                    <div class="col-sm-9">
                       <input type="text" name="pt_name" class="form-control" value="<?php  echo $item['pt_name'];?>" />
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">后台顶部标题名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="link_name" class="form-control" value="<?php  echo $item['link_name'];?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">后台顶部logo</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('link_logo', $item['link_logo'])?>
                        <span class="help-block">*建议比例 1:1 (34*34)</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">客服咨询图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('wg_img', $item['wg_img'])?>
                        <span class="help-block">*建议比例 750*1206</span>
                    </div>
                </div>

            </div>
            <div class="panel-heading wyheader">
                分享信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页分享自定义文字</label>
                    <div class="col-sm-9">
                        <input type="text" name="fenxiangzi" class="form-control" value="<?php  echo $item['fenxiangzi'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页分享图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('fenxiangtu', $item['fenxiangtu'])?>
                        <span class="help-block">*建议比例 420*336</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">项目介绍分享自定义文字</label>
                    <div class="col-sm-9">
                        <input type="text" name="fenxiangzi2" class="form-control" value="<?php  echo $item['fenxiangzi2'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">项目介绍分享图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('fenxiangtu2', $item['fenxiangtu2'])?>
                        <span class="help-block">*建议比例 420*336</span>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">邀请有奖分享自定义文字</label>
                    <div class="col-sm-9">
                        <input type="text" name="fenxiangzi3" class="form-control" value="<?php  echo $item['fenxiangzi3'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">邀请分享图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('fenxiangtu3', $item['fenxiangtu3'])?>
                        <span class="help-block">*建议比例 420*336</span>
                    </div>
                </div> -->

            </div>
            <div class="panel-heading wyheader">
                海报图片
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">海报图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('haibaotu', $item['haibaotu'])?>
                        <span class="help-block">*建议比例 750*1060</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="提交" class="btn col-lg-3" style="color: white;background-color: #444444;margin-left: 550px;"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-12").show();
        $("#yframe-12").addClass("wyactive");
    })
</script>