<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="presid.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Workout Buddy</title>
<style type="text/css">
.login
{
    z-index:100;
    position:absolute;      
    top:30px;
    font-size:14px;
   /* margin-left:0px;*/
}
</style>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
  //Calendar
  $(document).ready(function() {
    //$("#datepicker").datepicker();
	$( "#datepicker" ).datepicker({ dateFormat : 'yy-mm-dd' });
  });
 </script>
    </head>
    <?php include 'header.php';  
          include 'leftCol.php';
    ?>     
    <!-- include header because All pages will be the same if I make any change-->
    <body>
<div id="wrap">
<div id="right" >
    <?php
date_default_timezone_set('America/New_York');
$current_time = date("Y-m-d H:i:s");

if( isset($_SESSION["RecordID"]) ){
    echo "<br>Your Check out Date/Time: ". date("Y-m-d H:i:s")."\n";   
}else{
    echo "<br>Your Check in Date/Time: ". date("Y-m-d H:i:s")."\n";
}
    ?>               
</div>
<div id="footer" align="right">
<p>Copyright © 2012 Chakatpum Srisuvanunta</p>
</div>
</div>
 <?php
 if( isset($_SESSION['RecordID'])  ){
    $strSQL = "UPDATE workout_record SET 
               Timeout = '".$current_time."' 
               WHERE RecordID = '".$_SESSION['RecordID']."' ";
               $objQuery = mysql_query($strSQL);

               if($objQuery) { 
               $message = "Check out Completed!";
               echo "<script type='text/javascript'>alert('$message');
               window.location = 'WorkoutRecord.php';
               </script>";
                unset($_SESSION['RecordID']);
               } else { 
               echo "SQL ERROR!<br>".$strSQL.mysql_error();
               echo "<br> Go to <a href='MyProfile.php'>Back to User Page</a>";
               }
               mysql_close();
            }
else{
     $strSQL = "INSERT workout_record (UserID, TimeIn) VALUES
                ('".$_SESSION["UserID"]."','".$current_time."')";
               $objQuery = mysql_query($strSQL);

               if($objQuery) { 
               $message = "Check-in! RecordID=".mysql_insert_id();
               echo "<script type='text/javascript'>alert('$message');
               window.location = 'WorkoutRecord.php';
               </script>"; 
               $_SESSION['RecordID'] = mysql_insert_id();
               } else { 
               echo "SQL ERROR!<br>".$strSQL."<br>".mysql_error();
               echo "<br> Go to <a href='MyProfile.php'>Back to User Page</a>";
               }
               mysql_close(); 
}
 ?>
</body>