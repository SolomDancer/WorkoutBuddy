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
<script type="text/javascript">
function change( el )
{
    if ( el.value === "Add Friend"){
        el.value = "Unfriend";
        el.style.width = "100px"; 
    }else if(el.value === "Confirm"){
        el.value = "Unfriend";
        el.style.width = "100px"; 
        var ig = document.getElementById("ig");
        ig.value = "Calendar";
        ig.style.width = "100px"; 
    }
    else{
        el.value = "Add Friend";
        el.style.width = "100px";  
    }
}
</script>
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
    <table width="100%" border="0">
<?php //Check User on User2 (Accept Reject)
    //$SQLuser2 = "SELECT * FROM friend_list, member WHERE friend_list.user2_id='".$_SESSION["UserID"]."' AND friend_list.user1_id=member.UserID ORDER BY approval_status DESC"; 
$SQL = "
SELECT * FROM friend_list f, member m WHERE f.user1_id='".$_SESSION["UserID"]."' AND f.user2_id=m.UserID 
UNION SELECT * FROM friend_list f, member m WHERE f.user2_id='".$_SESSION["UserID"]."' AND f.user1_id=m.UserID 
ORDER BY approval_status, user2_id='".$_SESSION["UserID"]."';";    
$objQuery = mysql_query($SQL) or die ("Error Query [".$SQL."]");
    while($objResult = mysql_fetch_array($objQuery))    {
?>
        <tr>
		<td><div align="center"><?php echo $objResult["UserID"];?></div></td>
		<td><?php echo $objResult["fname"];?></td>
		<td><?php echo $objResult["lname"];?></td>
		<td><div align="center"><?php echo $objResult["email"];?></div></td>
                <td><div align="center"><?php echo $objResult["status"];?> </div></td>
                <td><div align="center"><?php
	
        $approval_status = $objResult["approval_status"];
            if ($approval_status=="approve"){
            echo '<input type="button" style="width: 100px" value="Unfriend" onClick="window.location=\'update_FriendList.php?action=UNFRIEND&FLID='.$objResult["FLID"].'\'"/> ';
            echo '<input type="button" style="width: 100px" value="Calendar" onClick="window.location=\'GroupExercise.php\'"/> '; 
            }
            elseif($approval_status=="pending" && $objResult["user2_id"]==$_SESSION["UserID"]){
            echo '<input type="button" style="width: 100px; background-color:#CEED91;" value="Confirm" onClick="window.location=\'update_FriendList.php?action=CONFIRM&FLID='.$objResult["FLID"].'\'"/> ';    
            echo '<input type="button" style="width: 100px; background-color:#FE642E;" value="Ignore" onClick="window.location=\'update_FriendList.php?action=IGNORE&FLID='.$objResult["FLID"].'\'"/> ';
            }elseif($approval_status=="pending" && $objResult["user1_id"]==$_SESSION["UserID"]){
            echo '<input type="button" style="width: 200px; background-color:#819FF7;" value="Cancel Request" onClick="window.location=\'update_FriendList.php?action=CANCEL&FLID='.$objResult["FLID"].'\'"/> ';
            }
            else{echo "Error";}
        echo "</div></td></tr>";
    }        
?>        
	</table>
</div>
<div id="footer" align="right">
<p>Copyright © 2014 CS,IT </p>
</div>
</div>
        
</body>
