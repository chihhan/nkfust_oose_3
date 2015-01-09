<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>國民旅遊卡_店家查詢結果</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  <?php
	include("connect.inc.php");
	mysql_select_db($tw-card);
	switch ($selected){
	case 0:
			$sql = "SELECT * FROM opendata where industry like '%$content%'";
	 		break;
		case 1:
			$sql = "SELECT * FROM opendata where storeName like '%$content%'";
			break;
		case 2:
			$sql = "SELECT * FROM opendata where cardAgency like '%$content%'";
			break;
	}

	$result = mysql_query($sql) or die(mysql_error());  // 執行SQL查詢
	$row_result = mysql_fetch_assoc($result); //將陣列以欄位名索引
	mysql_query("set names utf8"); //將資料庫設定為utf8編碼，防止中文亂碼
  ?>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="welcome">
	    <h1><span>RESULT</span></h1>
	  </div><!--end welcome-->
      
      <div id="menubar">
        <ul id="menu">
          <li class="current"><a href="index.php">首頁</a></li>
          <li><a href="searching.php">店家查詢</a></li>
          <li><a href="member_login.php">會員登入</a></li>
          <li><a href="message.php">我要留言</a></li>
          <li><a href="board.php">排行榜</a></li>
        </ul>
      </div><!--end menubar-->
    </div><!--end header-->
    
	<div id="site_content">
    <center> 
    <p />   
	<?php 
	  if($content == null){
	  echo "<script> alert('請輸入查詢內容!!!')</script>";
	  echo '<meta http-equiv=REFRESH CONTENT=1;url=searching.php>'; 
      }
      else{
    ?>
  <form id="form1" name="form1">
   <table border="1">
    <tr>
     <td>特約商店名</td>
     <td>行業別</td>
     <td>電話</td>
     <td>地址</td>
     <td><div align="center">收卡機構</div></td>
     <td><div align="center">特別資訊</div></td>
    </tr>
   <?php do { ?>

    <tr>
     <td height="84"><?php echo $row_result['storeName']; ?></td>
     <td><?php echo $row_result['industry']; ?></td>
     <td><?php echo $row_result['call']; ?></td>
     <td><?php echo $row_result['address']; ?></td>
     <td><p align="center">&nbsp;</p>
       <p><?php echo $row_result['cardAgency']; ?></p></td>
     <td><a href="photolist.php">more</a></td>
    </tr>

   <?php } while ($row_result = mysql_fetch_assoc($result));?>
   </table>
  </form> 

   <?php
    mysql_free_result($result); //釋放查詢結果所佔用的記憶體
   ?>
   <? } ?>
   </center>
   <p /><p /><p /><p />
	</div><!--end site_content--> 
  </div><!--end main-->
  
  <div id="footer">
    <div id="footer_container"><!--close footer_container_box--><!--close footer_container_box--><!--close footer_container_box1-->      
	  <br style="clear:both"/>
	  <br />
<center>
  website template by 第九組 2014.12 | <a href="admin_login.php"> 管理員登入 </a>
</center>
    </div><!--close footer_container--> 
  </div><!--close footer-->  
  
</body>
</html>
