<?php
	session_start();
	$_SESSION['user_name'] = $_POST["user_name"];
	$_SESSION['user_email'] = $_POST["user_email"];

	//５．index.phpへリダイレクト
	header("Location: mypage.php");
	exit;
?>