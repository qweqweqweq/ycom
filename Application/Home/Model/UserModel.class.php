<?php
namespace Home\Model;
use Think\Model;
	/**
	 * 用户模型
	 */
	class UserModel extends Model {
		/**
	     * 构造函数
	     */
	    public function __construct(){
	        parent::__construct();
	    }
	    /**
	     * 储存当前登录用户
	     */
	    public function saveUser($data){
	    	$users = M('user');
	    	return $users->add($data);
	    }
	    /**
	     * 查询该用户信息
	     */
	    public function findUser($where){
	    	$users = M('user');
	    	return $users->where($where)->select();
	    }
	    /**
	     * 修改用户信息
	     */
	    public function updateUser($data,$where){
	    	$User = M("User"); // 实例化User对象
			$User-> where($where)->setField($data);
	    }
	}