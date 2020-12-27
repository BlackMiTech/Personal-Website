
<!-- 
Author:Bokai Wang
Date: Dec,12,2020
Title: 前端以及后台的结合demo
-->
<?php
header('Content-Type:text/html; charset=utf-8;');
//获取ip
function getIP()
{
    global $ip;
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknown";

    if ($ip) {
        $ip = explode(',', $ip);
        if (isset($ip[0])) {
            $ip = $ip[0];
        }
    }

    return $ip;
}

//获取计算机语言
function GetLang()
{
    if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $lang = substr($lang, 0, 5);
        if (preg_match("/zh-cn/i", $lang)) {
            $lang = "Chinese Simplified";
        } elseif (preg_match("/zh/i", $lang)) {
            $lang = "Chinese Traditional";
        } elseif (preg_match("/kr/i", $lang)) {
            $lang = "Korean";
        } elseif (preg_match("/fr/i", $lang)) {
            $lang = "French";
        } elseif (preg_match("/en/i", $lang)) {
            $lang = "English";
        } elseif (preg_match("/jp/i", $lang)) {
            $lang = "Japanese";
        } else {
            $lang = "English";
        }
        return $lang;

    } else {
        return "获取浏览器语言失败！";
    }
}

function GetOs()
{
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $os = false;

    if (preg_match('/win/i', $agent) && strpos($agent, '95')) {
        $os = 'Windows 95';
    } else if (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90')) {
        $os = 'Windows ME';
    } else if (preg_match('/win/i', $agent) && preg_match('/98/i', $agent)) {
        $os = 'Windows 98';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent)) {
        $os = 'Windows Vista';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent)) {
        $os = 'Windows 7';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent)) {
        $os = 'Windows 8';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 10.0/i', $agent)) {
        $os = 'Windows 10';#添加win10判断
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 5.1/i', $agent)) {
        $os = 'Windows XP';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 5/i', $agent)) {
        $os = 'Windows 2000';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt/i', $agent)) {
        $os = 'Windows NT';
    } else if (preg_match('/win/i', $agent) && preg_match('/32/i', $agent)) {
        $os = 'Windows 32';
    } else if (preg_match('/linux/i', $agent)) {
        $os = 'Linux';
    } else if (preg_match('/unix/i', $agent)) {
        $os = 'Unix';
    } else if (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent)) {
        $os = 'SunOS';
    } else if (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent)) {
        $os = 'IBM OS/2';
    } else if (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent)) {
        $os = 'Macintosh';
    } else if (preg_match('/PowerPC/i', $agent)) {
        $os = 'PowerPC';
    } else if (preg_match('/AIX/i', $agent)) {
        $os = 'AIX';
    } else if (preg_match('/HPUX/i', $agent)) {
        $os = 'HPUX';
    } else if (preg_match('/NetBSD/i', $agent)) {
        $os = 'NetBSD';
    } else if (preg_match('/BSD/i', $agent)) {
        $os = 'BSD';
    } else if (preg_match('/OSF1/i', $agent)) {
        $os = 'OSF1';
    } else if (preg_match('/IRIX/i', $agent)) {
        $os = 'IRIX';
    } else if (preg_match('/FreeBSD/i', $agent)) {
        $os = 'FreeBSD';
    } else if (preg_match('/teleport/i', $agent)) {
        $os = 'teleport';
    } else if (preg_match('/flashget/i', $agent)) {
        $os = 'flashget';
    } else if (preg_match('/webzip/i', $agent)) {
        $os = 'webzip';
    } else if (preg_match('/offline/i', $agent)) {
        $os = 'Offline';
    } else if (preg_match('/ios/i', $agent)) {
        $os = 'Apple iOS';
    } else if (preg_match('/android/i', $agent)) {
        $os = 'Android Os';
    } else {
        $os = 'Unknown OS';
    }
    return $os;
}

////获得访客浏览器类型

function GetBrowser()
{
   if(empty($_SERVER['HTTP_USER_AGENT'])){
  return 'robot！';
 }
 if( (false == strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')) && (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident')!==FALSE) ){
  return 'Internet Explorer 11.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 10.0')){
  return 'Internet Explorer 10.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 9.0')){
  return 'Internet Explorer 9.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8.0')){
  return 'Internet Explorer 8.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7.0')){
  return 'Internet Explorer 7.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0')){
  return 'Internet Explorer 6.0';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Edge')){
  return 'Edge';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Firefox')){
  return 'Firefox';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Chrome')){
  return 'Google Chrome';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Safari')){
  return '©Apple Safari';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'Opera')){
  return 'Opera';
 }
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'360SE')){
  return '360SE';
 }
  //微信浏览器
 if(false!==strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessage')){
  return 'MicroMessage';
    } else {
        return "未知浏览器！";
    }
}

