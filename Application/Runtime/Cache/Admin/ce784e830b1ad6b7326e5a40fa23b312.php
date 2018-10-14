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
          <h5>查看留言管理</h5>
          <div class="ibox-tools">
            <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
              <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="<?php echo U('Apply/index');?>">返回留言管理</a>
              </li>
              </li>
            </ul>
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
          <div style="display: block;" class="ibox-content">
            <form novalidate="novalidate" class="form-horizontal m-t" id="myform" action="" method="get">
              <div class="form-group">
                <label class="col-sm-2 control-label">联系人</label>
                <div class="col-sm-10  control">
                  <input type="text" class="form-control"  value="<?php echo ($detail["name"]); ?>" disabled>
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label">电话</label>
                <div class="col-sm-10  control">
                  <input type="text" class="form-control"  value="<?php echo ($detail["tel"]); ?>" disabled>
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label">公司名称</label>
                <div class="col-sm-10  control">
                  <input type="text" class="form-control"  value="<?php echo ($detail["company"]); ?>" disabled>
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label">邮件地址</label>
                <div class="col-sm-10  control">
                  <input type="text" class="form-control"  value="<?php echo ($detail["email"]); ?>" disabled>
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label">传真</label>
                <div class="col-sm-10  control">
                  <input type="text" class="form-control"  value="<?php echo ($detail["fax"]); ?>" disabled>
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label">地址</label>
                <div class="col-sm-10  control">
                  <input type="text" class="form-control"  value="<?php echo ($detail["address"]); ?>" disabled>
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label">邮编</label>
                <div class="col-sm-10  control">
                  <input type="text" class="form-control"  value="<?php echo ($detail["zip"]); ?>" disabled>
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label">内容</label>
                <div class="col-sm-10  control">
                  <textarea class="form-control" style="width: 100%; min-height: 100px;" disabled><?php echo ($detail["content"]); ?></textarea>
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label">时间</label>
                <div class="col-sm-10  control">
                  <input type="text" value="<?php echo ($detail["add_time"]); ?>" class="form-control" disabled>
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
          <link href="<?php echo ($CSS_PATH); ?>jquery.uploadify.min.jsuploadify.css" rel='stylesheet'>
          <script src="<?php echo ($JS_PATH); ?>jquery.uploadify.min.jsjquery.uploadify.min.js"></script>
<style>
  .uploadesm { width:280px; height:220px; background:#F8F8F8; border:1px solid #C1C1C1; line-height:220px; text-align:center}
  .uploadesm img { width:270px; height:210px;margin-top: -15px;}
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

  $(function () {
// validate signup form on keyup and submit
    var icon = "<i class='fa fa-times-circle'></i> ";
    $("#myform").validate({
      rules: {
        leanname:{
          required: true,
          minlength: 1
        },
        meail:{
          required: true,
          minlength: 1
        }
      },
      messages: {
        leanname:{
          required: icon + "请输入姓名",
          minlength: icon + "姓名不能为空"
        },
        meail: {
          required: icon + "请输入邮箱地址",
          minlength: icon + "邮箱地址不能为空"
        }
      }
    });

  });

  $(function(){

    var link_type = $("#link_type").val();
    if(link_type == 1){
      $("#urltype_wz").addClass("checked");
      $("#urltype_wz").find("input[type=radio]").attr("checked","");
    }else{
      $("#urltype_tp").addClass("checked");
      $("#urltype_tp").find("input[type=radio]").attr("checked","");
      $("#parterlogo").show();
    }

    var link_static = $("#link_static").val();
    if(link_static == 1){
      $("#static_yes").addClass("checked");
      $("#static_yes").find("input[type=radio]").attr("checked","");
    }else{
      $("#static_no").addClass("checked");
      $("#static_no").find("input[type=radio]").attr("checked","");
    }

    $("#urltype_wz").click(function(){
      $(this).addClass("checked");
      $(this).find("input[type=radio]").attr("checked","checked");

      $("#urltype_tp").removeClass("checked");
      $("#urltype_tp").find("input[type=radio]").removeAttr("checked");
      $("#parterlogo").hide();
      $("#link_type").val(1);

    });

    $("#urltype_tp").click(function(){
      $(this).addClass("checked");
      $(this).find("input[type=radio]").attr("checked","checked");

      $("#urltype_wz").removeClass("checked");
      $("#urltype_wz").find("input[type=radio]").removeAttr("checked");
      $("#parterlogo").show();
      $("#link_type").val(2);
    });

    $("#static_yes").click(function(){
      $(this).addClass("checked");
      $(this).find("input[type=radio]").attr("checked","checked");

      $("#static_no").removeClass("checked");
      $("#static_no").find("input[type=radio]").removeAttr("checked");
      $("#link_static").val(1);
    });

    $("#static_no").click(function(){
      $(this).addClass("checked");
      $(this).find("input[type=radio]").attr("checked","checked");

      $("#static_yes").removeClass("checked");
      $("#static_yes").find("input[type=radio]").removeAttr("checked");
      $("#link_static").val(2);
    });


    /*var linkstaic =  $("#linkstatic").val();
     if(linkstaic == 1){
     $("#static_yes").click();
     }else{
     $("#static_no").click();
     }

     var linkurltype =  $("#linkurltype").val();
     if(linkurltype == 1){
     $("#urltype_wz").click();
     }else{
     $("#urltype_tp").click();
     }*/
  });

 /* $('#newsimg').uploadify({
    'auto'     : true,//关闭自动上传
    'removeTimeout' : 1,//文件队列上传完成1秒后删除
    'swf'      : '/Public/js_uploadify/uploadify.swf',
    'uploader' : "/Home/Fileuploade/ajaxupload.html",
    'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
    'buttonText' : '选择图片',//设置按钮文本
    "height"          : 40,
    "width"           : 120,
    'multi'    : false,//允许同时上传多张图片
    'uploadLimit' : 20,//一次最多只允许上传1张图片
    'fileTypeDesc' : 'Image Files',//只允许上传图像
    'fileTypeExts' : '*.gif; *.jpg;*.png;',//限制允许上传的图片后缀
    'fileSizeLimit' : 3*1024,//限制上传的图片不得超过3000K
    'onUploadSuccess':function(file,data,response){
      if(data=='-1'){
        var txt=  "图片上传失败！";
        alert(txt);
      }else{
        $("#thumb").val(data);
        $('#thumbimg').html('');
        var  htmlimg="<img  src='"+data+"'   >";
        $('#thumbimg').html(htmlimg);
      }

    }
  });*/

</script>