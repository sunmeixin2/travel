<?php

session_start();

if(isset($_GET['daily_id'])&&isset($_GET['likes'])){
	if(empty($_GET['daily_id'])&&empty($_GET['likes'])){
		echo "An error happened.";
		exit;
	}else{
		$username=$_SESSION['username'];
		$time=time();
		setcookie($username,0,$time+10);
		$account=$_COOKIE[$username];
		var_dump($account);
		exit;
		if($account==1){
			header('localtion:chatroom.php');
		}else{

		$daily_id=$_GET['daily_id'];
		$likes=$_GET['likes'];

		//链接数据库
		@$db=new mysqli('localhost','root','','travel');
		$db->query("set names utf8");

		//判断数据库链接是否发生错误
		if(mysqli_connect_errno()){
			echo "Error: Could not connect to database.Please try again later.";
			exit;
		}
		
		$query="update daily set likes=".($likes+1)." where daily_id=".$daily_id;
		//执行语句
		$result=$db->query($query);

		//查看语句是否执行成功
		if(!$result){
			echo "An error has occurred.";
			exit;
		}
		setcookie($username,1,$time+10);
		$db->close();
		header("location: chatroom.php");
	 }
	}
}


?>