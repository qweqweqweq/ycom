<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="/Public/Home/css/mui.css" rel="stylesheet" />
		<link href="/Public/Home/css/mine.css" rel="stylesheet"/>
		<link rel="stylesheet" href="/Public/Home/fonts/iconfont.css" />
	</head>

	<body style="background-color: #FFFFFF;">
	    <script src="/Public/Home/js/jquery-2.1.4.min.js"></script>
		<script src="/Public/Home/js/mui.min.js"></script>
		<script type="text/javascript">
			mui.init()
		</script>
		
<!--header-->
	<div class="widthauto bgwheader conp">
			<div class="width_ns con_justify names">
				<div class="green names" onclick="window.history.go(-1);">
					<span  class="mui-icon mui-icon-back"></span>
					<span>返回</span>
				</div>
				<div class="textcenter black">
					<span>技师登录</span>
				</div>
				<div></div>
			</div>
		</div>
<!--header结束-->
<form method='post' action='<?php echo U('Technician/loginAction');?>'>	
    <div class="widthauto bgwhite mymap4">
			<div class="width_nz con_justify boderbuttom padt" >
				<input type="number"  placeholder="请输入您的手机号"/ id="inputs" class=" widthauto textcenter " name='tel' >
			</div>
			<div class="width_nz con_justify padt boderbuttom" >
				<input type="password"  placeholder="请输入登录密码"/ id="inputs" class=" widthauto textcenter" name='password'>
			</div>
	</div>
     <div class="width_nz mymap2">
			<button class="widthauto padt12  mui-btn-success  login-submit white">登录 </button>
	 </div> 
</form>	 
	 <div class="width_nz mymap2">
			<a href="<?php echo U('Technician/register');?>"><button class="widthauto padt12   white mui-btn-success mui-btn-outlined">没有账号去注册 </button></a>
		</div>
		
	</body>
<script type="text/javascript" src="/Public/Home/js/layer-v2.1/layer.js"></script>
<script type="text/javascript" href="/Public/Home/js/login.js"></script>
</html>