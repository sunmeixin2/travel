<?php
//验证用户是否存在
session_start();

if(isset($_POST['username'])&&isset($_POST['password'])){
	if(empty($_POST['username'])){

		echo "Your username is null！";
		echo "<a href=denglu.html>返回登录界面</a>";
		exit;
	}
	else if(empty($_POST['password'])){

		echo "Your password is null！";
		echo '<a href=denglu.html>返回登录界面</a>';
		exit;
	}
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);

}
@$db=new mysqli('localhost','root','','travel');
//查看数据库链接是否发生错误
if(mysqli_connect_errno()){			
	echo "Error:could not connect to database.Please try again later.";
		exit;
}
$query="select *from users where username="."'".$username."' ";
$result=$db->query($query);
//查看查询是否成功
if(!$result){
	echo "An error has occurred.";
	exit;
}

$row=$result->fetch_assoc();
$db->close();
if(!$row){
	echo "The user does not exit！";
	echo "<a href=denglu.html>返回登陆界面</a>";
	exit;
}else{
	if($row['password']!=$password){
		echo "password error！";
		echo "<a href=denglu.html>重新登录</a>";
		exit;
	}
	else{
		$_SESSION['username']=$row['username'];
		$_SESSION['userid']=$row['userid'];
		// echo $_SESSION['username'];
		// echo "<br/>";
		// echo $_SESSION['userid'];
		// exit;
		header("location: chatroom.php");
	}
	
}



?>
