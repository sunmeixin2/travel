<?php


session_start();
if(isset($_POST['content'])){
	if(empty($_POST['title'])&&empty($_POST['content'])){
		header('localtion:chatroom.php');
	}
	$content=$_POST['content'];
}
$username=$_SESSION['user_name'];
$time=date('Y-m-d H:i:s');


//连接数据库

@$db=new mysqli_connect('localhost','root','','travel');
$db->query('set names utf8');

//判断数据库链接是否发生错误
if(mysqli_connect_error()){
	echo 'Error: Could not connect to database.Please try again.';
	exit;
}

$query="insert into daily(username,content,time,likes) values(".$username.','.$content.','.$time.',0)';

$result=$db->query($query);
if($result){
	echo 'An error has occurred.';
	exit;
}

$db->close();
header('localtion:chatroom.php');


?>