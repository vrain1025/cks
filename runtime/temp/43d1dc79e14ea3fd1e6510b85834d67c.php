<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"E:\UPUPW_NP5.6\htdocs\cks2\public/../apps/index\view\login\login.html";i:1542869638;s:59:"E:\UPUPW_NP5.6\htdocs\cks2\apps\index\view\common\head.html";i:1542949776;}*/ ?>
<!doctype html>
<html lang="en">

<head>
<title>:: 中橡狼牌轮胎 :: </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="中橡狼牌轮胎 仓库管理系统">
<meta name="author" content="系统制作, design by: 谷川">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="/static/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/static/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="/static/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/static/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
<link rel="stylesheet" href="/static/vendor/chartist/css/chartist.min.css">
<link rel="stylesheet" href="/static/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
<link rel="stylesheet" href="/static/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="/static/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="/static/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<link rel="stylesheet" href="/static/vendor/multi-select/css/multi-select.css">
<link rel="stylesheet" href="/static/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">
<link rel="stylesheet" href="/static/vendor/nouislider/nouislider.min.css" />
<!-- MAIN CSS -->
<link rel="stylesheet" href="/static/css/main.css">
<link rel="stylesheet" href="/static/css/color_skins.css"></head>





<body class="theme-blue">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box" >
                    <div class="mobile-logo"><a href="index.html"><img src="/static/images/logo-icon.svg" alt="Mplify"></a></div>
                    <div class="auth-left">
                        <div class="left-top">
                            <a href="index.html">
                                <img src="/static/images/logo-icon.svg" alt="中橡狼牌轮胎">
                                <span>中橡狼牌轮胎</span>
                            </a>
                        </div>
                        <div class="left-slider">
                            <img src="/static/images/login/1.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="auth-right" ">
         <!--                <div class="right-top">
                            <ul class="list-unstyled clearfix d-flex">
                                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li><a href="javascript:void(0);">Help</a></li>
                                <li><a href="javascript:void(0);">Contact</a></li>
                            </ul>
                        </div> -->
                        <div class="card">
                            <div class="header">
                                <p class="lead">系统登陆</p>
                            </div>
                            <div class="body">
                                <form class="form-auth-small" action="" method="post">
                                    <div class="form-group">
                                        <label for="username" class="control-label sr-only">用户名</label>
                                        <input type="text" class="form-control" id="username" name="username" value="" placeholder="用户名">
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-password" class="control-label sr-only">密码</label>
                                        <input type="password" class="form-control" id="signin-password" value="" name="password" placeholder="密码">
                                    </div>
                                           <div class="form-group clearfix">
                                        <label for="captcha" class="control-label sr-only" >验证码</label>
                                        <input type="text" class="form-control" name="captcha" placeholder="验证码" style="width: 150px;float: left;"> 
                                        <img src="<?php echo captcha_src(); ?>" alt="captcha"  onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();"  style="float: left;margin-left: 20px;" />
                                    </div>
                                     
                                    <div class="form-group clearfix">
                                        <label class="fancy-checkbox element-left">
                                            <input type="checkbox">
                                            <span>记住密码</span>
                                        </label>								
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                    <div class="bottom">                                       
                                        <span>如果没有帐号、或忘记密码请联系管理员</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
