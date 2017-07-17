<?php
session_start();
include("functions.php");

//DB接続
$pdo = db_con();
$user_name = $_SESSION["user_name"];

//4.user_nameで、lifelog_tableから過去の保存情報一式を取得して表示
  $stmt4 = $pdo->prepare("SELECT * FROM frigo_itemlog_table WHERE name = :user_name");
  $stmt4->bindValue(':user_name', $user_name , PDO::PARAM_STR);
  $status4 = $stmt4->execute();

  //データ表示
  $itemlog="";
  if($status4==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt4->errorInfo();
    exit("ErrorQuery:".$error[2]);

  }else{
    //Selectデータの数だけ自動でループしてくれる
      $analitics = [];
      $category_name1 = 0;
      $category_name2 = 0;
      $category_name3 = 0;

    while( $result = $stmt4->fetch(PDO::FETCH_ASSOC)){
      if($result["category"] == "テスト1" ){
          $category_name1++;
      } else if($result["category"] == "テスト2"){
          $category_name2++;
      } else if($result["category"] == null){
          $category_name3++;
      }

      // $itemlog .= "<tr>";
      // // $view .= '<a href = "detail.php?id='.$result["id"].'" >';
      // $itemlog .="<td>";
      // $itemlog .= $result["item_name"];
      // $itemlog .= "</td><td>";
      // $itemlog .= $result["indate"];
      // $itemlog .= "</td><td>";
      // $itemlog .= $result["end_date"];
      // $itemlog .="</td>";
      // $itemlog .="<td>";
      // // $itemlog .= '<a href = "delete.php?id='.$result["id"].'" style="color:#18BC9C;">';
      // // $itemlog .= '[削除]';
      // // $itemlog .= '</a>';
      // $itemlog .="</td>";
      // $itemlog .= "</tr>";
      
    }
    $analitics["category_name1"] = $category_name1;
    $analitics["category_name2"] = $category_name2;
    $analitics["category_name3"] = $category_name3;
    // ,
    // ,
    // ,
    //分析用のオブジェクト[カテゴリ名：登録されている品目数]をjson形式で渡す。
    echo json_encode($analitics);

  }

?>