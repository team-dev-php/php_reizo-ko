<?php
	session_start();
	// $_SESSION["user_id"] = $_POST['user_id'];
	$_SESSION['user_name'] = $_POST["user_name"];
	$_SESSION['user_email'] = $_POST["user_email"];
	$_SESSION['icon'] = $_POST['icon'];
	//外部ファイル読み込み
    include("functions.php");

    //DB接続
    $pdo = db_con();

    //1.ユーザー情報がすでにdbにあるかないか識別
    //   -- DB側(※SQLServer)
    // SELECT TOP (1) * FROM user_table WHERE name = :user_name and email = :user_email

    // -- プログラム側
    // IF Recordとれた? THEN
    //     結果がある場合の処理
    // ELSE
    //     結果がない場合の処理
    // END
    $stmt1 = $pdo->prepare("SELECT TOP (1) * FROM user_table WHERE name = :user_name and email = :user_email");
    $stmt1->bindValue(':user_name',$_POST['user_name'],PDO::PARAM_STR);
    $stmt1->bindValue(':user_email',$_POST['user_email'],PDO::PARAM_STR);
    $result = $stmt1->execute();
    // while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

    // }
    if(isset($result)){
    	//2.ある場合、値をdbから取得し、それをセッション変数に代入
    	$stmt2 = $pdo->prepare("SELECT `id`,`user_nickname` FROM user_table WHERE name = :user_name and email = :user_email");
	    $stmt2->bindValue(':user_name',$_POST['user_name'],PDO::PARAM_STR);
	    $stmt2->bindValue(':user_email',$_POST['user_email'],PDO::PARAM_STR);
	    $result = $stmt2->execute();
	    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    		$_SESSION["user_id"] = $result["id"];
    		$_SESSION["user_nickname"] = $result["user_nickname"];
    	}
    }else{
    	//3.ない場合、dbに情報を登録し、そのid含む値をセッション変数に代入
    	$stmt2 = $pdo->prepare("INSERT INTO user_table WHERE name = :user_name and email = :user_email");
	    $stmt2->bindValue(':user_name',$_POST['user_name'],PDO::PARAM_STR);
	    $stmt2->bindValue(':user_email',$_POST['user_email'],PDO::PARAM_STR);
	    $result = $stmt2->execute();

	    $stmt3 = $pdo->prepare("SELECT `id`,`user_nickname` FROM user_table WHERE name = :user_name and email = :user_email");
	    $stmt3->bindValue(':user_name',$_POST['user_name'],PDO::PARAM_STR);
	    $stmt3->bindValue(':user_email',$_POST['user_email'],PDO::PARAM_STR);
	    $result = $stmt3->execute();
	    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    		$_SESSION["user_id"] = $result["id"];
    		$_SESSION["user_nickname"] = $result["user_nickname"];
    	}
    }
     // echo $_SESSION["user_nickname"];
    // $_SESSION["user_id"] = "2";
	//５．index.phpへリダイレクト
	header("Location: index.php");
	exit;
?>