<?php
session_start();

	//验证用户是否登录 
if(isset($_SESSION['username']) && isset($_SESSION['userid'])){
	if(!empty($_SESSION['username'])&&!empty($_SESSION['userid'])){
		echo "<a href=tianjia.html >添加</a><br/><br/><br/><br/>";

		//连接数据库
		@$db=new mysqli('localhost','root','','travel');
		$db->query("set names utf8");
		//判断数据库连接是否发生错误
		if(mysqli_connect_errno()){			
			echo "Error:could not connect to database.Please try again later.";
			exit;
		}
	//查询语句（查询所有的帖子）
		$query="select *from daily order by time desc";
		$result=$db->query($query);
		//查看查询是否成功 
		// if($result){
		// 	//循环输出内容
		// 	while($row=$result->fetch_assoc()){
		// 		//$image=$row['image'];
		// 		//header("Content-type: $image");s
		// 		//查询用户的$image
		// 		$query2="select image from users where username='".$row['username']."'";
		// 		$result2=$db->query($query2);
		// 		if($result2){
		// 			$row2=$result2->fetch_assoc();
		// 			echo "<img src='".$row2['image']."' width='80' height='80' >";
		// 		}
		// 		// echo "<img src='".$row['image']."' >";
		// 		echo $row['username'].'<br/>';
		// 		echo $row['content'].'<br/>';
		// 		$time=date("Y-m-d H:i:s",$row['time']);
		// 		echo $time.'<br/>';
		// 		echo "<a href=dianzan.php?daily_id=".$row['daily_id']."&likes=".$row['likes']." >点赞</a>(".$row['likes'].")";
		// 		echo "<br/>";
		// 	}
		// }else{
		// 	echo "An error has occured.";
		// }

		// $db->close();
	}
}

?>