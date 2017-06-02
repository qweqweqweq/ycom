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
		<script src="/Public/Home/js/mui.min.js"></script>
		<script type="text/javascript">
			mui.init()
		</script>
		<div class="widthauto bgwheader conp">
			<div class="width_ns con_justify names">
				<div class="green names" onclick="window.history.go(-1);">
					<span  class="mui-icon mui-icon-back"></span>
					<span>返回</span>
				</div>
				<div class="textcenter black">
					<span>手机验证</span>
				</div>
				<div></div>
			</div>
		</div>	
		<form action="<?php echo U('User/check_message');?>" method="post">
			<div class="widthauto bgwhite textcenter phpad">
				<div class="zihao16" class="textcenter">输入验证码</div>
			</div>
			<div class="width_ns textcenter">
				<div>我们已向 <span><?php echo ($_SESSION['phone']); ?></span>发送验证码短信，请输入短信验证码</div>
			</div>
			
		<div class="widthes con_justify mymap1">
			<div class="wh">
				<input type="number" name="check[]" class="whinput textcenter zihao16" oninput="if(value.length>1) value=value.slice(0,1)"/  >
			</div>
			<div class="wh">
				<input type="number" i name="check[]" class="whinput textcenter zihao16" oninput="if(value.length>1) value=value.slice(0,1)"/>
			</div>
			<div class="wh">
				<input type="number"  name="check[]" class="whinput textcenter zihao16" oninput="if(value.length>1) value=value.slice(0,1)"/>
			</div>
			<div class="wh">
				<input type="number"  name="check[]" class="whinput textcenter zihao16" oninput="if(value.length>1) value=value.slice(0,1)"/>
			</div>
		</div>
			<div class="width_nz mymap2">
				<button class="widthauto padt12  mui-btn-success mui-btn-outlined " type="submit">登录 </button>
			</div>
		</form>
	</body>

</html>