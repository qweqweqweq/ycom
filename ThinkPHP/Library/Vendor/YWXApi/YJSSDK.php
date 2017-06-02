<?php
class YJSSDK {
  //"wx8ee74234ece0bf7a", "d491cd1491cc43b6d698230ea6e4791b"
  private $appId = "wx8ee74234ece0bf7a";
  private $appSecret = "d491cd1491cc43b6d698230ea6e4791b";
  private $cachePath = "/www/htdocs/wx/Script/";
  private $url = '';
  public $userInfo;

  public function __construct($cnf) 
    {
      $this->appId = $cnf['appId'];
      $this->appSecret = $cnf['appSecret'];      
      
      $this->curUrl = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://")
		. "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        
      if($_SERVER[HTTP_HOST] != 'wx.ycome.com')
      {
          $this->curUrl = 'http://wx.ycome.com/proxy.php?u=' . urlencode(base64_encode($this->curUrl));
      }
          
        
    }

    //JS 获取openID
	public function GetOpenid()
	{
		//通过code获得openid
		if (!isset($_GET['code'])){
			//触发微信返回code码
			$url = $this->__CreateOauthUrlForCode($this->curUrl);
			Header("Location: $url");
			exit();
		} else {
			//获取code码，以获取openid
		    $code = $_GET['code'];
			$openid = $this->getOpenidFromMp($code);
			return $openid;
		}
	}
  
	/**
	 * 
	 * 构造获取code的url连接
	 * @param string $redirectUrl 微信服务器回跳的url，需要url编码
	 * 
	 * @return 返回构造好的url
	 */
	private function __CreateOauthUrlForCode($redirectUrl)
	{
		$urlObj["appid"] = $this->appId;
		$urlObj["redirect_uri"] = "$redirectUrl";
		$urlObj["response_type"] = "code";
		$urlObj["scope"] = "snsapi_base";
		$urlObj["state"] = "STATE"."#wechat_redirect";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
	}
  
	private function ToUrlParams($urlObj)
	{
		$buff = "";
		foreach ($urlObj as $k => $v)
		{
			if($k != "sign"){
				$buff .= $k . "=" . $v . "&";
			}
		}
		
		$buff = trim($buff, "&");
		return $buff;
	}
  
	/**
	 * 
	 * 构造获取open和access_toke的url地址
	 * @param string $code，微信跳转带回的code
	 * 
	 * @return 请求的url
	 */
	private function __CreateOauthUrlForOpenid($code)
	{
		$urlObj["appid"] = $this->appId;
		$urlObj["secret"] = $this->appSecret;
		$urlObj["code"] = $code;
		$urlObj["grant_type"] = "authorization_code";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://api.weixin.qq.com/sns/oauth2/access_token?".$bizString;
	}
  
	/**
	 * 
	 * 通过code从工作平台获取openid机器access_token
	 * @param string $code 微信跳转回来带上的code
	 * 
	 * @return openid
	 */
	public function GetOpenidFromMp($code)
	{
		$url = $this->__CreateOauthUrlForOpenid($code);
		
        $jstr = $this->httpGet($url);

        $res = json_decode($jstr, true);
		$this->data = $res;
		$openid = $res['openid'];
		return $openid;
	}
    
    
    /****************************************************
     *  微信通过OPENID获取用户信息，返回数组
     ****************************************************/
    public function getUser($openId){
        $accessToken = $this->getAccessToken();
        
        $url            = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$accessToken."&openid=".$openId."&lang=zh_CN";
        $jstr = $this->httpGet($url);
        
        $jsoninfo       = json_decode($jstr, true);
        return $jsoninfo;
    }        

    
    
    
  public function printShareJS($title, $desc, $image, $url='')
  {
     if(!empty($url))
        $this->curUrl = $url;
     else
        $url = $this->curUrl;
     $signPackage = $this->getSignPackage();

    echo '<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>';
    echo "<script>
      var _title = '{$title}';
      var _desc = '{$desc}';
      var _url = '{$url}';
      var _image = '{$image}';
      
      wx.config({
        debug: false,
        appId: '{$signPackage["appId"]}',
        timestamp: {$signPackage["timestamp"]},
        nonceStr: '{$signPackage["nonceStr"]}',
        signature: '{$signPackage["signature"]}',
        jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ']
      });
      wx.ready(function () {
            wx.onMenuShareTimeline({
                    title: _title,link: _url,imgUrl: _image,
                    success: function () {},
                    cancel: function () {}
            });
            wx.onMenuShareAppMessage({
                    title: _title,desc: _desc,link: _url,imgUrl: _image,type: '',dataUrl: '', 
                    success: function () {},    
                    cancel: function () {}
            });
            wx.onMenuShareQQ({
                    title: _title,desc: _desc,link: _url,imgUrl: _image,
                    success: function () {},
                    cancel: function () {}
            });
      });
    </script>";

     

  }


  public function getSignPackage() {
    $jsapiTicket = $this->getJsApiTicket();

    // 注意 URL 一定要动态获取，不能 hardcode.
    $url = $this->curUrl;

    $timestamp = time();
    $nonceStr = $this->createNonceStr();

    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

    $signature = sha1($string);

    $signPackage = array(
      "appId"     => $this->appId,
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "signature" => $signature,
      "rawString" => $string
    );
    return $signPackage; 
  }

  private function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }

  private function getJsApiTicket() {
    // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode($this->get_php_file("wx_ticket.json"));
    if ($data->expire_time < time()) {
      $accessToken = $this->getAccessToken();
      // 如果是企业号用以下 URL 获取 ticket
      // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
      $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
      $res = json_decode($this->httpGet($url));
      $ticket = $res->ticket;
      if ($ticket) {
        $data->expire_time = time() + 7000;
        $data->jsapi_ticket = $ticket;
        $this->set_php_file("wx_ticket.json", json_encode($data));
      }
    } else {
      $ticket = $data->jsapi_ticket;
    }
    return $ticket;
  }

  private function getAccessToken() {
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode($this->get_php_file("wx_token.json"));
    if ($data->expire_time < time()) {
      // 如果是企业号用以下URL获取access_token
      // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
      $res = json_decode($this->httpGet($url));
      $access_token = $res->access_token;
      if ($access_token) {
        $data->expire_time = time() + 7000;
        $data->access_token = $access_token;
        $this->set_php_file("wx_token.json", json_encode($data));
      }
    } else {
      $access_token = $data->access_token;
    }
    return $access_token;
  }

  private function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
    // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    

    curl_close($curl);

    return $res;
  }

  private function get_php_file($filename) {
    return file_get_contents( $this->cachePath . $filename);
  }
  private function set_php_file($filename, $content) {
    $fp = fopen($this->cachePath . $filename, "w");
    fwrite($fp, $content);
    fclose($fp);
  }
}

