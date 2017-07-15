<?php
session_start();
if(isset($_SESSION["user_name"]) == ""){

    header("Location: login.php");
    exit;
} else {
//ログインしたユーザーのアイテム数を確認
    //外部ファイル読み込み
    include("functions.php");

    //ユーザー名を受けとる
    $user_name = $_SESSION["user_name"];
    //$user_name = "r";//テスト用

    //DB接続
    $pdo = db_con();

    //データ登録SQL準備
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM item_table WHERE name =:name");
    $stmt->bindValue(':name',$user_name);
    $res = $stmt->execute();
    $result = $stmt->fetch();

    //SQL実行時のエラー確認
    if($res==false){
      $error = $stmt->errorInfo();
      exit("QueryError:".$error[2]);
    }

    //ユーザー名と一致するレコードの数 = itemの数
    $num = $result[0];
    // echo $num

    //ユーザー名がitem_tableに存在しない場合※$num = 0
    if($num == 0){
        //user_tableのlife_flgに0をいれる
        //user_tableのitem_countに$numの数を入れる
        $stmt = $pdo->prepare("UPDATE user_table SET life_flg=0, item_count=:item_count WHERE name =:name");
        $stmt->bindValue(':name',$user_name);
        $stmt->bindValue(':item_count',$num);
        $res = $stmt->execute();
        // $result = $stmt->fetch();

    }else{
    //ユーザー名がitem_tableに存在する場合※$num != 0
        //user_tableのlife_flgに1をいれる
        //user_tableのitem_countに$numの数を入れる
        $stmt = $pdo->prepare("UPDATE user_table SET life_flg=1, item_count=:item_count WHERE name =:name");
        $stmt->bindValue(':name',$user_name);
        $stmt->bindValue(':item_count',$num);
        $res = $stmt->execute();
        // $result = $stmt->fetch();

    };

}
?>