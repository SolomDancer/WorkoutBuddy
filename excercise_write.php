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
        
       // echo '<pre>' . print_r($_POST, TRUE) . '</pre>';
	if($_SESSION['UserID'] == ""){
		echo "Please Login!";
		exit();
	}

  $message = "Plan on ".$_POST['date']." has beed added";
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'GroupExercise.php';
                </script>";       
?>
</body>
</html>