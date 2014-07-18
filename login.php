<?php
include("sqlconnect.php");

if( $con && isset($_SESSION['RFID']) ){
$strSQL = "SELECT * FROM member WHERE RFID = '" . $_SESSION['RFID'] . "' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);

    echo "<div class='login' align='right' style='margin-left:650px;'> Welcome,";
    echo $objResult["fname"];
    echo "<a href='check_logout.php'><input type='button' value='Logout' >";

}
else if(!isset($_SESSION['RFID'])){
  echo"
         <form name='form1' method='post' action='check_login.php'>
         <div class='login' align='right' style='margin-left:780px;'>
         USERNAME: <input type='text' name='txtUsername' style='width:120px;'></br>
         PASSWORD: <input type='password' name='txtPassword' style='width:120px; maxlength='20'></br>
         <input type='submit' name='Submit' value='Login'>
         </div>
         </form>   
        ";  
   
}

?>