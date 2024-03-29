<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/drr_gy/template/public/ygcss.css">

<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li class="active"><a href="javascript:void(0);">商品信息</a></li>
    <li><a href="<?php  echo $this->createWebUrl('goods');?>"><i class="fa fa-refresh"></i>返回商品列表审核</a></li>
</ul>
<div class="main ygmain">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                商品信息
            </div>
            <div class="panel-body">
                <!-- <div class="form-group" style="width: 90%;margin-left: 15px;">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否显示最新</label>
                    <div class="col-sm-10">
                        <input type="radio" value="2" name="isrecommend" id="isrecommend1" <?php  if($info['isrecommend']==2 ) { ?>checked<?php  } ?> ><label for="isrecommend1">是</label>
                        <input type="radio" value="1" name="isrecommend" id="isrecommend2" <?php  if($info['isrecommend']==1 || empty($info['isrecommend'])) { ?>checked<?php  } ?>><label for="isrecommend2">否</label>
                </div>
                </div> -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="goods_name" class="form-control" value="<?php  echo $info['gname'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品简介</label>
                    <div class="col-sm-9">
                        <input type="text" name="lottery" class="form-control" value="<?php  echo $info['lottery'];?>" />
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="col-sm-2 control-label">所属牧户</label>
                    <div class="col-sm-10">
                        <select name="sid" class="col-md-6" id="groupid">
                            <option value="0">请选择所属牧户</option>
                            <?php  if(is_array($brand)) { foreach($brand as $row) { ?>
                            <option name="unopction" value="<?php  echo $row['id'];?>$$$<?php  echo $row['storename'];?>" <?php  if($info['sid']==$row['id']) { ?> selected<?php  } ?>><?php  echo $row['storename'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*该商品所属那家牧户</div>
                </div> -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">所属分类</label>
                    <div class="col-sm-10">
                        <select name="cid" class="col-md-6" id="groupid">
                            <option value="0">请选择所属分类</option>
                            <?php  if(is_array($storecate)) { foreach($storecate as $row) { ?>
                            <option name="unopction" value="<?php  echo $row['id'];?>" <?php  if($info['cid']==$row['id']) { ?> selected<?php  } ?>><?php  echo $row['name'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*该商品所属哪家分类</div>
                </div>

                <div class="form-group shopprice">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品价格</label>
                    <div class="col-sm-9">
                        <input type="text" name="shopprice" class="form-control" value="<?php  echo $info['price'];?>" style="width: 250px;" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*单位以元为计算</div>
                </div>
                <div class="form-group shopprice">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品原价</label>
                    <div class="col-sm-9">
                        <input type="text" name="oriprice" class="form-control" value="<?php  echo $info['oriprice'];?>" style="width: 250px;" />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*单位以元为计算</div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">虚拟销量</label>
                    <div class="col-sm-9">
                        <input type="text" name="num" class="form-control" value="<?php  echo $info['num'];?>"  style="width: 50px;"/>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*单位以件为计算</div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="sort" class="form-control" value="<?php  if($info) { ?><?php  echo $info['sort'];?><?php  } else { ?>255<?php  } ?>"  style="width: 50px;"/>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*越小越靠前，一般0~255，默认255</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品缩略图</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('pic', $info['pic']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*建议比例1：1 </div>
                </div>
                
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">购买须知</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_ueditor('detail',$info['detail']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*小程序仅支持文本和图片排版，复制的请清除格式之后黏贴</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">规格名</label>
                    <div class="col-sm-9">
                        <input type="text" name="spec" class="form-control" value="<?php  echo $info['spec'];?>" placeholder='尺寸' />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*如尺寸、颜色等等</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">规格内容</label>
                    <div class="col-sm-9">
                        <input type="text" name="speccontent" class="form-control" value="<?php  echo $info['speccontent'];?>"  placeholder='大,中,小'/>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*如规格名为尺寸的话，则可填写为大,中,小，中间的逗号用英文逗号“,”隔开</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">规格库存</label>
                    <div class="col-sm-9">
                        <input type="text" name="specnum" class="form-control" value="<?php  echo $info['specnum'];?>"  placeholder='100,150,200'/>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*规格内容对应的库存，中间的逗号用英文逗号“,”隔开</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">规格价格</label>
                    <div class="col-sm-9">
                        <input type="text" name="specprice" class="form-control" value="<?php  echo $info['specprice'];?>" placeholder='200,150,100' />
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*规格内容对应的价格，中间的逗号用英文逗号“,”隔开</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页封面图</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('indeximg', $info['indeximg']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*建议比例170*170</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">文章封面图</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('img', $info['img']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*建议比例563*194</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">文章详情</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_ueditor('content',$info['content']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*小程序仅支持文本和图片排版，复制的请清除格式之后黏贴</div>
                </div>
                <!-- <div class="form-group video">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">视频图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('video_img', $info['video_img']);?>
                        <span class="help-block">*建议比例 750*422</span>
                    </div>
                </div>
                <div class="form-group video">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">视频</label>
                    <div class="col-sm-9"> 
                        <?php  echo tpl_form_field_video('video', $info['video']);?>
                        <span class="help-block">*建议上传MP4格式，1024M以内视频</span>
                    </div>
                </div> -->
                <div class="form-group" style="width: 90%;margin-left: 15px;" id='img'>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">顶部轮播图</label>
                    <div class="col-sm-10">
                        <div class="col-sm-9">

                            <?php  echo tpl_form_field_multi_image('imgs', $imgs)?>
                        </div>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*建议尺寸：750*750</div>
                    
                </div>
                <!-- <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">文章详情二</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_ueditor('content2',$info['content2']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*小程序仅支持文本和图片排版，复制的请清除格式之后黏贴</div>
                </div>
                <div class="form-group video">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">视频图片二</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('video_img2', $info['video_img2']);?>
                        <span class="help-block">*建议比例 750*422</span>
                    </div>
                </div>
                <div class="form-group video">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">视频二</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_video('video2', $info['video2']);?>
                        <span class="help-block">*建议上传MP4格式，1024M以内视频</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">文章详情三</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_ueditor('content3',$info['content3']);?>
                    </div>
                    <div class="help-block col-sm-push-2 col-sm-12">*小程序仅支持文本和图片排版，复制的请清除格式之后黏贴</div>
                </div>
                <div class="form-group video">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">视频图片三</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('video_img3', $info['video_img3']);?>
                        <span class="help-block">*建议比例 750*422</span>
                    </div>
                </div>
                <div class="form-group video">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">视频三</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_video('video3', $info['video3']);?>
                        <span class="help-block">*建议上传MP4格式，1024M以内视频</span>
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('fenxiangtu', $info['fenxiangtu'])?>
                        <span class="help-block">*建议比例 420*336</span>
                    </div>
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
        $("#frame-2222").show();
        $("#yframe-2222").addClass("wyactive");
    })
</script>
<script type="text/javascript">

    // function getSpecSelect(attr_id,goods_id){
    //     $.ajax({
    //         type:"POST",
    //         url:"<?php  echo $this->createWebUrl('goodsinfo', array('act'=>'ajax','op'=>'getSpecSelect'))?>",
    //         data:{goods_id:goods_id,attr_id:attr_id},
    //         success:function(res){
    //             if(res){
    //                 $('#ajax_spec_data').html(res);
    //             }else{
    //                 //alert('操作失败');
    //             }
    //         }
    //     })
    // }

</script>
<script>
    // var attr_id_arr = '<?php  echo $attr_ids_str;?>';
    // var attr_id_arr = attr_id_arr !='' ? attr_id_arr.split(','):[];
    // if(attr_id_arr.length>0){
    //     attr_id_arr.forEach(function(v,i){
    //         attr_id_arr[i] = parseInt(v);
    //     })
    //     getSpecSelect(attr_id_arr,'<?php  echo $info["id"];?>');
    // }
    // // 属性按钮切换 class
    // $("#ajax_spec_list button").click(function(){
    //     // console.log(1);
    //     if($(this).hasClass('btn-success'))
    //     {
    //         $(this).removeClass('btn-success');
    //         $(this).addClass('btn-default');
    //     }else{
    //         $(this).removeClass('btn-default');
    //         $(this).addClass('btn-success');
    //     }
    //     var specid =  $(this).data('id');
    //     var i = $.inArray(specid,attr_id_arr);
    //     if(i>=0){
    //         attr_id_arr.splice(i,1);

    //     }else{
    //         attr_id_arr.push(specid);
    //     }
    //     console.log(attr_id_arr);
    //     // getSpecSelect(attr_id_arr,'<?php  echo $info["goods_id"];?>');

    // });
</script>
