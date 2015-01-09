<?php require_once('Connections/msg.php'); ?>
<?php require_once('Connections/msg.php'); ?>
<? include('msg.php');  ?>
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

mysql_select_db($database_msg, $msg);
$query_Recordset1 = "SELECT * FROM album";
$Recordset1 = mysql_query($query_Recordset1, $msg) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);mysql_select_db($database_msg, $msg);
$query_Recordset1 = "SELECT * FROM album ORDER BY f_id DESC";
$Recordset1 = mysql_query($query_Recordset1, $msg) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$query_Recordset1 = "SELECT * FROM album";
$Recordset1 = mysql_query($query_Recordset1, $msg) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
		if ($_POST['pic']!=="none.jpg") {	
		$upload_file=$_FILES['upload']['tmp_name'];
		$upload_file_name=$_FILES['upload']['name'];

		if($upload_file){
			$file_size_max = 2000*1000;// 1M限制文件上传最大容量(bytes)
			$store_dir = "./upload/";// 上传文件的储存位置
			$accept_overwrite = 1;//是否允许覆盖相同文件
			// 检查文件大小
			if ($upload_file_size > $file_size_max) {
				echo "对不起，你的文件容量大于规定";
				exit;
			}
			
			// 检查读写文件
			if (file_exists($store_dir . $upload_file_name) && !$accept_overwrite) {
				echo "存在相同文件名的文件，请修改文件名后再上传。";
				exit;
			}
			
			//复制文件到指定目录
			if (!move_uploaded_file($upload_file,$store_dir.$upload_file_name)) {
				echo "复制文件失败";
			exit;
			}
			
		}

		
		$Erroe=$_FILES['upload']['error'];

		switch($Erroe) {
			case 0:

			break;
			case 1:
				Echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值."; 
			break;
			case 2:
				Echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。"; 
			break;
			case 3:
				Echo "文件只有部分被上传";
			break;
			case 4:
				Echo "没有文件被上传";
			break;
		}
	}

  $insertSQL = sprintf("INSERT INTO album (f_id, theme, content, `date`, pic) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['f_id'], "int"),
                       GetSQLValueString($_POST['theme'], "text"),
                       GetSQLValueString($_POST['content'], "text"),
                       GetSQLValueString($_POST['date'], "date"),
                       GetSQLValueString($_POST['pic'], "text"));

  mysql_select_db($database_msg, $msg);
  $Result1 = mysql_query($insertSQL, $msg) or die(mysql_error());

  $insertGoTo = "photolist.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>會員編輯</title>
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
	    <h1><span>會員編輯</span></h1>
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
	  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td height="123" colspan="2" align="right" nowrap="nowrap"><img src="upload/intel.jpg" width="204" height="204" align="left" id="imgview" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="left" nowrap="nowrap"><label for="upload"></label>
      <input name="pic" type="file" id="upload" size="50" onchange="checkandsetvalue();" /></td>
    </tr>
    <tr valign="baseline">
      <td width="37" align="right" nowrap="nowrap">主題:</td>
      <td width="391"><input type="text" name="theme" value="" size="50" /></td>
    </tr>
    <tr valign="baseline">
      <td height="78" align="right" nowrap="nowrap">內容:</td>
      <td><textarea name="content" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td height="27" align="right" nowrap="nowrap">&nbsp;</td>
      <td><input type="submit" value="新增po文" onclick="check();return document.checkValue;"/></td>
    </tr>
  </table>
  <input type="hidden" name="f_id" value="" />
  <input type="hidden" name="date" value="" />
  <input name="pic" type="hidden"  id="hiddenpost" value="intel.jpg" />
<input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
      </center>
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
<script type="text/javascript">
function checkandsetvalue(){
  var x = document.getElementById("upload");  //获取 upload 的 Dom
  var p = document.getElementById("hiddenpost");    //value=none.jpg
  var y = document.getElementById("imgview");
	
  if(!x || !x.value){
	  y.src = "upload/none.jpg";
	  p.value = x.value;
    return;
  }
  
  var patn = /\.jpg$|\.jpeg$|\.png$|\.gif$/i;  //限定上传文件后缀名

  if(patn.test(x.value)){ 
	  var filepath = x.value;
	  y.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = x.value;
	  
    if(filepath.lastIndexOf("\\")>0){
	  filepath = filepath.substring(filepath.lastIndexOf("\\")+1,filepath.length);
	}
    p.value = filepath; //将id 为 hiddenpost 的隐藏域的值替换为上传文。
  }else{
    alert("請選擇.jpg.jpeg .png .gif格式文件。");
  }
}

function check(){
  var error = '';
  var x = document.getElementById("upload");
  var p = document.getElementById("hiddenpost");

  if(!x || !x.value){
	p.src = x.src;
    return;
  }
  
  var patn = /\.jpg$|\.jpeg$|\.png$|\.gif$/i;  //限定上传文件后缀名
  if(!patn.test(x.value)){
	error = "上傳格是文件錯誤！";
    alert(error);
  }
  document.checkValue = (error == '');
}
</script>