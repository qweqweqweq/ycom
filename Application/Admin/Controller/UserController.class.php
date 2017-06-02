<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\UserModel;
	/**
	 * 管理员控制器
	 * @author 葛兴枫
	 */
	class UserController extends CommonController{
		/**
	     * 构造函数
	     */
	    public function __construct(){
	        parent::__construct();
	    }
	    /**
	     * 打开用户列表页面
	     */
	    public function users(){
	    	$this->assign('title','用户列表');
	    	$this->assign('href',U('User/users'));
	    	$users = new UserModel();
	    	$pages = parent::pages('user');
	    	$this->assign('pages',$pages);
	    	$data = $users->findUsers();
	    	$this->assign('users',$data);
	    	$this->display();
	    }
	    /**
	     * 查看某用户详细信息
	     */
	    public function user(){
	    	$this->assign('title','用户列表');
	    	$this->assign('href',U('User/user'));
	    	$users = new UserModel();
	    	$where['id'] = $_GET['id'];
	    	$data = $users->findUser($where);
	    	$this->assign('user',$data);
	    	$this->display();
	    }
	}