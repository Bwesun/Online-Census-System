<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connect = "localhost";
$database_connect = "cart";
$username_connect = "root";
$password_connect = "";

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("cart");
?>