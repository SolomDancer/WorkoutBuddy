<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
include("sqlconnect.php");

if(isset($_GET["DrexelID"]) && isset($_GET["action"]) && $_GET["action"] == "ADDFRIEND"){
// ADD FRIEND
    $SQL_AddFriend = "INSERT INTO friend_list (user1_id,user2_id,approval_status)"
            ." VALUES ('".$_SESSION["DrexelID"]."','".$_GET["DrexelID"]."','pending');";
    $objQuery = mysql_query($SQL_AddFriend);
    if($objQuery){echo "AddFriend Done.";   }
    else{ die ("Error Query [".$SQL_AddFriend."]");  } 
    echo "<br>".$_GET["action"];
    echo "<br>".$_GET["DrexelID"];
}elseif(isset($_GET["FLID"]) && isset($_GET["action"]) && $_GET["action"] == "UNFRIEND"){
// UNFRIEND
    $SQL_UNFRIEND = "DELETE FROM friend_list WHERE FLID='".$_GET["FLID"]."';";
    $objQuery = mysql_query($SQL_UNFRIEND);
    if($objQuery){echo "UNFRIEND Done.";   }
    else{ die ("Error Query [".$SQL_UNFRIEND."]");  } 
    echo "<br>".$_GET["action"];
    echo "<br>".$_GET["FLID"];
}elseif(isset($_GET["FLID"]) && isset($_GET["action"]) && $_GET["action"] == "CONFIRM"){
// CONFIRM
    $SQL_CONFIRM = "UPDATE friend_list SET approval_status='approve' WHERE FLID='".$_GET["FLID"]."';";
    $objQuery = mysql_query($SQL_CONFIRM);
    if($objQuery){echo "CONFIRM Done.";   }
    else{ die ("Error Query [".$SQL_CONFIRM."]");  } 
    echo "<br>".$_GET["action"];
    echo "<br>".$_GET["FLID"];
}elseif(isset($_GET["FLID"]) && isset($_GET["action"]) && $_GET["action"] == "IGNORE"){
// IGNORE
    $SQL_IGNORE = "DELETE FROM friend_list WHERE FLID='".$_GET["FLID"]."';";
    $objQuery = mysql_query($SQL_IGNORE);
    if($objQuery){echo "IGNORE Done.";   }
    else{ die ("Error Query [".$SQL_IGNORE."]");  } 
    echo "<br>".$_GET["action"];
    echo "<br>".$_GET["FLID"];
}elseif(isset($_GET["FLID"]) && isset($_GET["action"]) && $_GET["action"] == "CANCEL"){
// CANCEL REQUEST
    $SQL_CANCEL = "DELETE FROM friend_list WHERE FLID='".$_GET["FLID"]."';";
    $objQuery = mysql_query($SQL_CANCEL);
    if($objQuery){echo "CANCEL Done.";   }
    else{ die ("Error Query [".$SQL_CANCEL."]");  } 
    echo "<br>".$_GET["action"];
    echo "<br>".$_GET["FLID"];
    echo "<br>".$_GET["action"];
    echo "<br>".$_GET["FLID"];
}else{
    die("Check GET or ACTION in IF ELSE");
}

header("Location:FriendsList.php"); 
?>
    </body>
</html>
