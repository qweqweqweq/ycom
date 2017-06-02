<?php
namespace Admin\Model;
use Think\Model;

	class AdminModel extends Model {
		/**
	     * 构造函数
	     */
	    public function __construct(){
	        parent::__construct();
	    }
	    /**
	     * 添加管理员信息
	     */
	    public function addAdminMessage($data){
	    	$admin = D('admin');
	    	$admin->data($data)->add();
	    }
	    /**
	     * 查看所有的管理员信息
	     */
	    public function admins(){
	    	$admin = D('admin');
	    	$result = $admin->select();
	    	return $result;
	    }
	    /**
	     * 根据条件查询管理员
	     */
	    public function findAdmin($data){
	    	$admin = D('admin');
	    	$result = $admin->where($data)->select();
	    	return $result;
	    }
	}