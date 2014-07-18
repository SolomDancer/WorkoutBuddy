<html>
    <head>
        <title>phpMySQLConnect</title>
    </head>
<body>
<?php
//include 'exit_login.php';
session_start();
$db_host = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "info425";

$con = mysql_connect($db_host,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
@mysql_select_db ("$db_name") or die ("NO DATABASE");
@mysql_query("SET NAMES UTF8");
?>

</body>

</html>
