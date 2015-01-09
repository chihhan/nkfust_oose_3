<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect.inc.php");

$acc = $_POST['acc'];
$pwd = $_POST['pwd'];

//搜尋資料庫資料
$sql = "SELECT * FROM admin where acc='$acc' and pwd='$pwd'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($acc != null && $pwd != null && $row[1] == $acc && $row[2] == $pwd)
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['acc'] = $acc;
        echo "<script> alert('登入成功!!!')</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=msg_admin.php>';
}
else
{
        echo "<script> alert('登入失敗!!!')</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=admin_login.php>';
}
?>