<?php
namespace Home\Model;
use Think\Model;
	/**
	 * 用户模型
	 */
	class TechnicianModel extends Model {
		/**
	     * 构造函数
	     */
	    public function __construct(){
	        parent::__construct();
	    }
	    /**
	     * 储存当前技师
	     */
	    public function saveTechnician($data){
	    	$technicians = M('technician');
	    	return $technicians->add($data);
	    }
	    /**
	     * 修改指定技师信息
	     */
	    public function updateTechnician($data,$where){
	    	$technicians = M('technician');
	    	return $technicians->where($where)->save($data);
	    }
	    /**
	     * 储存技师技能
	     */
	    public function saveSkills($skills,$where){
	    	$data = array();
	    	foreach ($skills as $key => $value) {
	    		$data[$key]['skill_id'] = $value;
	    		$data[$key]['technician_id'] = $where['id'];
	    	}
	    	$technicians = M('technician_skill');
	    	$technicians->addAll($data);
	    }
	    /*
        *技师登陆
	    */
        public function login($mobile,$password,$flag=ture){
         	$technicians_arr = $this->where('tel="'.$mobile.'" && password ="'.$password.'"')->find();
            if($technicians_arr&&$flag){
            	return $technicians_arr;
            } else{
            	return false;
            }
        }
	}