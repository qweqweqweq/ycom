<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\AdminModel;

class LoginController extends MainController {
    /**
     * 构造函数
     */
    public function __construct(){
        parent::__construct();
    }
    /**
     * 登陆页面
     */
    public function toLogin(){
        $this->display('login');
    }
    /**
     * 接收登录信息
     */
    public function loginMessage(){
        if(! parent::isEmpty($_POST)){
            $admins = new AdminModel();
            if(! parent::isEmpty($_POST['username'])){
                $this->error('请填写用户名 !');
            }else if(! parent::isEmpty($_POST['password'])){
                $this->error('请填写密码 !');
            }else if(! $admin = $admins->findAdmin(array('name'=>$_POST['username']))){
                $this->error('用户无效 !');
            }else if(! parent::encrypt($_POST['password']) == $admin[0]['password']){
                $this->error('密码错误 !');
            }else{
                $_SESSION['username'] = ['name'];
                $_SESSION['id'] = ['id'];
                $this->success('登陆成功', U('Index/index'));
            }
        }else{
            $this->error('没有指定参数');
        }
    }
}