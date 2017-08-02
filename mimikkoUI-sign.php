<?php
//请修改第9,10,26行内容，需要自行抓取登陆包，抓取登陆包后填入以后便可实现自动获取token;
//若没有抓包基础可手动获取token之后填入，44行填入token，去掉注释符，不能修改密码，否则会失效;
//每次执行后会在php目录下生成日志文件，可对日志进行查看以及BUG排查
//QQ：1556092275；
date_default_timezone_set("PRC");
$time=date("Y-m-d H:i:s");
$arr = array(
    'id'=>'********',
    'password'=>'********************'
);


$data_string =  json_encode($arr);


$ch = curl_init("https://api1.mimikko.cn/client/user/loginMultiType");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json',
	'Cache-Control: no-cache',
	'AppID: wjB7LOP2sYkaMGLC',
	'Content-Type: application/json',
	'Content-Length: ********************************************************************',
	'Host: api1.mimikko.cn',
	'Connection: Keep-Alive',
	'Accept-Encoding: gzip',
	'User-Agent: okhttp/3.3.0' . strlen($data_string)
));


$result = curl_exec($ch);
if (curl_errno($ch)) {
    print curl_error($ch);
}
curl_close($ch);
$string=json_decode($result);
$token = $string->{'body'}->{'token'};
//echo $token;
//echo $result;

//$token=*********************;
$servant='servantId=57a194030503203ad49ee1c3';
$ch1 = curl_init("https://api1.mimikko.cn/client/love/award");
curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch1, CURLOPT_POSTFIELDS,$servant);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
	'Cache-Control: no-cache',
	'AppID: wjB7LOP2sYkaMGLC',
	'Authorization: '.$token,
	'Content-Type: application/x-www-form-urlencoded',
	'Content-Length: 34',
	'Host: api1.mimikko.cn',
	'Connection: Keep-Alive',
	'Accept-Encoding: gzip',
	'User-Agent: okhttp/3.3.0' . strlen($servant)
));


$result1 = curl_exec($ch1);
if (curl_errno($ch1)) {
    print curl_error($ch1);
}
curl_close($ch1);
//echo $result1;


$ch2 = curl_init("https://api1.mimikko.cn/client/love/sign");
curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch2, CURLOPT_POSTFIELDS,$servant);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
	'Cache-Control: no-cache',
	'AppID: wjB7LOP2sYkaMGLC',
	'Authorization: '.$token,
	'Content-Type: application/x-www-form-urlencoded',
	'Content-Length: 34',
	'Host: api1.mimikko.cn',
	'Connection: Keep-Alive',
	'Accept-Encoding: gzip',
	'User-Agent: okhttp/3.3.0' . strlen($servant)
));


$result2 = curl_exec($ch2);
if (curl_errno($ch2)) {
    print curl_error($ch2);
}
curl_close($ch2);
//echo $result2;


$now=json_decode($result2);
$level = $now->{'body'}->{'level'};
$love = $now->{'body'}->{'love'};
echo "成功打卡和兑换能量值"."<br/>";
echo "当前的等级为：".$level."<br/>";
echo "当前的好感度为：".$love."<br/>";
$file = fopen("log", "a");
fwrite($file, $time."登陆成功\r\n");
fwrite($file, "本次登陆的token为：".$token."\r\n");
fwrite($file, "当前的等级为：".$level."\r\n");
fwrite($file, "当前的好感度为：".$love."\r\n");
fwrite($file, "\r\n");
fclose($file);

?>