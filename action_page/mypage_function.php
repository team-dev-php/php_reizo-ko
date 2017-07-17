<?php
//DB接続
$pdo = db_con();

if(isset($_SESSION["user_id"]) == ""){

    header("Location: login.php");
    exit;
}else if(isset($_SESSION["user_id"]) != ""){
    $user_id = $_SESSION["user_id"];
    $user_nickname = $_SESSION["user_nickname"];
    $user_email = $_SESSION["user_email"];
    if(isset($_SESSION["icon"])){
        $icon = $_SESSION['icon'];
    }else{
        $icon = "test.jpg";
    }
    $stmt = $pdo->prepare("SELECT `id`,`user_nickname`,`favorite_dish`,`belong_to`,`address`,`icon` FROM user_table WHERE id = :id");
    $stmt->bindValue(':id', $user_id, PDO::PARAM_STR);
    $status = $stmt->execute();

    //データ表示
    $belong_to ="";
    $favorite_dish ="";
    if($status==false){
      //execute（SQL実行時にエラーがある場合）
      $error = $stmt->errorInfo();
      exit("ErrorQuery:".$error[2]);

    }else{
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result["id"];
        $user_nickname = $result["user_nickname"];
        $belong_to = $result["belong_to"];
        $favorite_dish = $result["favorite_dish"];
        $icon = $result["icon"];
        $address = $result["address"];
        // echo $address;
        if($belong_to == null){
         $belong_to ="未設定";   
        }
        if($favorite_dish == null){
            $favorite_dish = "未設定";
        }
        if($icon == null){
            $icon = "test.jpg";
        }
        if($address ==null){
            $address = "未設定";
        }
        $_SESSION["id"] = $id;
        $_SESSION["user_nickname"] = $user_nickname;
        $_SESSION["belong_to"] = $belong_to;
        $_SESSION["favorite_dish"] = $favorite_dish;
        $_SESSION["icon"] = $icon;
        $_SESSION["address"] = $address;
    }

    if(!isset($_POST["item_name"]) || $_POST["item_name"] == "" ||
        !isset($_POST["img_src"]) || $_POST["img_src"] == ""){
    //postで受け取るデータがない場合は、何もitem_tableに入れない。    
    }else{
        //item情報をitem_tableにInsert
        $url = $_POST['img_src'];
        $item_name = $_POST['item_name'];
        $item_end_date = $_POST['item_end_date'];
        // $user_nickname = $_POST['user_nickname'];
        $user_email = $_POST['user_email'];
        //frigo_itemlog_tableにアイテム情報を追加
        $stmt0 = $pdo->prepare("INSERT INTO frigo_itemlog_table(name,item_name,indate,finish_flg)VALUES(:name, :item_name, sysdate(),0)");
        $stmt0->bindValue(':name', $user_name, PDO::PARAM_STR);
        $stmt0->bindValue(':item_name', $item_name, PDO::PARAM_STR);
        $status0 = $stmt0->execute();

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
    $stmt2 = $pdo->prepare("INSERT INTO user_table(user_nickname, email, item_count, kanri_flg, life_flg)VALUES(:nickname, :email, NULL, NULL, NULL)");
    $stmt2->bindValue(':nickname', $user_nickname, PDO::PARAM_STR);
    $stmt2->bindValue(':email', $user_email, PDO::PARAM_STR);
    $status = $stmt2->execute();
 
//2.user_nameからuser_idをDBから取得(select文)…いらないんじゃね?
    // $stmt3 = $pdo->prepare("SELECT 'name' FROM user_table WHERE 'name'= :user_name");
    // $stmt3->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    // $status = $stmt3->execute();

//3.user_nameでitem一覧をDBから取得(select文)
    $stmt = $pdo->prepare("SELECT * FROM item_table WHERE name = :user_name");
    $stmt->bindValue(':user_name', $user_nickname , PDO::PARAM_STR);
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
//4.user_nameで、lifelog_tableから過去の保存情報一式を取得して表示
    $stmt4 = $pdo->prepare("SELECT * FROM frigo_itemlog_table WHERE name = :user_name");
    $stmt4->bindValue(':user_name', $user_nickname , PDO::PARAM_STR);
    $status4 = $stmt4->execute();

    //データ表示
    $itemlog="";
    if($status4==false){
      //execute（SQL実行時にエラーがある場合）
      $error = $stmt4->errorInfo();
      exit("ErrorQuery:".$error[2]);

    }else{
      //Selectデータの数だけ自動でループしてくれる
      while( $result = $stmt4->fetch(PDO::FETCH_ASSOC)){
        $itemlog .= "<tr>";
        // $view .= '<a href = "detail.php?id='.$result["id"].'" >';
        $itemlog .="<td>";
        $itemlog .= $result["item_name"];
        $itemlog .= "</td><td>";
        $itemlog .= $result["indate"];
        $itemlog .= "</td><td>";
        $itemlog .= $result["end_date"];
        $itemlog .="</td>";
        $itemlog .="<td>";
        // $itemlog .= '<a href = "delete.php?id='.$result["id"].'" style="color:#18BC9C;">';
        // $itemlog .= '[削除]';
        // $itemlog .= '</a>';
        $itemlog .="</td>";
        $itemlog .= "</tr>";
        
      }

    }
    
?>
