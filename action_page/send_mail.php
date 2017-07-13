<?php
// 定時になったら、このファイルをCRONで読み込み、実行する
// 1.dbのuser_tableから、現在保存中のアイテムがある人の氏名とアイテム数、メールアドレスを取得
	//外部ファイル読み込み
	include("functions.php");

	//DB接続
	$pdo = db_con();

	// user_tableから色々取得
	$stmt = $pdo->prepare("SELECT * FROM user_table WHERE item_count != 0");
    // $stmt->bindValue(':user_name', $user_name , PDO::PARAM_INT);
    $status = $stmt->execute();

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
        $item_count = $result["item_count"];
        
        // 2.氏名を使って、item_tableからその人の登録してあるアイテムを全部取得
        $stmt = $pdo->prepare("SELECT * FROM item_table WHERE name = :user_name");
	    $stmt->bindValue(':user_name', $user_name , PDO::PARAM_INT);
	    $status = $stmt->execute();


		// 3.メール内容を生成して、送信！
		mb_language("Japanese");
		mb_internal_encoding("UTF-8");

		$to      = $email;
		$subject = '~毎日チェック！~保存中のアイテム一覧';
		$message = $user_name.'さん。こんちは！これはテストです。';
		$headers = 'From: gss_management_team@gss.com'."\r\n";

		if (mb_send_mail($to, $subject, $message, $headers))
		{
		    echo "メールが送信されました。";
		}
		else
		{
		    echo "メールの送信に失敗しました。";
		}
        
      }

    }
?>