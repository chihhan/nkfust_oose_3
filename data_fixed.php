<? session_start(); 
include("connect.inc.php");
$acc = $_SESSION['acc']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>國民旅遊卡_資料修改完成</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
 <?
if($_SESSION['acc'] == $acc)
{
$sql = "SELECT * FROM opendata where acc='$acc'";

$result = mysql_query($sql) or die(mysql_error());  // 執行SQL查詢
$row_result = mysql_fetch_assoc($result); //將陣列以欄位名索引
mysql_query("set names utf8"); //將資料庫設定為utf8編碼，防止中文亂碼

?>

</head>

<body>
  <div id="main">
    <div id="header">
      <div id="welcome">
	    <h1><span>FIXED_FINISH</span></h1>
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
      <table align="center">
	<tr>
    <td align="center" colspan="2"><h2>特約商店資料</h2></td>
	</tr>
    <td>特約商店名</td>
    <td><?php echo $row_result['storeName']; ?></td>
	<tr>
    <td>行業別</td>
    <td><?php echo $row_result['industry']; ?></td>
	</tr>
    <tr>
    <td>電話</td>
    <td><?php echo $row_result['call']; ?></td>
	</tr>
    <tr>
    <td>地址</td>
    <td><?php echo $row_result['address']; ?></td>
	</tr>
    <tr>
    <td>收單機構</td>
    <td><?php echo $row_result['cardAgency']; ?></td>
	</tr>
</table>
<? } ?>
      <p /><p /><p /><p />
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
