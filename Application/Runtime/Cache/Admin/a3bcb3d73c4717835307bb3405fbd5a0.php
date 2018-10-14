<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <link rel="shortcut icon" href="favicon.ico">
<link href="/statics/Hplus/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="/statics/Hplus/css/font-awesome.css?v=4.4.0" rel="stylesheet">
<link href="/statics/Hplus/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="/statics/Hplus/css/animate.css" rel="stylesheet">
<link href="/statics/Hplus/css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        <?php if($ad['ad_id'] != null): ?>修改
                            <?php else: ?>
                            添加<?php endif; ?>
                        广告
                    </h5>
                    <div class="ibox-tools">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo U('Ads/index');?>">返回广告管理</a>
                            </li>
                            </li>
                        </ul>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div style="display: block;" class="ibox-content">
                    <form novalidate="novalidate" class="form-horizontal m-t" id="myform" action="" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">广告名称</label>
                            <div class="col-sm-10  control">
                                <input type="text" name="ad_name" class="form-control" id="ad_name"
                                       value="<?php echo ($ad["ad_name"]); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">广告类型</label>
                            <div class="col-sm-10  control">

                                <div class="iradio_square-green"
                                     style="position: relative;margin-top: 5px;margin-left: 20px;" id="ggtype_wz">
                                    <input type="radio" style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <i></i>文字广告

                                <div class="iradio_square-green"
                                     style="position: relative;margin-top: 5px;margin-left: 20px;" id="ggtype_tp">
                                    <input type="radio" style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <i></i>图片广告

                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">广告位置</label>
                            <div class="col-sm-10 ">
                                <select class="form-control m-b" name="ad_adp_id" id="ad_adp_id">
                                    <?php if(is_array($articles)): foreach($articles as $key=>$li): ?><option value='<?php echo ($li["adp_id"]); ?>'
                                        <?php if(($ad['ad_adp_id']) == $li['adp_id']): ?>selected<?php endif; ?>
                                        > <?php echo ($li['adp_name']); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">广告描述</label>
                            <div class="col-sm-10  control">
                                <textarea name="ad_desc" maxlength="200" class="form-control" rows="2" cols="20"><?php echo ($ad["ad_desc"]); ?></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div style="display: none" id="parterlogo">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">上传广告</label>
                                <div class="col-sm-8">
                                    <!--用来存放item-->
                                    <div id="fileList" class="uploader-list">
                                        <div class="file-item thumbnail">
                                            <?php if($ad[ad_file]): ?><img src="<?php echo ($ad["ad_file"]); ?>"><?php endif; ?>
                                        </div>
                                    </div>
                                    <input type="hidden" name="ad_file" id="filepath" value="<?php echo ($ad["ad_file"]); ?>">
                                    <div id="filePicker">选择图片</div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">广告链接</label>
                            <div class="col-sm-10  control">
                                <input type="url" name="ad_link" class="form-control" id="ad_link"
                                       value="<?php echo ($ad["ad_link"]); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否开启</label>
                            <div class="col-sm-10 ">
                                <select class="form-control m-b" name="ad_status">
                                    <option value="1"
                                    <?php if($ad['ad_status'] == 1 ): ?>selected<?php endif; ?>
                                    >开启</option>
                                    <option value="2"
                                    <?php if($ad['ad_status'] == 2 ): ?>selected<?php endif; ?>
                                    >关闭</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-10  control">
                                <input type="text" name="ad_order" class="form-control" id="ad_order"
                                       value="<?php echo ($ad["ad_order"]); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">广告联系人</label>
                            <div class="col-sm-10  control">
                                <input type="text" name="ad_link_man" class="form-control" id="ad_link_man"
                                       value="<?php echo ($ad["ad_link_man"]); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系人备注</label>
                            <div class="col-sm-10  control">
                                <textarea id="ad_link_note" name="ad_link_note" class="form-control" rows="2" cols="20"><?php echo ($ad["ad_link_note"]); ?></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input type="hidden" name="id" value="<?php echo ($ad["ad_id"]); ?>"/>
                                <input type="hidden" name="ad_type" id="ad_type" value="<?php echo ($ad["ad_type"]); ?>"/>
                                <input name="dosubmit" type="submit" value="提交" class="btn btn-primary" id="dosubmit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 全局js -->
