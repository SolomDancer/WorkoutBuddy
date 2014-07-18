<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="presid.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Workout Buddy</title>
<style type="text/css">
.login{
    z-index:100;
    position:absolute;      
    top:30px;
    font-size:14px;
}
input.placeholder { color: #000; }
input.placeholder::-webkit-input-placeholder { color: #555; }
input.placeholder:focus::-webkit-input-placeholder { color: #999; }
input.placeholder:-moz-placeholder { color: #555; }
</style>
<script type="text/javascript">
function change( el ){
    if (el.value === "Add Friend"){  el.value = "Pending"; }
    else if(el.value === "Pending"){ el.value = "Add Friend"; }   
    else if(el.value === "Unfriend"){ el.value = "Add Friend"; }   
    else{ el.value = "Error"; }    
}
</script>
    </head>
    <?php include 'header.php';  ?>     
    <?php include 'leftCol.php';  ?> 
    <!-- include header because All pages will be the same if I make any change-->
    <body>
<div id="wrap">
<div id="right" >
<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
  <table width="599" border="0">
    <tr><th>Search Friend 
     <input type="text" name="txtKeyword" id="txtKeyword" class="placeholder" placeholder="Enter ID, first or lastname" style="width: 200px">
      <input type="submit" style="width: 170px" value='Search'>
    </th></tr>
  </table>
</form>
<?php 
/* @var $_GET type */
if (isset($_GET["txtKeyword"])) {
	// Search By Name or Email
        ?>
	<table width="100%" border="0">
	  <tr>
		<th> <div align="center">Drexel ID </div></th>
		<th>First Name </th>
		<th>Last name </th>
		<th> <div align="center">Email </div></th>
                <th> <div align="center">Role </div></th>
		<th> <div align="center"> </div></th>
	  </tr>
	<?php
        //$strSQL = "SELECT * FROM member WHERE (UserID LIKE '%".$_GET["txtKeyword"]."%' or fname LIKE '%".$_GET["txtKeyword"]."%' or lname LIKE '%".$_GET["txtKeyword"]."%' )"; 
	$strSQL = "SELECT * FROM member WHERE (UserID LIKE '%".$_GET["txtKeyword"]."%' or fname LIKE '%".$_GET["txtKeyword"]."%' or lname LIKE '%".$_GET["txtKeyword"]."%' ) and UserID NOT IN (".$_SESSION["UserID"].")";
        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?php echo $objResult["UserID"];?></div></td>
		<td><?php echo $objResult["fname"];?></td>
		<td><?php echo $objResult["lname"];?></td>
		<td><div align="center"><?php echo $objResult["email"];?></div></td>
                <td><div align="center"><?php echo $objResult["status"];?> </div></td>
                <td><div align="center"><?php 
        $sqlfriend = "SELECT * FROM friend_list where user1_id='".$_SESSION["UserID"]."' and user2_id='".$objResult["UserID"]."' UNION ALL
        SELECT * FROM friend_list where user2_id='".$_SESSION["UserID"]."' and user1_id='".$objResult["UserID"]."';";
        $objFriend = mysql_query($sqlfriend) or die ("Error Query [".$strSQL."]");
	$frdResult = mysql_fetch_array($objFriend);
	if(!$frdResult){
        echo '<input type="button" style="width: 200px; background-color:#CEED91;" value="Add Friend" onClick="window.location=\'update_FriendList.php?action=ADDFRIEND&UserID='.$objResult["UserID"].'\'"/> ';
	}
	else{$approval_status = $frdResult["approval_status"];
            if ($approval_status=="approve"){
            echo '<input type="button" style="width: 100px" value="Unfriend" onClick="window.location=\'update_FriendList.php?action=UNFRIEND&FLID='.$frdResult ["FLID"].'\'"/> ';
            echo '<input type="button" style="width: 100px" value="Calendar" onClick="window.location=\'GroupExercise.php\'"/> '; 
            }
            elseif($approval_status=="pending" && $frdResult ["user2_id"]==$_SESSION["UserID"]){
            echo '<input type="button" style="width: 100px; background-color:#CEED91;" value="Confirm" onClick="window.location=\'update_FriendList.php?action=CONFIRM&FLID='.$frdResult["FLID"].'\'"/> ';    
            echo '<input type="button" style="width: 100px; background-color:#FE642E;" value="Ignore" onClick="window.location=\'update_FriendList.php?action=IGNORE&FLID='.$frdResult["FLID"].'\'"/> ';
            }elseif($approval_status=="pending" && $frdResult ["user1_id"]==$_SESSION["UserID"]){
            echo '<input type="button" style="width: 200px; background-color:#819FF7;" value="Cancel Request" onClick="window.location=\'update_FriendList.php?action=CANCEL&FLID='.$frdResult["FLID"].'\'"/> ';
            }
            else{echo "Error";}
        }
        ?>
        </div></td>
	<?php echo "";
	}
	?>
	</table>
<?php
}
?>   
</div>
<div id="footer" align="right">
<p>Copyright © 2014 CS,IT </p>
</div>
</div>    
</body>
