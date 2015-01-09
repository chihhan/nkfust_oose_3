<?php session_start(); 
$acc = $_SESSION['acc'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect.inc.php");

if($_SESSION['acc'] != null)
{
	if($storeName != null){$sql = "update opendata set storeName='$storeName' where acc ='$acc'";}
	elseif($call != null){$sql =  "update opendata set call='$call' where acc ='$acc'";}
	elseif($address != null){$sql = "update opendata set address='$address' where acc ='$acc'";}
	elseif($cardAgency != null){$sql = "update opendata set cardAgency='$cardAgency' where acc ='$acc'";}
	elseif($password1 != null && $password2 != null && $password1 == $password){$sql = "update opendata set pwd='$pwd' where acc ='$acc'";}
	
	if(mysql_query($sql)){
		echo "<script>alert('修改成功!')</script>";
		echo "<script>location.replace('data_fixed.php')</script>";}
        else
        {       echo "<script>alert('修改失敗!')</script>";
				echo "<script>location.replace('data_fixed.php')</script>";
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}


?>