$ip = getIP();
$lang = GetLang();
$getos = GetOs();
$GetBrowser = GetBrowser();
$time = date("Y-m-d H:i:s");//拿到时间

//淘宝iP api
$json = file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip=' . $ip);

$arr = json_decode($json);

$line = "<a>-------------------------</a>";//组合起来
$htmlbr = "<br>";
$writeip = "User IP Address：" . $ip;
$writelang = "System Language: " . "<a>" . $lang . "</a>";
$writeos = "System OS：" . "<a>" . $getos . "</a>";
$writeBrowser = "浏览器：" . $GetBrowser;
$writecountry = "Country：" . "<a>" . $arr->data->country . "</a>";
$echoloccity = "City:" . $arr->data->city;
$action = "Action：停留登陆页面。";
$regionid = "Region id:" . $arr->data->region_id ;
$passfailed = "密码输入错误。" ;
$passsuce= "成功通过访问！" ;


file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
file_put_contents("index.php", $line, FILE_APPEND); //写入文件
file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
file_put_contents("index.php", $time, FILE_APPEND); //写入文件
file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
file_put_contents("index.php", $writeip, FILE_APPEND); //写入文件
file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
file_put_contents("index.php", $writelang, FILE_APPEND); //写入文件
file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
file_put_contents("index.php", $writeos, FILE_APPEND); //写入文件
file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
file_put_contents("index.php", $writeBrowser, FILE_APPEND); //写入文件
file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
file_put_contents("index.php", $writecountry, FILE_APPEND); //写入文件
file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
file_put_contents("index.php", $echoloccity, FILE_APPEND); //写入文件
file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
file_put_contents("index.php", $regionid, FILE_APPEND); //写入文件
file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
file_put_contents("index.php", $action, FILE_APPEND); //写入文件


$adminkey = "blackmiprivacytest";
/*-----------------请在上面修改登陆密码---------------- */

session_start();

if (@$_POST['password'] == $adminkey) {
    $_SESSION['login'] = md5($adminkey);
} else if (@$_POST['password'] == "") {
    echo "<script>alert('Data reading completed.');</script>";
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $line, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $time, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $writeip, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $writelang, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $writeos, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $writeBrowser, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $passsuce, FILE_APPEND); //写入文件
} else {
    echo "<script>alert('Good guess. Now please input the correct password.');</script>";
		file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $line, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $time, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $writeip, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $writelang, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $writeos, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $writeBrowser, FILE_APPEND); //写入文件
	file_put_contents("index.php", $htmlbr, FILE_APPEND); //写入文件
	file_put_contents("index.php", $passfailed, FILE_APPEND); //写入文件
}

if ($_SERVER['QUERY_STRING'] == "logout") {
    $_SESSION['login'] = "";
    header("location: " . $_SERVER['PHP_SELF']);
	 echo "<script>alert('Log Out Success!');</script>";
    exit();
}

$html_login = <<<EOF

<html>
<head>
<title>BlackMi平台登陆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="../lib/js/protectweb.js" type="text/javascript"></script>

<script>
	function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
            }, 'google_translate_element');
        }
</script>
<script type="text/javascript">
 
    function btnAction() {
        alert(document.getElementById("xz").disabled);
 
        alert(2);
    }
    function check() {
        //判断checkbox有没有被选中
        if (document.getElementById("ch").checked == true) {
            document.getElementById("xz").disabled = ""; //给BUTTON按钮的disabled属性赋值
 
        } else {
            document.getElementById("xz").disabled = "disabled";
        }
 
    }
 
    function checkedThis(obj) {
        var test = document.getElementsByName('test'), test1 = document.getElementsByName('test1'), i, j, num = [0, 0];
 
        for (i = 0, j = test.length; i < j; i++) if (test[i].checked) num[0]++;
        for (i = 0, j = test1.length; i < j; i++) if (test1[i].checked) num[1]++;
 
        if (num[0] == 1 && num[1] == 1) document.getElementById('xz').disabled = false;
        else document.getElementById('xz').disabled = true;
    } 
