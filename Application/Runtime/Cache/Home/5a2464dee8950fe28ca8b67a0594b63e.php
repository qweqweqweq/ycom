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

	<body style="background-color:#efeff4;">
		<script src="/Public/Home/js/mui.min.js"></script>
		<script type="text/javascript">
			mui.init()
		</script>
		<!--header-->
		<div class="widthauto bgwheader conp">
			<div class="width_ns con_justify names">
				<div class="green names" onclick="window.history.go(-1);">
					<span  class="mui-icon mui-icon-back" ></span>
					<span>返回</span>
				</div>
				<div class="textcenter black">
					<span>技师注册</span>
				</div>
				<div></div>
			</div>
		</div>
		<!--header-->
		<form action="<?php echo U('Technician/registerMessage');?>" method="post">

		<div class="widthauto bgwhite matop00">
			<div class="width_nz con_justify  boderbuttom names">
				<span class="gray zihao13">登录账号</span>
				<input type="number" name="tel" placeholder="请输入您的手机号" class=" bodernone zihao14" / >
				<button type="submit" name="1" class="pad8 mui-btn-success mui-btn-outlined" style="border-radius: 0;">
					获取验证码
				</button>
			</div>
			<div class="width_nz con_justify pad8" >
				<span class="gray zihao13">验证码　</span>
				<input type="number" name="check" placeholder="输入验证码" class="bodernone zihao13 widthes black "/>
			</div>			
		</div>
		
		<div class="widthauto bgwhite matop00">
			<div class="width_nz con_justify padt boderbuttom" >
				<span class="gray zihao13">密码　　</span>
				<input type="password" name="password" placeholder="输入密码" class="bodernone zihao13 widthes "/ >
			</div>
			<div class="width_nz con_justify padt" >
				<span class="gray zihao13">确认密码</span>
				<input type="password" name="check_password" placeholder="确认密码"  class="bodernone zihao13 widthes "/>
			</div>
		</div>	

		<div class="width_nz mymap4">
			<button type="submit" class="widthauto padt12 white mui-btn-success ">下一步</button>
		</div>
	</form>
	</body>
</html>