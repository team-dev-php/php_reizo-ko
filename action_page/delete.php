<?php
//0.外部ファイル読み込み
include("functions.php");
$pdo = db_con();

$id = $_GET["id"];

//frigo_itemlog_tableにアイテム情報を追加
$stmt0 = $pdo->prepare("UPDATE frigo_itemlog_table SET end_date = sysdate(), finish_flg = 1 WHERE id = :id");
$stmt0->bindValue(":id",$id,PDO::PARAM_INT);
$status0 = $stmt0->execute();

//２．データ登録SQL作成(gs_an_table)
$stmt = $pdo->prepare("DELETE FROM item_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4.select.phpと同じようにデータを取得（以下はイチ例）
if($status==false){
  //execute（SQL実行時にエラーがある場合）
 	qerror($stmt);
}else{
  // $result = $stmt->fetch();//$result["id"];
	header("Location: mypage.php");
    exit;
}

?>