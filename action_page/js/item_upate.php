<?php
	$item_id = $_POST["item_id"];
	$edit_item_name = $_POST["edit_item_name"];
	$edit_item_src = $_POST["edit_item_src"];
	$item_category = $_POST["item_category"];
	$indate = $_POST["indate"];
	$end_date = $_POST["end_date"];
	$item_id = $_POST["item_id"];
    
    include("functions.php");
    $pdo = db_con();
    $stmt = $pdo->prepare("UPDATE user_table SET item_name = :edit_item_name, url = :edit_item_src, category = :item_category, indate = :indate, end_date = :end_date WHERE id = :item_id");
	$stmt->bindValue(':item_id', $item_id, PDO::PARAM_STR);
    $stmt->bindValue(':edit_item_name', $edit_item_name, PDO::PARAM_STR);
    // $stmt->bindValue(':user_email', $user_email, PDO::PARAM_STR);
    $stmt->bindValue(':item_category', $item_category, PDO::PARAM_STR);
    $stmt->bindValue(':indate', $indate, PDO::PARAM_STR);
    $stmt->bindValue(':end_date', $end_date, PDO::PARAM_STR);
    // $stmt->bindValue(':icon', $icon, PDO::PARAM_STR);
    $status = $stmt->execute();

    //データ表示
    $item_info = [];
    if($status==false){
      //execute（SQL実行時にエラーがある場合）
      $error = $stmt->errorInfo();
      exit("ErrorQuery:".$error[2]);

    }else{
      //Selectデータの数だけ自動でループしてくれる
      while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

        // $item_info["id"] = $result["id"];
        // $item_info["item_name"] = $result["item_name"];
        // $item_info["category"] = $result["category"];
        // $item_info["url"] = $result["url"];
        // $item_info["id"] = $result["id"];
        // $item_info["indate"] = $result["indate"];
        // $item_info["end_date"] = $result["end_date"];

      }
    }
      // $data = json_encode($it);


?>