<?php
//DB接続
$pdo = db_con();

if(isset($_SESSION["user_name"]) == ""){

    header("Location: login.php");
    exit;
}else if(isset($_SESSION["user_name"]) != ""){
    $user_name = $_SESSION["user_name"];
    $user_email = $_SESSION["user_email"];
    if(!isset($_POST["item_name"]) || $_POST["item_name"] == "" ||
        !isset($_POST["img_src"]) || $_POST["img_src"] == ""){
    //postで受け取るデータがない場合は、何もitem_tableに入れない。    
    }else{
        //item情報をitem_tableにInsert
        $url = $_POST['img_src'];
        $item_name = $_POST['item_name'];
        $item_end_date = $_POST['item_end_date'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];

        //データ登録SQL作成
        $stmt1 = $pdo->prepare("INSERT INTO item_table(id, name, item_name, url, indate, end_date)VALUES(0, :name, :item_name, :url, sysdate(), STR_TO_DATE(:item_end_date ,'%Y-%m-%d'))");
        $stmt1->bindValue(':name', $user_name, PDO::PARAM_STR);
        $stmt1->bindValue(':item_name', $item_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
        // date("Y-m-d", strtotime($item_end_date))
        $stmt1->bindValue(':url', $url, PDO::PARAM_STR);
         $stmt1->bindValue(':item_end_date', date("Y-m-d", strtotime($item_end_date)), PDO::PARAM_STR);
        $status = $stmt1->execute();//上記が全て実行された後の結果を$statusに格納
    }
}

//1.上記情報をDBにInsert

    
    //nullの場合はuser情報を新規登録(Insert文)
    $stmt2 = $pdo->prepare("INSERT INTO user_table(name, email, item_count, kanri_flg, life_flg)VALUES(:name, :email, NULL, NULL, NULL)");
    $stmt2->bindValue(':name', $user_name, PDO::PARAM_STR);
    $stmt2->bindValue(':email', $user_email, PDO::PARAM_STR);
    $status = $stmt2->execute();
 
//2.user_nameからuser_idをDBから取得(select文)…いらないんじゃね?
    // $stmt3 = $pdo->prepare("SELECT 'name' FROM user_table WHERE 'name'= :user_name");
    // $stmt3->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    // $status = $stmt3->execute();

//3.user_nameでitem一覧をDBから取得(select文)
    $stmt = $pdo->prepare("SELECT * FROM item_table WHERE name = :user_name");
    $stmt->bindValue(':user_name', $user_name , PDO::PARAM_INT);
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
        $view .= "<tr>";
        // $view .= '<a href = "detail.php?id='.$result["id"].'" >';
        $view .="<td>";
        $view .= $result["item_name"];
        $view .= "</td><td>";
        $view .= $result["indate"];
        $view .= "</td><td>";
        $view .= $result["end_date"];
        $view .="</td>";
        $view .="<td>";
        $view .= '<a href = "delete.php?id='.$result["id"].'" style="color:#18BC9C;">';
        $view .= '[削除]';
        $view .= '</a>';
        $view .="</td>";
        $view .= "</tr>";
        
      }

    }

    
?>
