<?php
//取得访问者的物理地址
function get_client_dizhi($ip){
$doc = new DOMDocument();
$doc->load('http://www.youdao.com/smartresult-xml/search.s?type=ip&q='.$ip); //读取xml文件
$humans = $doc->getElementsByTagName( "smartresult" ); //取得humans标签的对象数组
foreach( $humans as $human )
{
$names = $human->getElementsByTagName( "product" ); //取得name的标签的对象数组
$name = $names->item(0)->nodeValue; //取得node中的值，如<name> </name>
$sexs = $human->getElementsByTagName( "location" );
$sex = $sexs->item(0)->nodeValue;
}
return $sex;
}
//获取IP地址
// 获取客户端IP地址
function get_client_ip(){
   if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
       $ip = getenv("HTTP_CLIENT_IP");
   else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
       $ip = getenv("HTTP_X_FORWARDED_FOR");
   else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
       $ip = getenv("REMOTE_ADDR"); // www.jbxue.com
   else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
       $ip = $_SERVER['REMOTE_ADDR'];
   else
       $ip = "unknown";
   return($ip);
}
$ip=get_client_ip();
$dizhi=get_client_dizhi($ip);