<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcss.css">
<ul class="nav nav-tabs">    
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
   <li class="active"><a href="javascript:void(0);">页面设置</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                页面设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">我的订单404图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('img3', $item['img3']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*建议比例1：1 （72*72）</div>
                </div>

                <!-- <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">动态404图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('img1', $item['img1'])?>
                        <span class="help-block">*建议比例 1：1 （72*72）</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">我的订单404图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('img3', $item['img3'])?>
                        <span class="help-block">*建议比例 1：1 （72*72）</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">我的订单404图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('img3', $item['img3'])?>
                        <span class="help-block">*建议比例 1：1 （72*72）</span>
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">我的订单404文字</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_ueditor('name3',$item['name3']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*小程序仅支持文本和图片排版，复制的请清除格式之后黏贴</div>
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