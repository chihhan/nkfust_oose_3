<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_msg = "localhost";
$database_msg = "tw-card";
$username_msg = "root";
$password_msg = "1234";
$msg = mysql_pconnect($hostname_msg, $username_msg, $password_msg) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'");
?>