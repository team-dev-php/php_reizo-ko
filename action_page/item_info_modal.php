<?php
    $item_id = $_POST["item_id"];

    $stmt = $pdo->prepare("SELECT * FROM item_table WHERE id = :item_id");
    $stmt->bindValue(':item_id', $item_id , PDO::PARAM_STR);
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

        $item_info["id"] = $result["id"];
        $item_info["item_name"] = $result["item_name"];
        $item_info["category"] = $result["category"];
        $item_info["url"] = $result["url"];
        $item_info["id"] = $result["id"];
        $item_info["indate"] = $result["indate"];
        $item_info["end_date"] = $result["end_date"];

      }

      echo json_encode($item_info);
?>