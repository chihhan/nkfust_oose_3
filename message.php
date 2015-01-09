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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO msg (m_name, m_msg) VALUES (%s, %s)",
                       GetSQLValueString($_POST['m_name'], "text"),
                       GetSQLValueString($_POST['m_msg'], "text"));

  mysql_select_db($database_msg, $msg);
  $Result1 = mysql_query($insertSQL, $msg) or die(mysql_error());

  $insertGoTo = "thx.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_msg, $msg);
$query_Recordset1 = "SELECT * FROM msg";
$Recordset1 = mysql_query($query_Recordset1, $msg) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>

  <title>國民旅遊卡_我要留言</title>
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
	    <h1><span>MESSAGE</span></h1>
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
	  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr>
      <td colspan="2" ><h2>我要留言</h2></td>
  	</tr>
    <tr>
      <td width="35" align="center" nowrap="nowrap">姓名:</td>
      <td width="237"><input type="text" name="m_name" value="" size="32" /></td>
    </tr>
    <tr>
      <td height="123" align="center" nowrap="nowrap">留言:</td>
      <td><textarea name="m_msg" cols="32" rows="8"></textarea></td>
    </tr>
    <tr>
      <td height="23" align="right" nowrap="nowrap"></td>
      <td align="right"><input type="submit" value="新增留言" />
      <input type="reset" name="button" id="button" value="重新填寫" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form> 
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
<?php
mysql_free_result($Recordset1);
?>
