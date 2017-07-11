<?php
//外部ファイル読み込み
include("functions.php");

//DB接続
$pdo = db_con();

//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM item_table");
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    // $view .= '<a href = "detail.php?id='.$result["id"].'" >';
    $view .= $result["id"];
    $view .= " : ";
    $view .= $result["item_name"];
    $view .= " ";
    $view .= $result["url"];
    // $view .= " ";
    // $view .= $result["indate"];
    // $view .= " ";
    // $view .= $result["end_date"];
    // $view .= '</a>';
    // $view .= '<a href = "delete.php?id='.$result["id"].'" >';
    // $view .= '[削除]';
    // $view .= '</a>';
    $view .= "</p>";
  }

}

 ?>
 <!DOCTYPE html>
 <html lang="ja">
 <head>
   <meta charset="UTF-8">
   <title>ITEM</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <style>div{padding: 10px;font-size:16px;}</style>
 </head>
 <body>

 <!-- Head[Start] -->
 <header>
   <!-- <nav class="navbar navbar-default">
     <div class="container-fluid">
     <div class="navbar-header"><a class="navbar-brand" href="#"></a></div>
     </div>
   </nav> -->
 </header>
 <!-- Head[End] -->

 <!-- アイテム一覧表示 -->
 <div>
     <div class="container jumbotron"><?=$view?></div>
 </div>

 <!-- Main[Start] -->
 <!-- <form method="post" action="insert.php">
   <div class="jumbotron">
    <fieldset>
     <legend>商品登録</legend>
      <label>商品名：<input type="text" name="item_name"></label><br>
      <label>画像URL：<input type="text" name="url"></label><br>
      <input type="submit" value="送信">
     </fieldset>
   </div>
 </form> -->

 <!-- Main[End] -->


 </body>
 </html>
