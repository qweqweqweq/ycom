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

	<body>
		<script src="/Public/Home/js/mui.min.js"></script>
		<script type="text/javascript">
			mui.init()
		</script>
		<div class="widthauto bggreen conp white">
			<div class="width_ns con_justify">
				<div>
					<span>青岛</span>
					<span  class="mui-icon mui-icon-arrowdown"></span>
				</div>
				<div class="textcenter">
					<span>我的</span>
				</div>
				<div>
					<span class="iconfont icon-kefu"></span>
				</div>
			</div>
		</div>
		<div class="widthauto bggreen  white">
			<div>
				<img src="/Public/Home/img/usrnamme.png"  class="imgyuan myimg"/>
			</div>
			<div class="textcenter conp">
				账户：<span><?php echo ($user[0]['tel']); ?></span>
			</div>
		</div>
		
<div class="widthauto bgwhite matop00 ">
	<div class="boderbuttom">
		<div class="widthnf con_justify pad8 ">
		<div class="black0">
			用户名
		</div>
		<div class="gray">
			<span><?php echo ($user[0]['tel']); ?></span>
			<i class="mui-icon mui-icon-arrowright"></i>
		</div>
	   </div>	
	</div>
	
	<div>
		<div class="widthnf con_justify pad8">
		<div class="black0">
			手机号
		</div>
		<div class="gray">
			<span><?php echo ($user[0]['tel']); ?></span>
			<i class="mui-icon mui-icon-arrowright"></i>
		</div>
	    </div>	
	</div>		
</div>

<div class="widthauto bgwhite matop00 ">
	<div class="boderbuttom">
		<div class=" con_justify pad8 mui-table-view-cell">
		<div class="black0">
			关于我们
		</div>
		<div class="gray">
			<i class="mui-icon mui-icon-arrowright"></i>
		</div>
	   </div>	
	</div>
	
	<div class="boderbuttom">
		<div class=" con_justify pad8 mui-table-view-cell">
		<div class="black0">
			联系我们
		</div>
		<div class="gray">
			<i class="mui-icon mui-icon-arrowright"></i>
		</div>
	   </div>	
	</div>
</div>

<div class="widthauto bgwhite matop00 ">
	<div class="boderbuttom">
		<div class=" con_justify pad8 mui-table-view-cell">
		<div class="black0">
			卖家中心
		</div>
		<div class="gray">
			<i class="mui-icon mui-icon-arrowright"></i>
		</div>
	   </div>	
	</div>
	
</div>

<div class="widthauto bgwhite mymap3 ">
	<div class="boderbuttom">
		<div class="pad8 mui-table-view-cell textcenter">
		<div class="black0 textcenter">
	        退出登录
		</div>		
	   </div>	
	</div>	
</div>
	</body>
</html>