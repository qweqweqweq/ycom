<?php
namespace Home\Controller;
use Think\Controller;
use Admin\Controller\MainController;
use Home\Model\UserModel;
/**
 * 用户表
 */
class UserController extends MainController {
	/**
	 * 构造函数
	 */
	public function __construct(){
		parent::__construct();
	}
	/**
	 * 用户的我的
	 */
    public function index(){
    	if($_SESSION['isLogin']){
    		$users = new UserModel();
	    	$where = array('tel'=>$_SESSION['tel']);
	    	$user = $users->findUser($where);
	    	$this->assign('user',$user);
	    	$this->display();
    	}else{
    		$this->error('请登录 !',U('User/login'));
    	}
    }
    /**
	 * 用户登陆页面
	 */
    public function login(){
       $this->display();
    }
    /**
     * 接受用户登录信息
     */
    public function login_message(){
    	if(parent::isEmpty($_POST)){
    		$this->error('没有指定数据 !');
    	}else if(! parent::isEmpty($_POST['tel'])){
    		$this->error('请填写手机号 !');
    	}else if(! parent::isTel($_POST['tel'])){
    		$this->error('请填写有效的手机号 !');
    	}else{
    		if(parent::sendsms($_POST['tel'],4)){
    			$this->success('验证码已发送',U('User/check'));
    			$_SESSION['tel'] = $_POST['tel'];
    			$_SESSION['isLogin'] = false;
    		}else{
    			$this->error('验证码发送失败请稍后重试 !');
    		}
    	}
    }
    /**
     * 用户输入验证码页面
     */
    public function check(){
    	$this->display();
    }
    /**
     * 接受用户输入验证码
     */
    public function check_message(){
    	if(parent::isEmpty($_POST)){
    		$this->error('没有指定数据 !');
    	}else if(parent::isEmpty($_POST['check'])){
    		$this->error('请填写验证码 !');
    	}else if(! parent::transform($_POST['check']) == $_SESSION['check']){
    		$this->error('请填写有效的验证码 !');
    	}else{
    		$_SESSION['isLogin'] = true;
    		$this->saveUser();
    		$this->success('登陆成功 !',U('User/index'));
    	}
    }
    /**
     * 储存当前登录用户
     */
    public function saveUser(){
    	$users = new UserModel();
    	$user['name'] = $_SESSION['tel'];
    	$user['tel'] = $_SESSION['tel'];
    	$_SESSION['id'] = $users->saveUser($user);
    	$this->display('test');
    }
}
