<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\AdminModel;
	/**
	 * 管理员控制器
	 * @author 葛兴枫
	 */
	class AdminController extends CommonController{
		/**
	     * 构造函数
	     */
	    public function __construct(){
	        parent::__construct();
	    }
	    /**
	     * 添加管理员
	     */
	    public function addAdmin(){
	    	$this->assign('title','添加管理员');
	    	$this->assign('href','addAdmin');
	      	$this->display();
	    }
	  	/**
	     * 管理员列表方法
	     */
	    public function adminList(){
	    	$this->assign('title','管理员列表');
	    	$this->assign('href','adminList');
	    	$admin = new AdminModel();
	    	$admins = $admin->admins();
		    $pages = parent::pages('admin');
	    	$this->assign('pages',$pages);
	    	$this->assign('admins',$admins);
	      	$this->display();
	    }
	    /**
	     * 接受添加管理员信息
	     */
	    public function addAdminMessage(){
	    	if(! parent::isEmpty($_POST)){
	    		if(! parent::isEmpty($_POST['name'])){
	    			$this->error('请填写管理员姓名 !');
	    		}else if(! parent::isEmpty($_POST['phone'])){
	    			$this->error('请填写管理手机号 !');
	    		}else if(! parent::isEmpty($_POST['password'])){
	    			$this->error('请填写管理员密码 !');
	    		}else if(! parent::isTel($_POST['phone'])){
	    			$this->error('请填写有效的手机号 !');
	    		}else{
	    			$data['phone'] = ''.$_POST['phone'];
	    			$data['name'] = $_POST['name'];
	    			$data['addtime'] = time();
	    			$data['password'] = parent::encrypt($_POST['password']);
	    			$admin = new AdminModel();
	    			$admin->addAdminMessage($data);
	    			$this->success('添加成功 !', 'addAdmin');
	    		}
	    	}else{
	    		$this->error('没有指定参数');
	    	}
	    }
	    /**
	     * 查询单个管理员信息
	     */
	    public function admin($where = array('id'=>1)){
	    	echo '哈哈哈';
	    	if(! parent::isEmpty($where)){
	    		$where = $_GET;
	    	}
			$admin = new AdminModel();
	    	$data = $admin->findAdmin($where);
	    	dump($data);
	    	$this->assign('admin',$data);
	    	$this->display();
	    }
	}