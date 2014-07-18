<html>
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<script>
   
</script>    
</head>
<body>
<?php
	include("sqlconnect.php");
        
	$strSQL = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' 
	and Password = '".trim($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult){
        $message = "Invalid Username or Password";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'javascript:history.go(-1)';
        </script>"; 
	}
	else{
            $_SESSION["RFID"] = $objResult["RFID"];
            $_SESSION["UserID"] = $objResult["UserID"];
            $_SESSION["fname"] = $objResult["fname"];
            $_SESSION["lname"] = $objResult["lname"];
            $_SESSION["status"] = $objResult["status"];

            session_write_close();
            header("location:MyProfile.php");
		
	}
	@mysql_close();
?>
</body>
</html>