<?php
	$user_id = $_POST["user_id"];
	$user_name = $_POST["user_name"];
	$user_email = $_POST["user_email"];
	$favorite_dish = $_POST["favorite_dish"];
	$belong_to = $_POST["belong_to"];
	$address = $_POST["address"];
	$icon =$_POST["icon"];

	//外部ファイル読み込み
    include("functions.php");
	$pdo = db_con();

	$stmt = $pdo->prepare("UPDATE user_table SET name = :user_name, email = :user_email, favorite_dish = :favorite_dish, belong_to = :belong_to, address = :address, icon = :icon WHERE id = :id");
	$stmt->bindValue(':id', $user_id, PDO::PARAM_STR);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue(':user_email', $user_email, PDO::PARAM_STR);
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
    	echo "success!";
    }

?>
