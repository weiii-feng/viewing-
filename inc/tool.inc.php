<?php
function skip($url,$pic,$message){
$html=<<<A
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="3;URL={$url}" />
<title>正在跳转中</title>
<link rel="stylesheet" type="text/css" href="../style/remind.css" />
</head>
<body>
<div class="notice"><span class="pic {$pic}"></span> {$message} <a href="{$url}">3秒后自动跳转中!</a></div>
</body>
</html>
A;
echo $html;
exit();
}

function is_login($link){
	if(isset($_COOKIE['member']['name']) && isset($_COOKIE['member']['pw'])){
		$query="select * from member where name='{$_COOKIE['member']['name']}' and sha1(password)='{$_COOKIE['member']['pw']}'";
		$result=execute($link,$query);
		if(mysqli_num_rows($result)==1){
			$data=mysqli_fetch_assoc($result);
			return $data['id'];
		}else{
			return false;
		}
	}else{
		return false;
	}
}
function deletecookie(){
	setcookie('member[name]','',time() - 3600,'/');
	setcookie('member[pw]','',time() - 3600,'/');
	setcookie('member[gender]','',time() - 3600,'/');
}
?>