<script src="/statics/Hplus/js/jquery.min.js?v=2.1.4"></script>
<script src="/statics/Hplus/js/bootstrap.min.js?v=3.3.6"></script>
<!-- 自定义js -->
<script src="/statics/Hplus/js/content.js?v=1.0.0"></script>
<!-- jQuery Validation plugin javascript-->
<script src="/statics/Hplus/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/statics/Hplus/js/plugins/validate/messages_zh.min.js"></script>
<!-- iCheck -->
<script src="/statics/Hplus/js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
<link href='/Public/uploader/webuploader.css' rel='stylesheet'>
<script src="/Public/uploader/webuploader.js"></script>
<style>
    .thumbnail {
        min-width: 320px;
        min-height: 240px;
        background: #F8F8F8;
        border: 1px solid #C1C1C1;
        line-height: 250px;
        text-align: center
    }
    .thumbnail img {
        min-width: 310px;
        min-height: 230px;
    }
</style>
</body>
</html>
<script>
  $.validator.setDefaults({
    highlight: function (element) {
      $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
      element.closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
      if (element.is(":radio") || element.is(":checkbox")) {
        error.appendTo(element.parent().parent().parent());
      } else {
        error.appendTo(element.parent());
      }
    },
    errorClass: "help-block m-b-none",
    validClass: "help-block m-b-none"
  });

  // 正整数验证
  jQuery.validator.addMethod("isBiggerThanZero", function (value, element) {
    return this.optional(element) || /^[1-9]\d*$/.test(value);
  }, "只能输入正整数");

  $(function () {
// validate signup form on keyup and submit
    var icon = "<i class='fa fa-times-circle'></i> ";
    $("#myform").validate({
      rules: {
        ad_name: {
          required: true,
          minlength: 1
        }
      },
      messages: {
        adp_name: {
          required: icon + "请输入广告位名称",
          minlength: icon + "广告位不能为空"
        }
      }
    });
  });

  $(function () {

    var ad_type = $("#ad_type").val();
    if (ad_type == 1) {

      $("#ggtype_tp").addClass("checked");
      $("#ggtype_tp").find("input[type=radio]").attr("checked", "");
      $("#parterlogo").show();
    } else {
      $("#ggtype_wz").addClass("checked");
      $("#ggtype_wz").find("input[type=radio]").attr("checked", "");
    }

    $("#ggtype_wz").click(function () {
      $(this).addClass("checked");
      $(this).find("input[type=radio]").attr("checked", "checked");

      $("#ggtype_tp").removeClass("checked");
      $("#ggtype_tp").find("input[type=radio]").removeAttr("checked");
      $("#parterlogo").hide();
      $("#ad_type").val(2);

    });

    $("#ggtype_tp").click(function () {
      $(this).addClass("checked");
      $(this).find("input[type=radio]").attr("checked", "checked");

      $("#ggtype_wz").removeClass("checked");
      $("#ggtype_wz").find("input[type=radio]").removeAttr("checked");
      $("#parterlogo").show();
      $("#ad_type").val(1);
    });
    var uploader = WebUploader.create({
      auto: true,
      // swf文件路径
      swf: '/Public/uploader/Uploader.swf',
      // 文件接收服务端。
      server: '/Admin/Fileuploade/ajax_upload.html',
      // 选择文件的按钮。可选。
      // 内部根据当前运行是创建，可能是input元素，也可能是flash.
      pick: '#filePicker',
      // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
      resize: false,
      multiple: false,
      duplicate: true,
      // 只允许选择图片文件。
      accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
      }
    });
    uploader.on('uploadSuccess', function (file, data) {
      var $li = $(
          '<div class="file-item thumbnail">' +
          '<img src="' + data.src + '">' +
          '</div>'
      )
      $("#fileList").html($li);
      $("#filepath").val(data.src);
    });
    uploader.on('uploadError', function (file) {
      alert('上传出错');
    });
  });
</script>