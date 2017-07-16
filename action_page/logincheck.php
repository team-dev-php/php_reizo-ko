<?php
	session_start();
	$_SESSION['user_name'] = $_POST["user_name"];
	$_SESSION['user_email'] = $_POST["user_email"];
	$_SESSION['icon'] = $_POST['icon'];
	//外部ファイル読み込み
    include("functions.php");

    //DB接続
    $pdo = db_con();
	$stmt = $pdo->prepare("UPDATE user_table SET icon = :icon WHERE name =:name");
    $stmt->bindValue(':name',$_POST['user_name'],PDO::PARAM_STR);
    $stmt->bindValue(':icon',$_POST['icon'],PDO::PARAM_STR);
    $res = $stmt->execute();

	//５．index.phpへリダイレクト
	header("Location: mypage.php");
	exit;
?>