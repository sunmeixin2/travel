<?php

if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['introduce'])&&isset($_POST['image'])){
	if(empty($_POST['username'])||empty($_POST['password'])){
		echo '用户名或密码未填写，请返回<a href=zhuce.html>注册界面</a>查看';
		exit;
	}
	if($_POST['password']!=$_POST['passwdagain']){
		echo '你两次输入的密码对不！';
		echo '<a href=zhuce.html>返回注册界面</a>';
		exit;
	}
	if(empty($_POST['image'])){
		
        $pictures = array();
		for($i=0;$i<14;$i++){
           $pictures[$i] = "/photos/".($i+1).".jpg";
		}
		$index=mt_rand(0,13);
		$image=$pictures[$index];
	}
	else{
		$image=trim($_POST['image']);
	}
}
$username=trim($_POST['username']);
$password=trim($_POST['password']);
$introduce=trim($_POST['introduce']);

//连接数据库
@$db=new mysqli('localhost','root','','travel');
//查看数据库链接是否发生错误
if(mysqli_connect_errno()){			
	echo "Error:could not connect to database.Please try again later.";
	exit;
}
$query="insert into users (username,password,introduce,image) values('".$username."','".$password."','".$introduce."','".$image."')";
$result=$db->query($query);
		//查看插入是否成功
if(!$result){
	echo "An error has occurred.The item was not added.";
}

$db->close();
header("location: denglu.html");
?>
