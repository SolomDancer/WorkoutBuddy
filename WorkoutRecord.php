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
<!-- Right Hand Column -->
<?php
$sql = "SELECT * FROM workout_record WHERE DrexelID = '".$_SESSION["DrexelID"]." ' ";
$query = mysql_query($sql);

if (false === $query) {
        echo mysql_error()."<br>".$query;
}
else {
echo '<table border="0" style="width:80%">';
echo '<tr>
        <td width="50px" bgcolor="#CCCC99"><center>Record ID </center></td>
        <td width="100px" bgcolor="#CCCC99">Time-In</td>
        <td width="100px" bgcolor="#CCCC99">Time-Out</td>
      </tr>';

while($row = mysql_fetch_array($query)){
  echo '<tr>
        <td><center>' .$row['RecordID'].'</center></td>
        <td>' .$row['TimeIn'].'</td>
        <td>' .$row['TimeOut'].'</td>
        </tr>';
}
echo '</table>';
}
?>
<a href='checkinout_record.php'>Download PDF Record</a>
</div>
<div id="footer" align="right">
<p>Copyright © 2012 Chakatpum Srisuvanunta</p>
</div>
</div>
        
</body>
