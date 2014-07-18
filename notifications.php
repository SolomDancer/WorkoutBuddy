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
    <?php include 'header.php';  ?>     
    <?php include 'leftCol.php';  ?> 
    <!-- include header because All pages will be the same if I make any change-->
    <body>
<div id="wrap">
<div id="right" >

    You have 0 Notification

</div>
<div id="footer" align="right">
<p>Copyright © 2012 Chakatpum Srisuvanunta</p>
</div>
</div>
        
</body>
