<?php
namespace Admin\Model;
use Think\Model;

	class UserModel extends Model {
		/**
	     * 构造函数
	     */
	    public function __construct(){
	        parent::__construct();
	    }
	    /**
	     * 查询所有用户信息
	     */
	    public function findUsers(){
	    	$users = M('user');
	    	return $users->field('id,name,tel')->select();
	    }
	    /**
	     * 查看一个用户的信息
	     */
	    public function findUser($where){
	    	$users = M('user');
	    	return $users->where($where)->select();
	    }
	}