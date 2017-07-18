<?php
    session_start();
    $user_name = $_SESSION["user_name"];
//3.user_nameでitem一覧をDBから取得(select文)
    include("functions.php");
    $pdo = db_con();

    $stmt = $pdo->prepare("SELECT * FROM item_table WHERE name = :user_name");
    $stmt->bindValue(':user_name', $user_name , PDO::PARAM_STR);
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
        $view .= '<tr>';
        // $view .= '<a href = "detail.php?id='.$result["id"].'" >';
        $view .='<td id="'.$result["id"].'" class="item_modal">';
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
        $view .="<td>";
        $view .='<input type="hidden" class="item_img" value="'.$result["url"].'">';
        $view .="</td>";
        $view .= "</tr>";
        
      }
  }
      echo $view;
      ?>