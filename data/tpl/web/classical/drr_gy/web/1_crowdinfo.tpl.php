<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcss.css">
<style>

</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li  class="active"><a href="javascript:void(0);">众筹添加</a></li>
    <li><a href="<?php  echo $this->createWebUrl('crowd');?>"><i class="fa fa-refresh"></i>返回众筹列表</a></li>
</ul>
<div class="main ygmain">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                众筹添加
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="sort" class="form-control" value="<?php  echo $info['sort'];?>" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*0-255,根据大小，从小到大排列</div>

                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">众筹名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" value="<?php  echo $info['name'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">众筹简介</label>
                    <div class="col-sm-9">
                        <input type="text" name="lottery" class="form-control" value="<?php  echo $info['lottery'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">项目介绍产品名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="proname" class="form-control" value="<?php  echo $info['proname'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">产品简介</label>
                    <div class="col-sm-9">
                        <input type="text" name="prolottery" class="form-control" value="<?php  echo $info['prolottery'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">所属牧户</label>
                    <div class="col-sm-10">
                        <select name="storeid" class="col-md-6" id="groupid">
                            <option value="0">请选择所属牧户</option>
                            <?php  if(is_array($store)) { foreach($store as $row) { ?>
                            <option name="unopction" value="<?php  echo $row['id'];?>" <?php  if($info['storeid']==$row['id']) { ?> selected<?php  } ?>><?php  echo $row['storename'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*如不选择，则默认平台发布</div>
                </div>
                <!-- <div class="form-group shopprice">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">众筹价格</label>
                    <div class="col-sm-9">
                        <input type="text" name="price" class="form-control" value="<?php  echo $info['price'];?>" style="width: 250px;" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*单位以元为计算</div>
                </div> -->
                <div class="form-group shopprice">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">限定数量</label>
                    <div class="col-sm-9">
                        <input type="text" name="count" class="form-control" value="<?php  echo $info['count'];?>" style="width: 250px;" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*每个用户所能购买的限定数量</div>
                </div>
                <!-- <div class="form-group shopprice">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">人数上限</label>
                    <div class="col-sm-9">
                        <input type="text" name="num" class="form-control" value="<?php  echo $info['num'];?>" style="width: 250px;" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*单位以元为计算</div>
                </div> -->
                <div class="form-group shopprice">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">虚拟数量</label>
                    <div class="col-sm-9">
                        <input type="text" name="vir" class="form-control" value="<?php  echo $info['vir'];?>" style="width: 250px;" />
                    </div>
                    <!-- <div class="help-block col-sm-push-2 col-sm-12">*填写虚拟数量后，须在牧户管理处添加虚拟牧户 </div> -->
                </div>
                <div class="form-group shopprice">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">发起数量</label>
                    <div class="col-sm-9">
                        <input type="text" name="lower" class="form-control" value="<?php  echo $info['lower'];?>" style="width: 250px;" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*需加上虚拟数量 </div>
                </div>
                <div class="form-group shopprice">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">截止数量</label>
                    <div class="col-sm-9">
                        <input type="text" name="top" class="form-control" value="<?php  echo $info['top'];?>" style="width: 250px;" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*需加上虚拟数量 </div>
                </div>
                <div class="form-group shopprice">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">众筹天数</label>
                    <div class="col-sm-9">
                        <input type="text" name="day" class="form-control" value="<?php  echo $info['day'];?>" style="width: 250px;" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*项目通过审核后，从当前时间算起，开始倒数 </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">档位价格一</label>
                    <div class="col-sm-9">
                        <input type="text" name="gearone" class="form-control" value="<?php  echo $info['gearone'];?>" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12"></div>
                    
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">档位介绍一</label>
                    <div class="col-sm-9">
                        <input type="text" name="introone" class="form-control" value="<?php  echo $info['introone'];?>" />
                    </div>
                    
                </div>
<!--2-->
                <div class="form-group step1" hidden>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">档位价格二</label>
                    <div class="col-sm-9">
                        <input type="text" name="geartwo" class="form-control" value="<?php  echo $info['geartwo'];?>" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12"></div>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">档位介绍二</label>
                    <div class="col-sm-9">
                        <input type="text" name="introtwo" class="form-control" value="<?php  echo $info['introtwo'];?>" />
                    </div>
                </div>
<!--3-->
                <div class="form-group step2"  hidden>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">档位价格三</label>
                    <div class="col-sm-9">
                        <input type="text" name="gearthree" class="form-control" value="<?php  echo $info['gearthree'];?>" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12"></div>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">档位介绍三</label>
                    <div class="col-sm-9">
                        <input type="text" name="introthree" class="form-control" value="<?php  echo $info['introthree'];?>" />
                    </div>
                </div>
<!--4-->
                <div class="form-group step3 " hidden>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">档位价格四</label>
                    <div class="col-sm-9">
                        <input type="text" name="gearfour" class="form-control" value="<?php  echo $info['gearfour'];?>" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12"></div>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">档位介绍四</label>
                    <div class="col-sm-9">
                        <input type="text" name="introfour" class="form-control" value="<?php  echo $info['introfour'];?>" />
                    </div>
                </div>
<!--5-->
                <div class="form-group step4 " hidden>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">档位价格五</label>
                    <div class="col-sm-9">
                        <input type="text" name="gearfive" class="form-control" value="<?php  echo $info['gearfive'];?>" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12"></div>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">档位介绍五</label>
                    <div class="col-sm-9">
                        <input type="text" name="introfive" class="form-control" value="<?php  echo $info['introfive'];?>" />
                    </div>
                </div>
                <div class="form-group addStep1">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class='col-sm-9'>
                        <button  type="button" class="btn btn-default addStep">更多档位</button>
                        
                    </div>
                </div>

                <div class="form-group" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('img', $info['img']);?>
                        <span class="help-block">*建议比例 120*120</span>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">详情顶部选择</label>
                    <div class="col-sm-10">
                         <label class="radio-inline">
                            <input onchange="check(this)" type="radio" id="emailwy1" name="state" value="1" <?php  if($info['state']==1 || empty($info['state'])) { ?>checked<?php  } ?> />
                            <label for="emailwy1">轮播图</label>
                        </label>
                        <label class="radio-inline">
                            <input onchange="check(this)" type="radio" id="emailwy2" name="state" value="2" <?php  if($info['state']==2) { ?>checked<?php  } ?> />
                            <label for="emailwy2">视频</label>
                        </label>
                    </div>
                </div> -->
                <div class="form-group" style="width: 90%;margin-left: 15px;" id='img'>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">轮播图</label>
                    <div class="col-sm-10">
                        <div class="col-sm-9">

                            <?php  echo tpl_form_field_multi_image('imgs', $imgs)?>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="form-group video">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">视频封面图</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('video_img', $info['video_img']);?>
                        <span class="help-block">*建议比例 710*440</span>
                    </div>
                </div>
                <div class="form-group video">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页视频</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_video('video', $info['video']);?>
                        <span class="help-block">*建议上传MP4格式，1024M以内视频</span>
                    </div>
                </div> -->
                <!-- <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">众筹主图</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('pic', $info['pic']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*建议比例1：1 （222*222）</div>
                </div> -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">众筹标签</label>
                    <div class="col-sm-9">
                        <input type="text" name="label" class="form-control" value="<?php  echo $info['label'];?>" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*每个标签之间，用英文逗号“,”隔开</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">众筹缩略图</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('pic', $info['pic']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*建议比例1：1 （180*180）</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">项目介绍</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_ueditor('content',$info['content']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*小程序仅支持文本和图片排版，复制的请清除格式之后黏贴</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">认养协议标题</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" value="<?php  echo $info['title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">认养协议</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_ueditor('agreement',$info['agreement']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*小程序仅支持文本和图片排版，复制的请清除格式之后黏贴</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">认养须知</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_ueditor('detail',$info['detail']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*小程序仅支持文本和图片排版，复制的请清除格式之后黏贴</div>
                </div>
            </div>
      </div>
  </div>
        <div class="form-group">
            <input type="submit" name="submit" value="保存设置" class="btn col-lg-3" style="color: white;background-color: #444444;margin-left: 550px;"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
             <input type="hidden" name="id" value="<?php  echo $info['id'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-555").show();
        $("#yframe-555").addClass("wyactive");
        var state= $('input[name="state"]:checked').val();
        if(state==1){
            $('#img').show();
            $('.video').hide();
        }else if(state==2){
            $('#img').hide();
            $('.video').show();
        }
        "<?php  if($info) { ?>"
            "<?php  if($info['geartwo']!='0') { ?>"
                $('.step1').removeAttr('hidden');
            "<?php  } ?>"
            "<?php  if($info['gearthree']!='0') { ?>"
                $('.step2').removeAttr('hidden');
                
            "<?php  } ?>"
            "<?php  if($info['gearfour']!='0') { ?>"
                $('.step3').removeAttr('hidden');
            "<?php  } ?>"    
            "<?php  if($info['gearfive']!='0') { ?>"
                $('.step4').removeAttr('hidden');
            "<?php  } ?>" 
            "<?php  if($info['gearfive']!='0'&&$info['geartwo']!='0'&&$info['gearthree']!='0'&&$info['gearfour']!='0') { ?>"
                $('.addStep').attr('style','display:none');
                $('.addStep1').attr('style','display:none');
            "<?php  } ?>"      
        "<?php  } ?>"

        
    })
    function check() {
        var state= $('input[name="state"]:checked').val();
        if(state==1){
            $('#img').show();
            $('.video').hide();
        }else if(state==2){
            $('#img').hide();
            $('.video').show();
        }
    }
    var num = 0;
    $(".addStep").on('click',function(event){
           num++;
        if(num==1){
            $('.step1').removeAttr('hidden');
        }
        else if(num==2){
            $('.step2').removeAttr('hidden');
        }
        else if(num==3){
            $('.step3').removeAttr('hidden');
        }
        else if(num==4){
            console.log(num);
            $('.step4').removeAttr('hidden');
            $('.addStep').attr('style','display:none');
            $('.addStep1').attr('style','display:none');
        }
    })

</script>

