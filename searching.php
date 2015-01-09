<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<? include("connect.inc.php");  ?>
  <title>國民旅遊卡_店家查詢</title>
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
	    <h1><span>SEARCH</span></h1>
	  </div><!--end welcome-->
      <div id="menubar">
        <ul id="menu">
          <li class="current"><a href="index.php">首頁</a></li>
          <li><a href="searching.php">店家查詢</a></li>
          <li><a href="member_login.php">會員登入</a></li>
          <li><a href="msg_list.php">留言板</a></li>
          <li><a href="board.php">排行榜</a></li>
        </ul>
      </div><!--end menubar-->
    </div><!--end header-->
    
	<div id="site_content">  
	  <center>
      <p />	
      <form name="form" method="post" action="searching_result.php">
		<table width="469" align="center">
  		<tr>
    	  <td colspan="2"><h2>使用者查詢各約商店</h2></td>
  		</tr>
  		<tr>
    	  <td width="132"><select id="selected" name="selected">
      		<option name="all" value="0">行業別</option>
      		<option name="a" value="1">特約商店名</option>
      		<option name="b" value="2">收單機構</option>
      		</select></td>
    	  <td width="303" colspan="-2"><input type="text" name="content" size="40" /></td>
  		</tr>
  		<tr>
    	  <td colspan="2"><div align="right"><input type="submit" name="submit" value="查詢" /></div></td>
  		</tr>
		</table>
	  </form>
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
