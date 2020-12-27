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
<title>黑米平台登陆</title>
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

<br><a>-------------------------</a><br>2019-12-07 04:27:02<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：访问用户IP数据。<br><a>-------------------------</a><br>2019-12-07 04:27:09<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：访问用户IP数据。<br><a>-------------------------</a><br>2019-12-07 04:27:16<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：访问用户IP数据。<br><a>-------------------------</a><br>2019-12-07 04:59:24<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-07 04:59:24<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>成功通过访问！<br><a>-------------------------</a><br>2019-12-07 04:59:58<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-07 04:59:58<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>成功通过访问！<br><a>-------------------------</a><br>2019-12-07 05:00:16<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-07 05:00:16<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>成功通过访问！<br><a>-------------------------</a><br>2019-12-07 05:00:17<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-07 05:00:17<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>成功通过访问！<br><a>-------------------------</a><br>2019-12-07 05:00:26<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-07 05:02:35<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-07 05:02:35<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>成功通过访问！<br><a>-------------------------</a><br>2019-12-09 22:19:33<br>User IP Address：220.181.108.107<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 00:20:34<br>User IP Address：220.181.108.150<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 02:23:28<br>User IP Address：123.125.71.26<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 02:57:52<br>User IP Address：34.222.156.19<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：©Apple Safari<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-10 02:57:52<br>User IP Address：34.222.156.19<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：©Apple Safari<br>成功通过访问！<br><a>-------------------------</a><br>2019-12-10 04:26:15<br>User IP Address：220.181.108.168<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 04:30:31<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 04:31:02<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-10 04:31:02<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>成功通过访问！<br><a>-------------------------</a><br>2019-12-10 04:31:24<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>Country：<a></a><br>City:<br>Region id:<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-10 04:31:24<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>密码输入错误。<br><a>-------------------------</a><br>2019-12-10 04:31:52<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-10 04:39:34<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-10 04:39:34<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>成功通过访问！<br><a>-------------------------</a><br>2019-12-10 04:39:34<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-10 04:39:34<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>成功通过访问！<br><a>-------------------------</a><br>2019-12-10 04:40:31<br>User IP Address：24.114.42.101<br>System Language: <a>English</a><br>System OS：<a>Unknown OS</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:温哥华<br>Region id:CA_BC<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 04:41:39<br>User IP Address：24.114.42.101<br>System Language: <a>English</a><br>System OS：<a>Unknown OS</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-10 04:44:36<br>User IP Address：24.114.42.101<br>System Language: <a>English</a><br>System OS：<a>Unknown OS</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问视频。<br><a>-------------------------</a><br>2019-12-10 05:13:54<br>User IP Address：120.232.150.98<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows Vista</a><br>浏览器：Opera<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 05:14:57<br>User IP Address：61.129.6.159<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 7</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 06:28:46<br>User IP Address：123.125.71.54<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 07:09:45<br>User IP Address：106.15.224.49<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Firefox<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 08:54:28<br>User IP Address：220.181.108.94<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 10:09:47<br>User IP Address：116.62.215.53<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:杭州<br>Region id:330000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 11:24:41<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 11:29:02<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 11:32:01<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 12:28:14<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问Blog主站。<br><a>-------------------------</a><br>2019-12-10 12:28:16<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问Blog主站。<br><a>-------------------------</a><br>2019-12-10 12:28:17<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问Blog主站。<br><a>-------------------------</a><br>2019-12-10 12:28:18<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问Blog主站。<br><a>-------------------------</a><br>2019-12-10 12:28:22<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问Blog主站。<br><a>-------------------------</a><br>2019-12-10 14:24:23<br>User IP Address：123.125.71.108<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 17:42:57<br>User IP Address：123.125.71.45<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 18:48:42<br>User IP Address：93.119.227.19<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：©Apple Safari<br>Country：<a>罗马尼亚</a><br>City:XX<br>Region id:xx<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 21:01:29<br>User IP Address：220.181.108.141<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-10 22:00:51<br>User IP Address：35.162.70.167<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 00:34:57<br>User IP Address：172.69.25.132<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 01:43:21<br>User IP Address：220.181.108.147<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 04:50:18<br>User IP Address：123.125.71.87<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 06:24:14<br>User IP Address：47.101.202.225<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 07:57:17<br>User IP Address：123.125.71.111<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 10:02:43<br>User IP Address：101.132.177.30<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 10:12:06<br>User IP Address：123.125.71.51<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 11:00:40<br>User IP Address：70.74.194.11<br>System Language: <a>English</a><br>System OS：<a>Unknown OS</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 11:44:22<br>User IP Address：42.236.10.112<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 13:05:58<br>User IP Address：123.125.71.109<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 13:25:03<br>User IP Address：42.236.10.108<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 15:06:45<br>User IP Address：220.181.108.79<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 15:13:00<br>User IP Address：42.236.10.112<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 17:00:00<br>User IP Address：42.236.10.112<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 17:26:20<br>User IP Address：66.249.79.213<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-11 18:24:36<br>User IP Address：220.181.108.183<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 18:39:32<br>User IP Address：42.236.10.105<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 20:30:07<br>User IP Address：42.236.10.110<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 21:13:34<br>User IP Address：47.74.150.174<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a>新加坡</a><br>City:XX<br>Region id:xx<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 21:55:02<br>User IP Address：220.181.108.107<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-11 22:26:20<br>User IP Address：42.236.10.112<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 00:17:28<br>User IP Address：42.236.10.120<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 01:39:26<br>User IP Address：220.181.108.146<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 01:51:40<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-12 01:59:55<br>User IP Address：42.236.10.123<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 03:41:07<br>User IP Address：123.125.71.84<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 03:47:50<br>User IP Address：42.236.10.122<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 05:26:47<br>User IP Address：42.236.10.105<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 05:42:38<br>User IP Address：123.125.71.26<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 07:07:50<br>User IP Address：42.236.10.123<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 07:45:54<br>User IP Address：220.181.108.120<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 08:19:12<br>User IP Address：106.11.159.197<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 08:51:33<br>User IP Address：42.236.10.108<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 09:49:25<br>User IP Address：123.125.71.87<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 10:35:09<br>User IP Address：42.236.10.107<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 10:55:08<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-12 11:51:25<br>User IP Address：123.125.71.69<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 12:16:15<br>User IP Address：42.236.10.116<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 13:50:29<br>User IP Address：42.236.10.107<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 15:40:52<br>User IP Address：42.236.10.112<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 17:25:45<br>User IP Address：42.236.10.109<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 18:19:24<br>User IP Address：47.101.202.0<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 19:08:05<br>User IP Address：42.236.10.123<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 19:59:19<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-12 20:45:16<br>User IP Address：42.236.10.122<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-12 22:42:35<br>User IP Address：42.236.10.113<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 00:35:54<br>User IP Address：42.236.10.123<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 02:20:47<br>User IP Address：42.236.10.110<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 04:03:33<br>User IP Address：42.236.10.110<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 05:23:03<br>User IP Address：47.101.199.159<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:上海<br>Region id:310000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 05:37:38<br>User IP Address：42.236.10.122<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 07:16:27<br>User IP Address：42.236.10.113<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 08:56:09<br>User IP Address：42.236.10.105<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 10:23:11<br>User IP Address：101.132.131.7<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 10:45:26<br>User IP Address：42.236.10.121<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 14:13:49<br>User IP Address：42.236.10.110<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：robot！<br>Country：<a>中国</a><br>City:郑州<br>Region id:410000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 14:29:19<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 14:30:05<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-13 14:30:34<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-13 14:30:49<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-13 14:30:49<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>密码输入错误。<br><a>-------------------------</a><br>2019-12-13 14:31:03<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-13 14:33:39<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2019-12-13 14:33:39<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>密码输入错误。<br><a>-------------------------</a><br>2019-12-13 15:23:28<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：©Apple Safari<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-14 09:43:48<br>User IP Address：47.92.120.136<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-14 20:19:33<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-15 06:58:17<br>User IP Address：66.249.79.213<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-15 10:00:10<br>User IP Address：47.100.57.133<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-15 21:17:17<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-16 07:48:28<br>User IP Address：51.77.129.167<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-16 07:48:31<br>User IP Address：51.77.246.68<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>法国</a><br>City:XX<br>Region id:xx<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-16 10:14:21<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-16 10:51:10<br>User IP Address：47.92.6.234<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-16 18:47:40<br>User IP Address：66.249.79.213<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-17 03:59:31<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-17 04:48:03<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-17 12:51:16<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-17 14:04:55<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-17 21:59:57<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-17 22:56:49<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-18 06:51:28<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-18 08:14:15<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-18 16:26:12<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-18 17:25:37<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-19 01:04:53<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-19 05:02:25<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-19 10:13:26<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-19 12:16:17<br>User IP Address：106.11.155.130<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-19 14:44:51<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-19 19:14:17<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-19 23:05:21<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-20 02:24:47<br>User IP Address：173.252.127.10<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>美国</a><br>City:XX<br>Region id:US_133<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-20 06:52:29<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-20 08:09:07<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-20 09:44:23<br>User IP Address：106.15.229.102<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-20 15:20:08<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-20 17:12:01<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-21 00:07:41<br>User IP Address：66.249.69.29<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-21 02:10:40<br>User IP Address：66.249.69.28<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-21 09:33:01<br>User IP Address：66.249.69.29<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-21 11:27:40<br>User IP Address：66.249.69.28<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-21 19:23:30<br>User IP Address：66.249.69.29<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-21 21:07:39<br>User IP Address：66.249.69.28<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-22 06:21:28<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-22 07:53:33<br>User IP Address：66.249.79.213<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-22 17:30:27<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-22 17:30:30<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-23 02:04:42<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-23 02:04:47<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-23 19:24:34<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-23 19:24:51<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-23 19:32:34<br>User IP Address：66.249.79.160<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问NAV。<br><a>-------------------------</a><br>2019-12-24 04:28:02<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-24 12:16:58<br>User IP Address：51.15.241.250<br>System Language: <a>English</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-24 13:12:48<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-24 22:14:21<br>User IP Address：66.249.79.213<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-25 07:05:08<br>User IP Address：66.249.65.143<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_136<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-25 16:07:41<br>User IP Address：66.249.65.147<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_136<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-26 01:07:17<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-26 06:57:38<br>User IP Address：68.148.152.160<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-28 00:18:27<br>User IP Address：220.181.108.186<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:北京<br>Region id:110000<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-28 02:25:02<br>User IP Address：50.99.8.189<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-29 12:10:10<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-29 21:12:34<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-30 06:00:21<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2019-12-30 09:01:46<br>User IP Address：47.100.57.133<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:上海<br>Region id:310000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 11:34:59<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 11:39:54<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 11:40:58<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 11:57:22<br>User IP Address：183.236.3.206<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 11:57:46<br>User IP Address：183.236.3.206<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 11:58:15<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：�Apple Safari<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:02:41<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：�Apple Safari<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:04:54<br>User IP Address：122.10.83.68<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:XX<br>Region id:810000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 12:04:54<br>User IP Address：211.233.81.248<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>韩国</a><br>City:XX<br>Region id:xx<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 12:04:54<br>User IP Address：45.91.225.228<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>欧洲</a><br>City:XX<br>Region id:xx<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 12:04:54<br>User IP Address：2.59.153.59<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>荷兰</a><br>City:XX<br>Region id:xx<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 12:04:54<br>User IP Address：113.196.70.197<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:XX<br>Region id:710000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 12:04:54<br>User IP Address：103.138.149.32<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:XX<br>Region id:810000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 12:04:55<br>User IP Address：103.137.35.100<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:XX<br>Region id:710000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 12:12:48<br>User IP Address：183.236.3.206<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:15:18<br>User IP Address：183.236.3.206<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:18:07<br>User IP Address：183.236.3.206<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:广州<br>Region id:440000<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:28:58<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:29:02<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:29:46<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:29:52<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:31:37<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:34:57<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:35:10<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:36:47<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:37:03<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Edge<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:39:01<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:39:34<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Edge<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 12:39:38<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Edge<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 13:51:53<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 13:53:27<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 13:54:30<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 13:56:23<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 13:57:29<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 14:00:13<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 14:00:47<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 14:03:58<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 14:09:03<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 14:10:12<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 14:12:01<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 14:13:56<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 14:14:29<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 14:20:02<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-01 14:50:19<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 14:50:28<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 14:51:03<br>User IP Address：68.148.154.173<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 10</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 14:51:21<br>User IP Address：101.89.29.97<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Windows 7</a><br>浏览器：Google Chrome<br>Country：<a>中国</a><br>City:上海<br>Region id:310000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 20:33:38<br>User IP Address：221.232.206.253<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:武汉<br>Region id:420000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-01 20:34:08<br>User IP Address：221.232.206.252<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:武汉<br>Region id:420000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-02 06:09:19<br>User IP Address：70.74.194.11<br>System Language: <a>English</a><br>System OS：<a>Unknown OS</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-02 06:09:25<br>User IP Address：70.74.194.11<br>System Language: <a>English</a><br>System OS：<a>Unknown OS</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-02 06:09:30<br>User IP Address：70.74.194.11<br>System Language: <a>English</a><br>System OS：<a>Unknown OS</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问视频。<br><a>-------------------------</a><br>2020-01-02 06:10:16<br>User IP Address：70.74.194.11<br>System Language: <a>English</a><br>System OS：<a>Unknown OS</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-02 06:10:48<br>User IP Address：70.74.194.11<br>System Language: <a>English</a><br>System OS：<a>Unknown OS</a><br>浏览器：Google Chrome<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：停留登陆页面。<br><a>-------------------------</a><br>2020-01-02 06:10:48<br>User IP Address：70.74.194.11<br>System Language: <a>English</a><br>System OS：<a>Unknown OS</a><br>浏览器：Google Chrome<br>成功通过访问！<br><a>-------------------------</a><br>2020-01-02 07:38:05<br>User IP Address：47.101.201.186<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:上海<br>Region id:310000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-03 07:07:32<br>User IP Address：47.101.199.1<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:上海<br>Region id:310000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-03 10:51:38<br>User IP Address：75.156.148.192<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>Country：<a>加拿大</a><br>City:埃德蒙顿<br>Region id:CA_AB<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-04 05:43:49<br>User IP Address：47.101.202.13<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：未知浏览器！<br>Country：<a>中国</a><br>City:上海<br>Region id:310000<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-04 11:52:52<br>User IP Address：142.114.243.18<br>System Language: <a>Chinese Simplified</a><br>System OS：<a>Apple iOS</a><br>浏览器：未知浏览器！<br>Country：<a>加拿大</a><br>City:XX<br>Region id:CA_ON<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-04 14:57:32<br>User IP Address：66.249.79.160<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-04 14:57:52<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-05 03:09:32<br>User IP Address：66.249.79.160<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-05 03:10:52<br>User IP Address：66.249.79.209<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-05 12:01:53<br>User IP Address：66.249.79.191<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-05 12:03:45<br>User IP Address：66.249.79.213<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-05 21:41:10<br>User IP Address：66.249.79.211<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问NAV。<br><a>-------------------------</a><br>2020-01-05 21:51:11<br>User IP Address：66.249.79.163<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问NAV。<br><a>-------------------------</a><br>2020-01-05 23:10:35<br>User IP Address：66.249.79.213<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-05 23:12:39<br>User IP Address：66.249.79.191<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-06 06:01:19<br>User IP Address：66.249.79.212<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-06 11:44:59<br>User IP Address：66.249.79.163<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-06 20:11:49<br>User IP Address：66.249.79.163<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-07 02:36:45<br>User IP Address：66.220.149.4<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-07 06:48:51<br>User IP Address：66.249.71.71<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Linux</a><br>浏览器：Google Chrome<br>Country：<a></a><br>City:<br>Region id:<br>Action：访问主站。<br><a>-------------------------</a><br>2020-01-07 09:03:12<br>User IP Address：157.245.13.123<br>System Language: <a>获取浏览器语言失败！</a><br>System OS：<a>Unknown OS</a><br>浏览器：未知浏览器！<br>Country：<a>美国</a><br>City:XX<br>Region id:US_137<br>Action：访问主站。