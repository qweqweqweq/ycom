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
		
		<div class="widthauto bgwheader conp">
			<div class="width_ns con_justify names">
				<div class="green names">
					<span  class="mui-icon mui-icon-back"></span>
					<span>返回</span>
				</div>
				<div class="textcenter black">
					<span>技师注册</span>
				</div>
				<div></div>
			</div>
		</div>
		<form action="<?php echo U('Technician/registerNextMessage');?>" enctype="multipart/form-data" method="post">
		<div class="widthauto bgwhite matop00">
			<div class="width_nz con_justify padt12 boderbuttom" >
				<span class="gray zihao13">真实姓名</span>
				<input type="text" name="name" placeholder="" id="inputs" class="zihao14 widthes ">
			</div>
			<div class="width_nz con_justify padt12 boderbuttom" >
				<span class="gray zihao13">身份证号</span>
				<input type="text" name="idcard" placeholder="" id="inputs" class="zihao14 widthes ">
			</div>
			<div class="width_nz con_justify padt12 boderbuttom" >
				<span class="gray zihao13">性别</span>
				<input type="text" name="gender" placeholder="" id="inputs" class="zihao14 widthes ">
			</div>
			<div class="width_nz con_justify padt12 boderbuttom" >
				<span class="gray zihao13">年龄</span>
				<input type="text" name="age" placeholder="" id="inputs" class="zihao14 widthes ">
			</div>
			<div class="width_nz con_justify padt12" >
				<span class="gray zihao13">籍贯</span>
				<input type="text" name="native_place" placeholder="" id="inputs" class="zihao14 widthes ">
			</div>
		</div>
		
		<div class="widthauto namescon matop00">			
			<span class="green">▏</span>
			<span class="zihao14">
			上传照片
			</span>
		</div>
	<div class="widthfor con_justify mymap1">
		<div>
		<div class="whf fileadd textcenter">
			<a class="inputa" >
				<input type="file" name="picture[0]" class="inpfiles textcenter zihao16"/>
			</a>
		</div>
		<span class="zihao10 textcenter">上传头像</span>
		</div>
		<div>
		<div class="whf fileadd textcenter">
			<a class="inputa" >
				<input type="file" name="picture[1]" class="inpfiles textcenter zihao16"/>
			</a>
		</div>
		<span class="zihao10 textcenter">身份证正面</span>
		</div>
	</div>

<div class="mui-content bgwhite padt mymap1 boderbuttom">
<div class="width_ns">
    <div class="mui-row ">
        <div class="mui-col-sm-4 mui-col-xs-4">
            <li class="">
               <span class="gray">擅长项目</span>
            </li>
        </div>
        <div class="mui-col-sm-8 mui-col-xs-8 goodietm">
            <li class="">
                <input type="checkbox" name="skill[]" value="1" class="green mymar"/><span>按摩</span>
            </li>
            <li class="">
                <input type="checkbox" name="skill[]" value="2" class="green mymar"/><span>足疗</span>
            </li>
           	 <li class="">
                <input type="checkbox" name="skill[]" value="3" class="green mymar"/><span>推背</span>
            </li>
             <li class="">
                <input type="checkbox" name="skill[]" value="4" class="green mymar"/><span>全身SPA</span>
            </li>
            <li class="clearfix"></li>
        </div>        
    </div>
</div>	    
</div>

<div class="widthauto bgwhite ">	
	<div class="boderbuttom con_justify namescon">
			<div class="pad8  width_nz" >
				<span class="gray zihao13 mymar">服务区域</span>
				<span>晋安区 晋安区 晋安区</span>
			</div>
			<div>
				<span class="mui-icon mui-icon-arrowright gray "></span>
			</div>
	</div>
	<div class="boderbuttom con_justify namescon">
			<div class="pad8  width_nz" >
				<span class="gray zihao13 mymar">服务经验</span>
				<span>2-4年</span>
			</div>
			<div>
				<span class="mui-icon mui-icon-arrowright gray "></span>
			</div>
	</div>
</div>
	
	<div class="width_nz posbottom">
			<button type="submit" class="widthauto padt12 white mui-btn-success ">提交</button>
		</div>

	</body>
	</form>

</html>