<?php
namespace Home\Model;

class IndentModel extends Model{
	/**
	     * 构造函数
	     */
	    public function __construct(){
	        parent::__construct();
	    }

	    /*
	    *查找订单数根据技师id
	    *
	    */
	    public function findNumByTid($t_id,$flag=true){
	    	$num = $this->where('technician_id='.$t_id)->count();
	    	return $num;
	    }
	     /*
	    *查找最新的两单
	    *
	    */
	     public function findNewTwoIndents($t_id){
	     	$indent_arr = $this->where('technician_id='.$t_id)->order('id desc')->limit('0,2')->select();
	     	return $indent_arr;
	     }
}