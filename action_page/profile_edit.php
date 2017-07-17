<?php
session_start();
	$user_id = $_POST["user_id"];
	$user_nickname = $_POST["user_nickname"];
	// $user_email = $_POST["user_email"];
	$favorite_dish = $_POST["favorite_dish"];
	$belong_to = $_POST["belong_to"];
	$address = $_POST["address"];
	$icon =$_POST["icon"];

	//外部ファイル読み込み
    include("functions.php");
	$pdo = db_con();

	// $stmt = $pdo->prepare("UPDATE user_table SET name = :user_name, email = :user_email, favorite_dish = :favorite_dish, belong_to = :belong_to, address = :address, icon = :icon WHERE id = :id");
	$stmt = $pdo->prepare("UPDATE user_table SET user_nickname = :user_nickname, favorite_dish = :favorite_dish, belong_to = :belong_to, address = :address, icon = :icon WHERE id = :id");
	$stmt->bindValue(':id', $user_id, PDO::PARAM_STR);
    $stmt->bindValue(':user_nickname', $user_nickname, PDO::PARAM_STR);
    // $stmt->bindValue(':user_email', $user_email, PDO::PARAM_STR);
    $stmt->bindValue(':favorite_dish', $favorite_dish, PDO::PARAM_STR);
    $stmt->bindValue(':belong_to', $belong_to, PDO::PARAM_STR);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
    $stmt->bindValue(':icon', $icon, PDO::PARAM_STR);
    $status = $stmt->execute();

    if($status==false){
      //execute（SQL実行時にエラーがある場合）
      $error = $stmt->errorInfo();
      exit("ErrorQuery:".$error[2]);

    }else{
    	
    	$_SESSION["user_id"] = $user_id;
    	$_SESSION["user_nickname"] = $user_nickname;
    	// $_SESSION("user_email") = $user_email;s
    	$_SESSION["favorite_dish"] = $favorite_dish;
    	$_SESSION["belong_to"] = $belong_to;
    	$_SESSION["address"] = $address;
    	$_SESSION["icon"] = $icon;
    }

?>
