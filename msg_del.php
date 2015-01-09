<?php include('msg.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
  }
}

if ((isset($_GET['msgNo'])) && ($_GET['msgNo'] != "") && (isset($_POST['delete']))) {
  $deleteSQL = sprintf("DELETE FROM msg WHERE msgNo=%s",
                       GetSQLValueString($_GET['msgNo'], "int"));

  mysql_select_db($database_msg, $msg);
  $Result1 = mysql_query($deleteSQL, $msg) or die(mysql_error());

  $deleteGoTo = "msg_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['msgNo'])) {
  $colname_Recordset1 = $_GET['msgNo'];
}
mysql_select_db($database_msg, $msg);
$query_Recordset1 = sprintf("SELECT * FROM msg WHERE msgNo = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $msg) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <title>國民旅遊卡_刪除留言</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="welcome">
	    <h1><span>MESSAGE_DEL</span></h1>
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
      <div align="center">
  <p>您確定要刪除此則留言嗎? </p>
  <p>&nbsp;</p>
</div>
<form method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">留言筆數:</td>
      <td><?php echo $row_Recordset1['msgNo']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">姓名:</td>
      <td><input type="text" name="m_name" value="<?php echo htmlentities($row_Recordset1['m_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">留言內容:</td>
      <td><input type="text" name="m_msg" value="<?php echo htmlentities($row_Recordset1['m_msg'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">留言時間:</td>
      <td><input type="text" name="time" value="<?php echo htmlentities($row_Recordset1['time'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td align="right"><input name="delete" type="submit" id="delete" value="刪除留言" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="msgNo" value="<?php echo $row_Recordset1['msgNo']; ?>" />
</form>
<p align="center"><a href="msg_admin.php">回上一頁</a></p>
<div align="center"></div>
      <p /><p />
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
<?php
mysql_free_result($Recordset1);
?>