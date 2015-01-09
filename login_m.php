<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect.inc.php");

$acc = $_POST['acc'];
$pwd = $_POST['pwd'];

//搜尋資料庫資料
$sql = "SELECT * FROM opendata where acc = '$acc'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($acc != null && $pwd != null && $row[6] == $acc && $row[7] == $pwd)
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['acc'] = $acc;
        echo "<script>alert('成功登入')</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=data_renew.php>';
}
else
{
        echo "<script>alert('登入失敗')</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=member_login.php>';
}
?>