<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title><?php echo ((isset($title) && ($title !== ""))?($title):'主页'); ?></title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="">
	<meta name="keyword" content="">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/Admin/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="/Public/Admin/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="/Public/Admin/css/style-responsive.css" rel="stylesheet">
	<link href='/Public/Admin/css/fonts.googleapis.com.css' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="/Public/Admin/css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="/Public/Admin/css/ie9.css" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="/Public/Admin/img/favicon.ico">
	<!-- end: Favicon -->




</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo U('Index/index');?>"><span>按摩后台</span></a>

				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
					<!--
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-bell"></i>
								<span class="badge red">
								7 </span>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have 11 notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">1 min</span>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">7 min</span>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">8 min</span>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">16 min</span>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">36 min</span>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon yellow"><i class="icon-shopping-cart"></i></span>
										<span class="message">2 items sold</span>
										<span class="time">1 hour</span>
                                    </a>
                                </li>
								<li class="warning">
                                    <a href="#">
										<span class="icon red"><i class="icon-user"></i></span>
										<span class="message">User deleted account</span>
										<span class="time">2 hour</span>
                                    </a>
                                </li>
								<li class="warning">
                                    <a href="#">
										<span class="icon red"><i class="icon-shopping-cart"></i></span>
										<span class="message">New comment</span>
										<span class="time">6 hour</span>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">yesterday</span>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">yesterday</span>
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>
							</ul>
						</li>
						-->
						<!-- start: Notifications Dropdown
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-calendar"></i>
								<span class="badge red">
								5 </span>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>You have 17 tasks in progress</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">iOS Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim red">80</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">Android Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim green">47</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim yellow">32</div>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim greenLight">63</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim orange">80</div>
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all tasks</a>
								</li>
							</ul>
						</li>
						-->
						<!-- start: Message Dropdown
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-envelope"></i>
								<span class="badge red">
								4 </span>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="/Public/Admin/img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">

										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="/Public/Admin/img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">

										     </span>
											<span class="time">
										    	56 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="/Public/Admin/img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">

										     </span>
											<span class="time">
										    	3 hours
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="avatar"><img src="/Public/Admin/img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">

										     </span>
											<span class="time">
										    	yesterday
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="/Public/Admin/img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">

										     </span>
											<span class="time">
										    	Jul 25, 2012
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>
							</ul>
						</li>
						-->
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>　账户设置</span>
								</li>
								<!-- <li><a href="#"><i class="halflings-icon user"></i>　简介</a></li> -->
								<li><a href="<?php echo U('Index/exitAdmin');?>"><i class="halflings-icon off"></i>　登出</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header -->

		<div class="container-fluid-full">
		<div class="row-fluid">

			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li>
							<a class="dropmenu" href="#">
								<i class="icon-tasks"></i>
								<span class="hidden-tablet"> 管理员 </span>
							</a>
							<ul>
								<li>
									<a class="submenu" href="<?php echo U('Admin/adminList');?>">
										<i class="icon-list-alt"></i>
										<span class="hidden-tablet">管理员列表</span>
									</a>
								</li>
								<li>
									<a class="submenu" href="<?php echo U('Admin/addAdmin');?>">
										<i class="icon-edit"></i>
										<span class="hidden-tablet">添加管理员</span>
									</a>
								</li>

							</ul>
						</li>
						<li>
							<a class="dropmenu" href="#">
								<i class="icon-tasks"></i>
								<span class="hidden-tablet"> 用户 </span>
							</a>
							<ul>
								<li>
									<a class="submenu" href="<?php echo U('User/users');?>">
										<i class="icon-list-alt"></i>
										<span class="hidden-tablet">用户列表</span>
									</a>
								</li>
							</ul>
						</li>

						<!-- <li><a href="index.html"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a href="messages.html"><i class="icon-envelope"></i><span class="hidden-tablet"> Messages</span></a></li>

						<li><a href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>
						<li><a href="widgets.html"><i class="icon-dashboard"></i><span class="hidden-tablet"> Widgets</span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Dropdown</span><span class="label label-important"> 3 </span></a>
							<ul>
								<li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 1</span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 2</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 3</span></a></li>
							</ul>
						</li>
						<li><a href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
						<li><a href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
						<li><a href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
						<li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
						<li><a href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
						<li><a href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
						<li><a href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
						<li><a href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li> -->
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<!-- start: Content -->
			<div id="content" class="span10">


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="to_index">主页</a>
					<i class="icon-angle-right"></i>
				</li>
				<!-- <li>
					<a href="<?php echo ($href); ?>"><?php echo ($title); ?></a>
					<i class='icon-angle-right'></i>
				</li> -->
				<?php echo ($title_2 ? "<li>
								<a href='$href'> $title </a>
								<i class='icon-angle-right'></i>
							</li>
							<li>
								<a href='$href_2'> $title_2 </a>
							</li>
							" : "<li>
								<a href='$href'>$title</a>
							</li> "); ?>
			</ul>





<!-- 中间内容 start -->

<!-- 占位符 -->


	<div class="row-fluid">
				<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>添加管理员信息</h2>
						<div class="box-icon">

						</div>
					</div>
					<?php dump($user); ?>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo U('');?>" method="post">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="name">用户名 : </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="name" name="name" type="text" value="<?php echo ($user['name']); ?>" disabled>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="phone">手机号 : </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="phone" name="phone" type="text" value="<?php echo ($user['tel']); ?>" disabled>
								</div>
							  </div>
							</fieldset>
						  </form>

					</div>
				</div><!--/span-->

			</div><!--/row-->

			</div>


	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/content.span10-->
		</div><!--/fluid-row-->

	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="" class="btn" data-dismiss="modal">Close</a>
			<a href="" class="btn btn-primary">Save changes</a>
		</div>
	</div>

	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
			</ul>
		</div>
	</div>


<!-- 中间内容结束 end -->


	<div class="clearfix"></div>

	<footer style="clear:both;width:100%;">

		<p>
			<span style="text-align:left;float:left"></span>

		</p>

	</footer>

	<!-- start: JavaScript-->

		<script src="/Public/Admin/js/jquery-1.9.1.min.js"></script>

		<script src="/Public/Admin/js/jquery-migrate-1.0.0.min.js"></script>

		<script src="/Public/Admin/js/jquery-ui-1.10.0.custom.min.js"></script>

		<script src="/Public/Admin/js/jquery.ui.touch-punch.js"></script>

		<script src="/Public/Admin/js/modernizr.js"></script>

		<script src="/Public/Admin/js/bootstrap.min.js"></script>

		<script src="/Public/Admin/js/jquery.cookie.js"></script>

		<script src='/Public/Admin/js/fullcalendar.min.js'></script>

		<script src='/Public/Admin/js/jquery.dataTables.min.js'></script>

		<script src="/Public/Admin/js/excanvas.js"></script>

		<script src="/Public/Admin/js/jquery.flot.js"></script>

		<script src="/Public/Admin/js/jquery.flot.pie.js"></script>

		<script src="/Public/Admin/js/jquery.flot.stack.js"></script>

		<script src="/Public/Admin/js/jquery.flot.resize.min.js"></script>

		<script src="/Public/Admin/js/jquery.chosen.min.js"></script>

		<script src="/Public/Admin/js/jquery.uniform.min.js"></script>

		<script src="/Public/Admin/js/jquery.cleditor.min.js"></script>

		<script src="/Public/Admin/js/jquery.noty.js"></script>

		<script src="/Public/Admin/js/jquery.elfinder.min.js"></script>

		<script src="/Public/Admin/js/jquery.raty.min.js"></script>

		<script src="/Public/Admin/js/jquery.iphone.toggle.js"></script>

		<script src="/Public/Admin/js/jquery.uploadify-3.1.min.js"></script>

		<script src="/Public/Admin/js/jquery.gritter.min.js"></script>

		<script src="/Public/Admin/js/jquery.imagesloaded.js"></script>

		<script src="/Public/Admin/js/jquery.masonry.min.js"></script>

		<script src="/Public/Admin/js/jquery.knob.modified.js"></script>

		<script src="/Public/Admin/js/jquery.sparkline.min.js"></script>

		<script src="/Public/Admin/js/counter.js"></script>

		<script src="/Public/Admin/js/retina.js"></script>

		<script src="/Public/Admin/js/custom.js"></script>
	<!-- end: JavaScript-->

</body>
</html>