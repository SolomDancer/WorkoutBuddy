<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">   
</head>
<body>
<?php
if(!isset($_SESSION['UserID'])) {
$message = "Please Login";
echo "<script type='text/javascript'>alert('$message');
    window.location = 'javascript:history.go(-1)';
</script>";    
exit();
}
?>
</body>
</html>