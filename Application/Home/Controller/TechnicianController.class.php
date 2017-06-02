<?php
namespace Home\Controller;
use Think\Controller;
use Admin\Controller\MainController;
use Home\Model\TechnicianModel;
/**
 * 用户表
 */
class TechnicianController extends MainController {
	/**
	 * 构造函数
	 */
	public function __construct(){
		parent::__construct();
	}
	/**
	 * 技师的我的
	 */
	public function index(){
		$this->display();
	}
	/**
	 * 技师注册页面
	 */
	public function register(){
		$this->display();
	}
	/**
	 * 技师获取验证码
	 */
	public function gainauth(){
		parent::sendsms($POST['tel'],4);
	}
	/**
	 * 接受技师注册页信息
	 */
	public function registerMessage(){
        var_dump(parent::isEmpty(array()));
        var_dump(parent::isEmpty(array(1,2,3)));
        die();
		if(！parent::isEmpty($_POST)){
			$this->error('缺少指定参数 !');
		}else if(parent::isEmpty($_POST['1'])){
			$this->gainauth();
			$this->succeed('验证码已发送 !');
		}else if(! parent::isEmpty($_POST['tel'])){
			$this->error('请填写手机号 !');
		}else if(! parent::isEmpty($_POST['check'])){
			$this->error('请填写验证码 !');
		}else if(! parent::isEmpty($_POST['password'])){
			$this->error('请填写密码 !');
		}else if(! parent::isEmpty($_POST['check_password'])){
			$this->error('请填写确认密码 !');
		}else if(! parent::isTel($_POST['tel'])){
			$this->error('请填写有效的手机号 !');
		}else if(! $_SESSION['check'] == $_POST['check']){
			$this->error('请填写正确的验证码 !');
		}else if( $_POST['password'] !== $_POST['check_password']){
			$this->error('两次密码不相同,请确定后提交 !');
		}else{
			$technician['tel'] = $_POST['tel'];
			$technician['password'] = parent::encrypt($_POST['tel']);
			$technicians = new TechnicianModel();
			$_SESSION['t_id'] = $technicians->saveTechnician($technician);
			//$this->success('登陆成功 !',U('User/index'));
			$this->success('请前往下一步注册',U('Technician/registerNext'));
		}
	}
	/**
	 * 技师注册下一步页面
	 */
	public function registerNext(){
		$this->display();
	}
	/**
	 * 接受下一步的信息
	 */
	public function registerNextMessage(){
		/*dump($_POST);
		die;*/
		if(! parent::isEmpty($_POST)){
			$this->error('缺少指定参数 !');
		}else if(! parent::isEmpty($_POST['name'])){
			$this->error('请填写真实姓名 !');
		}else if(! parent::isEmpty($_POST['idcard'])){
			$this->error('请填写身份证号 !');
		}else if(! parent::isEmpty($_POST['gender'])){
			$this->error('请填写性别 !');
		}else if(! parent::isEmpty($_POST['age'])){
			$this->error('请填写年龄 !');
		}else if(! parent::isEmpty($_POST['native_place'])){
			$this->error('请填写籍贯 !');
		}else if(! parent::isEmpty($_POST['skill'])){
			$this->error('请选择技能 !');
		}else if(! parent::isIdcard($_POST['idcard'])){
			$this->error('请填写有效的身份证号 !');
		}else{
			$technician['name'] = $_POST['name'];
			$technician['idcard'] = $_POST['idcard'];
			$technician['age'] = $_POST['age'];
			$technician['gender'] = $_POST['gender'];
			$technician['native_place'] = $_POST['native_place'];
		
			$technicians = new TechnicianModel();
			$_SESSION['t_id'] = $technicians->updateTechnician($technician);
		}
	}
	/*
	*技师密码登陆
	*/
	public function loginAction(){
		if(! parent::isEmpty($_POST)){
			$this->error('缺少指定参数 !');
		}else if(! parent::isEmpty($_POST['tel'])){
			$this->error('请填写手机号 !');
		}else if(! parent::isEmpty($_POST['password'])){
			$this->error('请填写密码 !');
		}else if(! parent::isTel($_POST['tel'])){
			$this->error('请填写有效的手机号 !');
		}else{
			$technician['tel'] = $_POST['tel'];
			$technician['password'] = parent::encrypt($_POST['tel']);
			$technician_arr = D('technician')->login($technician['tel'],$technician['password']);
			$_SESSION['t_id'] = $technician_arr['id'];   //$technicians->saveTechnician($technician);
			$this->succeess('登陆成功','Technician/index');
		}
	}
	/**
	 * 技师登录页面
	 */
	public function login(){
        $this->display();
	}
}
