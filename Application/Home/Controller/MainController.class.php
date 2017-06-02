<?php
namespace Home\Controller;
use Think\Controller;
	/**
	 * 父类控制器
	 */
	class MainController extends Controller{
		/**
		 * 构造函数
		 */
		public function __construct(){
			parent::__construct();
			session_start();
		}
		/**
		 * 密码加密方法
		 */
		public function encrypt($str){
			dump($str);
			return md5($str.'密码');
		}
		/**
		 * 判断手机号是否正确
		 */
		public function is_tel($str){
			return preg_match('/^1[34578]\d{9}$/', $str);
		}
		/**
		 * 页面alert显示方法
		 */
		public function alert($str,$href){
			echo "<script>alert('".$str."');location.href='".$href."';</script>";
		}
		/**
		 * 判断是否非空
		 */
		public function is_empty($data){
			if(! isset($data)){
				return false;
			}else if(! trim($data)){
				return false;
			}else if(empty($data)){
				return false;
			}else{
				return true;
			}
		}
		/**
		 * 判断是否等陆
		 */
		public function is_login(){
			if(isset($_SESSION['id'])){
				return true;
			}else{
				return false;
			}
		}
		/**
		 * 分页方法
		 */
		public function pages($table = '',$num = 20,$where = array()){
			$User = M($table); // 实例化User对象
			$count      = $User->where($where)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(20)
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			return $show;
		}
	}