</script>
<style type="text/css">
div{ margin:0 auto;}
#loginform{width:600 px;height:500 px; border-radius: 10px;box-shadow: 1px 1px 1px 1px #888888;}
	#bar {
	padding: 10px;
	width: 400 px;
	margin: 20px auto;
	}    </style>

</head>
<body>

<div id="loginform">
<div id="bar" style="align:center;">
   <h1>申明：</h1>
   <br>
   <a>此页面尚处于开发阶段，该页面用于储存用户信息数据，以便改善用户体验。</a>
<a>开发完毕时会将此页面进行隐藏式访问。</a>
<br>
<a>该页面正在更新，如您发现了个人地理位置或ip出现在此页面，因而侵犯了您的个人隐私，请联系我进行删除，对您造成的不便深表歉意。</a>
      <br>
<a>同时，应中国大陆各安全监管部门要求，您访问用户数据界面也会留下您的个人信息，以及点击该页面的次数，如发现您非法使用该页面用于获取用户数据，我们会遵循当地安全部门将信息提交进行处理。
</a><br>
<a><strong>以上情况仅会在您勾选“我同意上述协议”后进行，如您没有勾选，我们将不会对您的信息负责。</strong></a>
<br>
   <a>联系邮箱：jimmy@blackmiservice.com</a>

      <br>
  <a>-------------------------------</a><br>
	<div id="google_translate_element" style="text-align:left;"></div>
   <a>-------------------------------</a>
<br>
<br>
      <a>应中国监管部门要求，须暂时向用户开放数据，直到页面完善，用于改善用户体验。</a>
<br>
<a>登陆密码为<strong>blackmiprivacytest</strong></a>
	<h4>如果您同意此协议，请勾选下方的“我同意上述协议”，并输入安全码。</h4>
    <div>
<form action="" method="post">
 <input type="password" name="password" style="/* width:120px; */margin-top: 34px;/* height: 20px; */padding: 10px 16px;font-size: 18px;line-height: 1.3333333;border-radius: 5px;border: 1px solid #ccc;" placeholder="安全码" required="" autofocus="">
 <br>
<input name="check" id="ch" type="checkbox" onclick="check()">
<a>我同意上述协议</a>
 <br>
<input type="submit" id="xz" value="登录" style="margin-left: 5px;padding: 10px 16px;font-size: 18px; border-radius: 6px;color: #fff;background-color: #337ab7;border-color: #2e6da4;user-select: none;background-image: none;border: 1px solid transparent;">
 
 </form>
 </div>
</div>
</div>
</body>
</html>

EOF;
/* ----------------以上是登录页代码------------------- */

if (@$_SESSION['login'] != md5($adminkey)) {
    exit($html_login);
}
/////////////////////////////登录页代码结束

?>
<!-- 用户数据记录页 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BlackMi流量统计页面</title>
	<script src="../lib/js/protectweb.js" type="text/javascript"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
            }, 'google_translate_element');
        }
    </script>
    <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>
<div id="google_translate_element" style="text-align:right;"></div>
<a href="index.php?logout"><strong>LOG OUT</strong></a>

<h1>再次申明：</h1>
<br>
<a>此页面尚处于开发阶段，该页面用于储存用户信息数据，以便改善用户体验。<a>
        <br>
        <a>该页面正在更新，如您发现了个人地理位置或ip出现在此页面，因而侵犯了您的个人隐私，请联系我进行删除，对您造成的不便深表歉意。</a>
        <br>
        <a>同时，应中国大陆各部门要求，您访问此数据页面会同时留下您的个人信息（例如地理位置，设备型号等），以及点击该页面的次数，如发现您非法使用该页面用于获取用户数据，我们会按照当地警务部门将信息提交至司法部门进行处理。</a>
        <br>
        <a>联系邮箱：jimmy@blackmiservice.com</a>

        <br>
        <a>-------------------------------</a>
        <br>
        <a>以下会出现用户的个人IP：</a>
        <br>
</body>
</html>
<a>------------------------------- </a>
<br>

<a>1970-01-01 23:59:59<br>操作人：blackmi </a><br>系统语言：<a>English</a><br>操作系统：<a>Windows 10 Government</a><br>浏览器：BlackMi Secure浏览器<br><a>操作：后台修改</a>