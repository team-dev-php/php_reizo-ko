<?php

//外部ファイル読み込み
include("functions.php");

//DB接続
$pdo = db_con();
$user_names = $_POST["user_names"];

// $user_namesのユーザー名毎に消費期限の近いアイテム達を取得

$end_items=[];
foreach ($user_names as $value) {
  $stmt = $pdo->prepare("SELECT * FROM item_table WHERE (end_date = curdate() + INTERVAL 1 DAY or end_date = curdate() + INTERVAL 2 DAY or end_date = curdate() + INTERVAL 3 DAY) and name = :user_name" );
  $stmt->bindValue(':user_name', $value , PDO::PARAM_STR);
  // $stmt->bindValue(':end_date1', $end_date1 , PDO::PARAM_STR);
  // $stmt->bindValue(':end_date2', $end_date2 , PDO::PARAM_STR);
  // $stmt->bindValue(':end_date3', $end_date3 , PDO::PARAM_STR);
  $status = $stmt->execute();

  if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);

  }else{
    //Selectデータの数だけ自動でループしてくれる
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
     //$end_itemsに入れていく。
      $item_date =[$result["name"],$result["item_name"],$result["end_date"]];
      $end_items[] = $item_date;

    }

  }


}

// $test = ["test" =>["test-item","test-date"],"test2"=>["test2-item","test3-item"]];
echo json_encode($end_items);
?>