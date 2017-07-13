<?php
//0.外部ファイル読み込み
include("functions.php");
$pdo = db_con();

$id = $_GET["id"];

//1.  DB接続します


//２．データ登録SQL作成(gs_an_table)
$stmt = $pdo->prepare("DELETE FROM item_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4.select.phpと同じようにデータを取得（以下はイチ例）
if($status==false){
  //execute（SQL実行時にエラーがある場合）
 	qerror($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  // $result = $stmt->fetch();//$result["id"];
	header("Location: mypage.php");
    exit;
}

?>