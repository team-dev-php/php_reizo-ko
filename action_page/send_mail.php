<?php
// 定時になったら、このファイルをCRONで読み込み、実行する
// 1.dbのuser_tableから、現在保存中のアイテムがある人の氏名とアイテム数、メールアドレスを取得
	//外部ファイル読み込み
	include("functions.php");

	//DB接続
	$pdo = db_con();

	// user_tableから色々取得
	$stmt = $pdo->prepare("SELECT * FROM user_table WHERE life_flg = 1");
    // $stmt->bindValue(':user_name', $user_name , PDO::PARAM_INT);
    $status = $stmt->execute();
    //該当userのitemで、消費期限が迫っているものを取り出す

    //取ってきたuserデータを一個ずつ取り出して、2と3の処理を行う
    $view="";
    if($status==false){
      //execute（SQL実行時にエラーがある場合）
      $error = $stmt->errorInfo();
      exit("ErrorQuery:".$error[2]);

    }else{
      //Selectデータの数だけ自動でループしてくれる
      while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        $user_name = $result["name"];
        $email = $result["email"];
        // $item_count = $result["item_count"];
        // echo $result["name"];
        // 2.氏名を使って、item_tableからその人の登録してあるアイテムの中で、消費期限が迫っているアイテム情報を全部取得
        $stmt1 = $pdo->prepare("SELECT * FROM item_table WHERE name = :user_name and end_date = curdate() + INTERVAL 1 DAY or end_date = curdate() + INTERVAL 2 DAY or end_date = curdate() + INTERVAL 3 DAY");
	    $stmt1->bindValue(':user_name', $user_name , PDO::PARAM_STR);
	    $status1 = $stmt1->execute();
	    //該当アイテムがあった場合のみ、アイテムの情報をユーザーにメールする

	    if($status==false){
		    //execute（SQL実行時にエラーがある場合）
		    $error = $stmt->errorInfo();
		    exit("ErrorQuery:".$error[2]);
		}else {
			//該当ユーザーのアイテム情報を取得
			$items = [];
			while( $result1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
				$items[] = [$result1["item_name"],$result1["indate"],$result1["end_date"]];
			}

	    	// 3.メール内容を生成して、送信！
			mb_language("Japanese");
			mb_internal_encoding("UTF-8");

			// $to = $email;
			$to = 's.koyama1011@gmail.com';
			$subject = $items[0][0].'を使って友達とご飯会を開こう';
			// $message = "テスト";
			$message = $user_name.'さん。こんちは！'."\r\n".$user_name.'さんが保存中の'.$items[0][0].'がもうすぐ消費期限を迎えます。その前にFrigoをチェックしよう。'."\r\n"."http://shoheikoya.sakura.ne.jp/gs/team-dev/action_page/";
			$headers = 'From: customer_share_recipe@frigo.com'."\r\n";
			// echo $message;
			if (mb_send_mail($to, $subject, $message, $headers))
			{
				date_default_timezone_set('Japan');
			    echo date('Y/m/d H:i:s')."にメールが送信されました。";
			}
			else
			{
			    echo date('Y/m/d H:i:s')."メールの送信に失敗しました。";
			}
	        
		    }
      }

    }
?>