<?php
	session_start();
	$_SESSION["user_id"] = null;
	$_SESSION['user_name'] = $_POST["user_name"];
	$_SESSION['user_email'] = $_POST["user_email"];
	$_SESSION['icon'] = $_POST['icon'];

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
	//外部ファイル読み込み
    include("functions.php");

    //DB接続
    $pdo = db_con();

    //1.ユーザー情報がすでにdbにあるかないか識別
    $stmt1 = $pdo->prepare("SELECT * FROM user_table WHERE name = :user_name and email = :user_email");
    $stmt1->bindValue(':user_name',$user_name, PDO::PARAM_STR);
    $stmt1->bindValue(':user_email',$user_email, PDO::PARAM_STR);
    $result1 = $stmt1->execute();
    // while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $val = $stmt1->fetch();
    // }
    if($val["id"] != ""){
    	//2.ある場合、値をdbから取得し、それをセッション変数に代入
    	$stmt2 = $pdo->prepare("SELECT `id`,`user_nickname` FROM user_table WHERE name = :user_name and email = :user_email");
	    $stmt2->bindValue(':user_name',$_POST['user_name'],PDO::PARAM_STR);
	    $stmt2->bindValue(':user_email',$_POST['user_email'],PDO::PARAM_STR);

	    $result2 = $stmt2->execute();
	    while( $result2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    		$_SESSION["user_id"] = $result2["id"];
    		$_SESSION["user_nickname"] = $result2["user_nickname"];

    	}
    }else{

    	// 3.ない場合、dbに情報を登録し、そのid含む値をセッション変数に代入
    	$stmt2 = $pdo->prepare("INSERT INTO user_table(`name`,`user_nickname`,`email`) VALUES (:user_name,:user_name,:user_email)");
	    $stmt2->bindValue(':user_name',$_POST['user_name'],PDO::PARAM_STR);
        $stmt2->bindValue(':user_name',$_POST['user_name'],PDO::PARAM_STR);
	    $stmt2->bindValue(':user_email',$_POST['user_email'],PDO::PARAM_STR);
	    $result2 = $stmt2->execute();

	    $stmt3 = $pdo->prepare("SELECT `id`,`user_nickname` FROM user_table WHERE name = :user_name and email = :user_email");
	    $stmt3->bindValue(':user_name',$_POST['user_name'],PDO::PARAM_STR);
	    $stmt3->bindValue(':user_email',$_POST['user_email'],PDO::PARAM_STR);

	    $result3 = $stmt3->execute();
	    while( $result3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
    		$_SESSION["user_id"] = $result3["id"];
    		$_SESSION["user_nickname"] = $result3["user_nickname"];
    	}
    }
    // echo $val["id"];
     echo $_SESSION["user_id"];
    // $_SESSION["user_id"] = "2";
	//５．index.phpへリダイレクト
	// header("Location: index.php");
	// exit;

?>