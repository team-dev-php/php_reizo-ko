<?php
// 0. 外部ファイル読みこみ
include("functions.php");
//入力チェック（受信確認処理追加）
if(
    !isset($_POST["item_name"]) || $_POST["item_name"] == "" ||
    !isset($_POST["url"]) || $_POST["url"] == ""
){
    exit("ParamError");
}
//1. POSTデータ取得
$item_name = $_POST["item_name"];
$url = $_POST["url"];



//1.  DB接続します
$pdo = db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO item_table(id, item_name, url, indate, end_date)VALUES(NULL, :item_name, :url, sysdate(), sysdate() + INTERVAL 1 WEEK)");
$stmt->bindValue(':item_name', $item_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$status = $stmt->execute();//上記が全て実行された後の結果を$statusに格納


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();//エラーオブジェクトは配列の形で$errorに全て入る
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: item.php");
  exit;

}
?>
