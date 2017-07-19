<?php
/** 共通で使うものを別ファイルにしておきましょう。*/

//DB接続関数（PDO）
function db_con(){
    try {
    //localhost用
        //小山
    //$pdo = new PDO('mysql:dbname=shoheikoya_gs_db;charset=utf8;host=localhost','root','root');
        //楠美
    $pdo = new PDO('mysql:dbname=reizo_db;charset=utf8;host=localhost','root','');

    } catch (PDOException $e) {
      exit('データベースに接続できませんでした。'.$e->getMessage());
    }
    return $pdo;
}


//SQL処理エラー

function qerror($stmt){
     $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}


/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}


?>
