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
    <table border="1" style="width:80%">
    <tbody>
      <tr>
        <td width="40%"> &nbsp;RFID </td>
        <td width="60%"><?php echo $objResult["RFID"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Status</td>
        <td><?php echo $objResult["status"];?></td>
      </tr>
      <tr>
        <td> &nbsp;Username</td>
        <td><?php echo $objResult["username"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;First Name</td>
        <td><?php echo $objResult["fname"];?></td>
      </tr>
      <tr>
        <td> &nbsp;Last Name</td>
        <td><?php echo $objResult["lname"];?></td>
      </tr>
      <tr>
        <td> &nbsp;Email Address</td>
        <td><?php echo $objResult["email"];?></td>
      </tr>
      <tr>
        <td> &nbsp;Height</td>
        <td><?php echo $objResult["height"];?></td>
      </tr>
    </tbody>
  </table>
  <table border="0" style="width:80%">
    <tbody>
        <tr>
           <td> <center> <input type="button" value=
                        <?php 
                        if( isset($_SESSION["RecordID"]) ){ echo "'Check Out'";   
                        }else{ echo "'Check In'"; }
                        ?>
                         onClick="window.location.href='checkin-out.php'"> </center></td>
        <td><div><a href="notifications.php">You have 0 notification</a></div></td> 
        </tr> 
    </tbody>
  </table>    
     
    
</div>
<div id="footer" align="right">
<p>Copyright © 2012 Chakatpum Srisuvanunta</p>
</div>
</div>
        
</body>
