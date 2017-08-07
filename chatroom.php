<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['userid'])){
  if(!empty($_SESSION['username'])&&!empty($_SESSION['userid'])){
   // echo "<a href=tianjia.html >添加</a><br/><br/><br/><br/>";
    //连接数据库
    @$db=new mysqli('localhost','root','','travel');
    $db->query("set names utf8");
    //查看数据库链接是否成功
    if(mysqli_connect_errno()){     
      echo "Error:could not connect to database.Please try again later.";
      exit;
    }
    //查询语句
    $query="select *from daily order by time desc";
    $result=$db->query($query);
?>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
	<title>在线交流</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="css/raiders.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/echarts.min.js"></script>
	<script type="text/javascript" src="js/raiders.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>

   <div class="header" id="home">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li><a href="主页.html" class="hvr-bounce-to-top">主页<span class="sr-only">(current)</span></a></li>
          <li><a href="raiders.html" class="hvr-bounce-to-top">旅游攻略</a></li>
          <li><a href="introduce.html" class="hvr-bounce-to-top">景点介绍</a></li>
          <li><a href="个人中心.html" class="hvr-bounce-to-top">个人中心</a></li>
          <li><a href="chatroom.html" class="hvr-bounce-to-top">在线交流</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            </div>
        </nav>
    </div>
    <div id="show_map">	
        <div class="choice_city">
        	<div class="control-group">
                    <label class="control-label" style="color: black; margin-left: 20px;">选择城市:</label>
                    <select class="goal">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                   </select>
                   <select class="goal">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                   </select>
                   <button type="submit" class="btns"  style="margin-left: 90px;background-color: #0996A2;margin-top: 22px; width: 120px;height: 35px;font-size: 19px;">搜索
                   </button>
                  </div>
        </div>
        <div class="chat_border" style="overflow-y: auto; ">
         <?php  if($result){         
                  while($row=$result->fetch_assoc()){
                      $query2="select image from users where username='".$row['username']."'";
                      $result2=$db->query($query2);
                      if($result2){
                          $row2=$result2->fetch_assoc();
                        }
                          $time=date("Y-m-d H:i:s",$row['time']);
                          echo '<div class="message">
                                  <div class="owner_face">
                                    <img class="face" src="'.$row2['image'].'"  width="80px" height="80px">
                                    <p class="user_name">'.$row['username'].'</p>
                                  </div>' ;
                          echo '<div class="owner_content">
                                  <div class="owner_body">'.$row['content'].'</div>
                                  <span class="content_time">'. $time.'</span>
                                  <span class="content_zan" > <a href="dianzan.php?daily_id='.$row['daily_id'].'&likes='.$row['likes'].'">点赞</a>'."(".$row['likes'].")".
                                  '</span>
                                 </div> </div>'   ;   
                      }
                  }    
              ?>   	           
        </div>
        <div  class="repeat-speech">
							<h4>发表帖子</h4>
							<textarea name="textarea" id="text"></textarea>
							<input type="button" value="提交" id="add" />		
		  </div>
      </div>
  <?php $db->close(); } }  ?>

  <div class="footer">
            <div class="footer-top ">
                    <ul>
                        <li><a href="#"><img src="images/icon1.png" alt=""/></a></li>
                        <li><a href="#"><img src="images/icon2.png" alt=""/></a></li>
                        <li><a href="#"><img src="images/icon3.png" alt=""/></a></li>
                        <li><a href="#"><img src="images/icon4.png" alt=""/></a></li>
                    </ul>
            </div>
                <div class="bottom-menu ">
                    <ul>
                    <li><a href="主页.html">主页</a>&nbsp;&nbsp;</li>
              <li><a href="raiders.html">旅游攻略</a>&nbsp;&nbsp;</li>
              <li><a href="introduce.html">景点介绍</a>&nbsp;&nbsp;</li>
            <li><a href="个人中心.html">个人中心</a>&nbsp;&nbsp;</li>
              <li><a href="chatroom.html">在线交流</a>&nbsp;&nbsp;</li>
                    </ul>
                </div>
           <div class="buttom-wen ">
            <p>Copyright © 2016 imooc.com All Rights Reserved | 京ICP备 13046642号-2</p>
        </div>
  </div>

    <div class="scroll">
      <a href="#home" id="toTop" class="#" style="display: block;">
      <span id="toTopHover" style="opacity: 1;"> </span></a>
     </div>
     <script type="text/javascript">
      
     </script>
    
</body>
</html>