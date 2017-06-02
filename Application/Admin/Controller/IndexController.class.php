<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

class IndexController extends CommonController {
    /**
     * 构造函数
     */
    public function __construct(){
        parent::__construct();
    }
    /**
     * 首页
     */
    public function index(){
        $this->display();
    }
    /**
     * 登出
     */
    public function exitAdmin(){
        session_unset();
        $this->success('登出成功', U('Login/login'));
    }
}
