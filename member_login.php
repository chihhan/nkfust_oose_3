<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<? include("connect.inc.php"); ?>
  <title>國民旅遊卡_會員登入</title>
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
	    <h1><span>LOGIN</span></h1>
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
      <div id="apDiv1">
       <center> 
       <p /> 
        <form id="form" method="post" action="login_m.php"> 
  		<table align="center">
    	  <tr>
      		<td align="center"><h2>特約商店登入</h2></td>
          </tr>
          <tr>
            <td><table align="center">
              <tr>
                <td>帳號：</td>
                <td><label for="acc"></label>
            		<input type="text" name="acc"/></td>
        	  </tr>
              <tr>
                <td>密碼：</td>
                <td><label for="password3"></label>
            		<input type="password" name="pwd" maxlength="12" /></td>
              </tr>
              <tr>
        	    <td colspan="2" align="right">
                  <a href="admin_login.php">管理員登入</a>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <div align="right">
            		<input type="submit" name="submit" value="登入" />
                  </div>
                </td>
              </tr>
            </table></td>
          </tr>
        </table>
        </form> 
       </center>    
      </div>
      <p /><p /><p /><p /> 
	</div><!--end site_content-->
  </div><!--end main-->
  
 <!--close footer_container_box1-->      
	  <br style="clear:both"/>
	  <br />
<center>
  website template by 第九組 2014.12 | <a href="member_login.php"> 管理員登入 </a>
</center>
    </div><!--close footer_container--> 
  </div><!--close footer-->  
  
</body>
</html>
