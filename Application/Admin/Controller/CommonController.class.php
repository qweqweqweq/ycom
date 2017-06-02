<?php
namespace Admin\Controller;
use Think\Controller;
	/**
	 * 父类控制器
	 */
	class CommonController extends MainController{
		/**
		 * 构造函数
		 */
		public function __construct(){
			parent::__construct();
			parent::isLogin();
		}
	}