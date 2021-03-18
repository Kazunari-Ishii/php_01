<?php
session_start();

if(!isset($_SESSION["user_name"])) {
	$no_login_url = "index.php";
	header("Location: {$no_login_url}");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>おめでとう</title>
	<link rel='stylesheet' href='style2.css'>
</head>
<body>
<img src="img/7.png" alt=""><br>
<img src="img/8.png" alt="">
</body>
</html>