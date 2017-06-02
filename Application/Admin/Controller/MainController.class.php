<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
	/**
	 * 父类控制器
	 */
	class MainController extends Controller{
		/**
		 * 构造函数
		 */
		public function __construct(){
			parent::__construct();
			session_start();
			date_default_timezone_set("PRC");
			ini_set('date.timezone','Asia/Shanghai');
		}
		/**
		*d单图片上传
		*/
		public function upload(){
            $rootPath = './Public/upload/';

            $path = $rootPath.date('Y').'/'.date('md').'/';
            @mkdir($path, 0777, true);

            $upload = new Upload();
            $upload->maxSize   =     5 * 1024 * 1024 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     $path; // 设置附件上传根目录
            $upload->subName   =     ''; //
            $upload->saveName  =     array('uniqid',''); //

            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {
                // 上传错误提示错误信息
            	return $upload->getError();
                //$this->ajaxReturn(array('status'=>1,'data'=>$upload->getError()));
            }else{
            // 上传成功
            //保存数据库的路径
                $fileName=substr($path.$info['file']['savename'],1);
            //模板的路径
                $view_filename='http://'.$_SERVER['HTTP_HOST'].$fileName;
                return $view_filename;
                //$this->ajaxReturn(array('status'=>0,'data'=>$fileName,'view'=>$view_filename));
            }

        }
        /*
         * 多图片上传
         */
function upload_pics(){
    $upload = new \Think\Upload();
    $rootPath='./Public/upload/';
    $path = $rootPath.date('Y').'/'.date('md').'/';
    @mkdir($path, 0777, true);
    $upload->maxSize   =     5 * 1024 * 1024 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =     $path; // 设置附件上传根目录
    $upload->subName   =     ''; //
    $upload->saveName  =     array('uniqid','');
    $info   =   $upload->upload();
    if(!$info){
        $msg = $upload->getError();
        output(1,$msg);
        die();
    }else{
        $data = array();
        foreach($info as $key => $value){
            $Filename=substr($path.$value['savename'],1);
            $data[]= 'http://'.$_SERVER['HTTP_HOST'].$Filename;//这里以获取在本地的保存路径为例
        }
    }
    return $data;
}
		/**
		 * 密码加密方法
		 */
		public function encrypt($str){
			return md5($str.'密码');
		}
		/**
		 * 判断手机号是否正确
		 */
		public function isTel($str){
			return preg_match('/^1[34578]\d{9}$/', $str);
		}
		/**
		 * 判断是否是有效的身份证号
		 */
		public function isIdcard($str){
			return preg_match('/^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/', $str);
		}
		/**
		 * 页面alert显示方法
		 */
		public function alert($str,$href){
			echo "<script>alert('".$str."');location.href='".$href."';</script>";
		}
		/**
		 * 判断是否非空
		 */
		public function isEmpty($data){
			if(! isset($data)){
				return false;
			}else if( trim($data)){
				return false;
			}else if(empty($data)){
				return false;
			}else{
				return true;
			}
		}
		/**
		 * 判断是否等陆
		 */
		public function isLogin(){
			if(isset($_SESSION['id'])){
				return true;
			}else{
				return false;
			}
		}
		/**
		 * 分页方法
		 */
		public function pages($table = '',$num = 20,$where = array()){
			$User = M($table); // 实例化User对象
			$count      = $User->where($where)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(20)
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			return $show;
		}
		/**
	     * 生成随机数
	     *
	     */
	    public function random($v = 6){
	        srand((double)microtime()*1000000);//create a random number feed.
	        $ychar="0,1,2,3,4,5,6,7,8,9";
	        //$ychar="0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
	        $list=explode(",",$ychar);
	        for($i=0; $i<$v; $i++){
	            $randnum=rand(0,10); // 10+26;
	            $authnum.=intval($list[$randnum]);
	        }
	        return $authnum;
	    }
	    /**
	     * 发送短信验证码
	     */
	    public function sendsms($tel = '',$v = 6){
	        // $mobile = '15898863779';
	        $mobile = $tel;
	        if (empty($mobile)) {
	            $this->error('请输入电话号码');
	        }
	        if (!preg_match('/1[34578]\d{9}$/',$mobile)) {
	            $this->error('请输入正确的电话号码');
	        }
	        $code =  $this->random($v);
	        $_SESSION['check'] = $code;
	        //时区设置：亚洲/上海
	        date_default_timezone_set('Asia/Shanghai');
	        //这个是你下面实例化的类
	        vendor('Alidayu.TopClient');
	        //这个是topClient 里面需要实例化一个类所以我们也要加载 不然会报错
	        vendor('Alidayu.ResultSet');
	        //这个是成功后返回的信息文件
	        vendor('Alidayu.RequestCheckUtil');
	        //这个是错误信息返回的一个php文件
	        vendor('Alidayu.TopLogger');
	        //这个也是你下面示例的类
	        vendor('Alidayu.AlibabaAliqinFcSmsNumSendRequest');
	        $c = new \TopClient;
	        //短信内容：公司名/名牌名/产品名
	        $product = '优客美测试';
	        //App Key的值 这个在开发者控制台的应用管理点击你添加过的应用就有了
	        $c->appkey = '23399583';
	        //App Secret的值也是在哪里一起的 你点击查看就有了
	        $c->secretKey = '14876b9d2aa57c274129fbc73c4617af';
	        //这个是用户名记录那个用户操作
	        $req = new \AlibabaAliqinFcSmsNumSendRequest;
	        //代理人编号 可选
	        $req->setExtend("123456");
	        //短信类型 此处默认 不用修改
	        $req->setSmsType("normal");
	        //短信签名 必须
	        $req->setSmsFreeSignName("优客美测试");
	        //短信模板 必须
	        $req->setSmsParam("{\"code\":\"$code\",\"product\":\"$product\"}");
	        //短信接收号码 支持单个或多个手机号码，传入号码为11位手机号码，不能加0或+86。群发短信需传入多个号码，以英文逗号分隔，
	        $req->setRecNum("$mobile");
	        //短信模板ID，传入的模板必须是在阿里大鱼“管理中心-短信模板管理”中的可用模板。
	        $req->setSmsTemplateCode('SMS_11520097'); // templateCode
	        //设置信息传送格式
	        $c->format='json';
	        //发送短信
	        $resp = $c->execute($req);
	        //短信发送成功返回True，失败返回false
	        //if (!$resp)
	        // dump($resp);
	        if ($resp )   // if($resp->result->success == true)
	        {
	            return true;
	        }
	        else
	        {
	            return false;
	        }
	    }
	    /**
	     * 将数组转换微字符串
	     */
	    public function transform($data){
	    	$str = '';
	    	foreach ($data as $key => $value) {
	    		$str.=$value;
	    	}
	    	return $str;
	    }
	    /**
	     * 账号登出
	     */
	    public function logOut(){
	    	session_unset();
	    }
	}