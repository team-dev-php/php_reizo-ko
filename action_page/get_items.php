<?php

//外部ファイル読み込み
include("functions.php");

//DB接続
$pdo = db_con();


// $end_date1 = sysdate() + INTERVAL 1 DAY;
    // $end_date2 = sysdate() + INTERVAL 2 DAY;
    // $end_date3 = sysdate() + INTERVAL 3 DAY;
    // $stmt = $pdo->prepare("SELECT * FROM item_table WHERE end_date = :end_date1 or end_date2 = :end_date2 or end_date3 = :end_date3");
    // $stmt->bindValue(':end_date1', $end_date1 , PDO::PARAM_STR);
    // $stmt->bindValue(':end_date2', $end_date2 , PDO::PARAM_STR);
    // $stmt->bindValue(':end_date3', $end_date3 , PDO::PARAM_STR);
    // $end_date1 = sysdate() + INTERVAL 1 DAY;
    // $end_date2 = sysdate() + INTERVAL 2 DAY;
    // $end_date3 = sysdate() + INTERVAL 3 DAY;
    $stmt = $pdo->prepare("SELECT * FROM item_table WHERE end_date = sysdate() + INTERVAL 1 DAY or end_date = sysdate() + INTERVAL 2 DAY or end_date = sysdate() + INTERVAL 3 DAY");
    // $stmt->bindValue(':end_date1', $end_date1 , PDO::PARAM_STR);
    // $stmt->bindValue(':end_date2', $end_date2 , PDO::PARAM_STR);
    // $stmt->bindValue(':end_date3', $end_date3 , PDO::PARAM_STR);
    $status = $stmt->execute();

    $end_items=[];
    if($status==false){
      //execute（SQL実行時にエラーがある場合）
      $error = $stmt->errorInfo();
      exit("ErrorQuery:".$error[2]);

    }else{
      //Selectデータの数だけ自動でループしてくれる
      while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
       //$end_itemsに入れていく。
        $item_date =[$result["user"],$result["item_name"],$result["end_date"]];
        $end_items[] = $item_date;

      }

    }
    // $test = ["test" =>["test-item","test-date"],"test2"=>["test2-item","test3-item"]];
    echo json_encode($end_items);
?>