<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcss.css">
<ul class="nav nav-tabs">    
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li class="active"><a href="javascript:void(0);">小程序设置</a></li>
</ul>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                系统设置&nbsp;>&nbsp;小程序设置
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序appid：</label>
                    <div class="col-sm-9">
                        <input type="text" name="appid" value="<?php  echo $item['appid'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序appsecret：</label>
                    <div class="col-sm-9">
                        <input type="text" name="appsecret" value="<?php  echo $item['appsecret'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序支付商户号：</label>
                    <div class="col-sm-9">
                        <input type="text" name="mchid" value="<?php  echo $item['mchid'];?>" id="web_name" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序支付Api密钥：</label>
                    <div class="col-sm-9">
                        <input type="text" name="wxkey" value="<?php  echo $item['wxkey'];?>" id="web_name" class="form-control" />
                        <span class="help-block" style="color:red">*请输入微信支付商户后台32位API密钥</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">apiclient_cert.pem: <br><span style="color: red;"><?php  if($item['apiclient_cert']) { ?>(已上传)<?php  } ?></span></label>
                    <div class="col-sm-9">
                        <input type="file"  class="form-control" name="apiclient_cert" id="file1" />
                        <span class="help-block"><?php  echo $item['apiclient_cert'];?></span>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">apiclient_key.pem<br><span style="color: red;"><?php  if($item['apiclient_key']) { ?>(已上传)<?php  } ?></span></label>
                    <div class="col-sm-9">
                        <input type="file"  class="form-control" name="apiclient_key" id="file2" />
                        <span class="help-block"><?php  echo $item['apiclient_key'];?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <input type="submit" name="submit" value="保存设置" class="btn col-lg-3" style="color: white;background-color: #444444;margin-left: 550px;" />
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