<?php
session_start();
var_dump("ceshi");
		exit();
if(isset($_POST['content'])){
	var_dump("ce222shi");
		exit();

	//验证内容是否空
	if(empty($_POST['content'])){
		echo "您输入的内同为空！";
		echo '<a href=tianjia.html ></a>';	//若内容为空跳转此页面
	}
	else{

		$content= trim($_POST['content']) ;
		$username=trim($_SESSION['username']);
		$time=time();
		
		//连接数据库
		@$db=new mysqli('localhost','root','','travel');
		$db->query("set names utf8");
		//查看数据库链接是否发生错误
		if(mysqli_connect_errno()){			
			echo "Error:could not connect to database.Please try again later.";
			exit;
		}
		//插入语句
		$query="insert into daily(username,content,time,likes) values('".$username."','".$content."','".$time."','0')";
		
		//执行语句
		$result=$db->query($query);
		 $db->close();//关闭数据库的链接
		//查看插入是否成功
		if(!$result){
			echo "An error has occurred.The item was not added.";
		}
		else{
			header("location:chatroom.php");
		}
	}
}


?>