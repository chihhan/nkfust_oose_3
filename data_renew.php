<?php session_start(); 
include("connect.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php 
if($_SESSION['acc'] != null)
{
        
        $sql = "SELECT * FROM opendata where acc='$acc'";
		$result = mysql_query($sql) or die(mysql_error());  // 執行SQL查詢
		$row_result = mysql_fetch_assoc($result); //將陣列以欄位名索引
		mysql_query("set names utf8"); //將資料庫設定為utf8編碼，防止中文亂碼
        
        
?>
  <title>國民旅遊卡_資料編輯</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>


<body>
  <div id="main">
    <div id="header">
      <div id="welcome">
	    <h1><span>EDIT</span></h1>
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
      <form name="form" method="post" action="update_finish.php">
     <div align="center"><h2>特約商店資料修改</h2></div>
     <table align="center">
     <tr>
     	<td>特約商店名：</td>
        <td><input type="text" name="storeName" value="<?=$row_result['storeName']?>"/>
        </td>
     <tr>
     	<td>行業別:</td>
     	<td><?php echo $row_result['industry'];?></td>
     <tr>
     	<td>電話：</td>
     	<td><input type="text" name="call" value="<?=$row_result['call']?>"/></td>
     </tr>
     <tr>
     	<td>地址：</td>
     	<td><input type="text" name="address" value="<?=$row_result['address']?>"/></td>
     </tr>
     <tr>
     	<td>收單機構：</td>
        <td><input type="text" name="cardAgency" value="<?=$row_result['cardAgency']?>"/></td>
     </tr>
     <tr>
     	<td>帳號：</td>
     	
        <td><?php echo $row_result['acc'];?></td>
     </tr>
     <? if(isset($_GET[peo]) && $_GET[peo] ==pwd){?>
     <tr>
     	<td>密碼：</td>
        <td><input type="password" name="password1"?>
        </td>
      </tr>
      </tr>
     <tr>
     <td>確認密碼:</td>
     <td><input type="password" name="password2"?></td>
     </tr>
      <? }else{ ?>
      <tr>
		<td>密碼：</td>
        <td>
		<a href="?peo=pwd">修改密碼</a>
        </td>
       </tr>
		<? }?>
      <tr>
        <td height="22" colspan="2"><div align="right">          <input type="submit" name="submit" value="完成" /></td></tr>
   </table></form>   
   <?php } 
else
{
        echo "<script> alert('您無權限觀看此頁面!')</script>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?> 	
      <p /> <a href="photoupload.php">編輯更多</a>
      <p /><p /><p />
	</div><!--end site_content--> 
  </div><!--end main-->
  
  <!--close footer_container_box1-->      
	  <br style="clear:both"/>
	  <br />
<center>
  website template by 第九組 2014.12 | <a href="admin_login.php"> 管理員登入 </a>
</center>
    </div><!--close footer_container--> 
  </div><!--close footer-->  
  
</body>
</html>
