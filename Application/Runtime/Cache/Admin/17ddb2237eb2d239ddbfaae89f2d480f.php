<?php if (!defined('THINK_PATH')) exit();?><html lang="en" class="no-js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>扬州盛祥碟形弹簧制造有限公司</title>
    <link rel="stylesheet" type="text/css" href="/statics/login/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/statics/login/css/login.css">
    <link rel="stylesheet" type="text/css" href="/statics/login/css/component.css">
    <script src="js/html5.js"></script>
    <style type="text/css">
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-transition-delay: 99999s;
            -webkit-transition: color 99999s ease-out, background-color 99999s ease-out;
        }
    </style></head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header" style="height: 974px;">
            <canvas id="demo-canvas" width="1102" height="974"></canvas>
            <div class="logo_box">
                <h3>扬州盛祥碟形弹簧制造有限公司</h3>
                <form method="post" id="doLogin" action="<?php echo U('Public/tologin');?>">
                    <div class="input_outer">
                        <span class="u_user"></span>
                        <input name="username" class="text" type="text" placeholder="请输入账户">
                    </div>
                    <div id="yzm" class="yzm" style="display: none">
                    <img id='code_img' onclick='this.src=this.src+"&"+Math.random()' src='/api.php?op=checkcode&code_len=4&font_size=20&width=130&height=50&font_color=&background='><br />
                    </div>
                    <div class="input_outer">
                        <span class="us_uer"></span>
                        <input name="password" class="text" type="password" placeholder="请输入密码">
                    </div>
                    <div class="mb2"><a class="act-but submit" href="javascript:doLogin()" style="color: #FFFFFF">登录</a></div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /container -->
<script src="/statics/Hplus/js/jquery.min.js?v=2.1.4"></script>
<script src="/statics/login/js/TweenLite.min.js"></script>
<script src="/statics/login/js/EasePack.min.js"></script>
<script src="/statics/login/js/rAF.js"></script>
<script src="/statics/login/js/demo-1.js"></script>
<script>
  function doLogin() {
    $("#doLogin").submit();
  }
  $(document).keypress(function(e) {
      if (e.which == 13)
          doLogin();
  }) ;
</script>
</body></html>