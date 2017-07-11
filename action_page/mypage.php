<?php
$src = $_POST['img_src'];
$name = $_POST['item_name'];
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
//1.上記情報をDBにInsert
//2.user_nameからuser_idをDBから取得(select文)
//3.user_nameでitem一覧をDBから取得(select文)
    //外部ファイル読み込み
    include("functions.php");

    //DB接続
    $pdo = db_con();

    //データ登録SQL作成
    $stmt = $pdo->prepare("SELECT * FROM item_table");
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
        // $view .= " ";
        // $view .= $result["indate"];
        // $view .= " ";
        // $view .= $result["end_date"];
        // $view .= '</a>';
        // $view .= '<a href = "delete.php?id='.$result["id"].'" >';
        // $view .= '[削除]';
        // $view .= '</a>';
        $view .= "</tr>";
        // <tr>
        //     <td>John</td>
        //     <td>Doe</td>
        //     <td>john@example.com</td>
        // </tr>
        // <tr>
        //     <td>Mary</td>
        //     <td>Moe</td>
        //     <td>mary@example.com</td>
        // </tr>
        // <tr>
        //     <td>July</td>
        //     <td>Dooley</td>
        //     <td>july@example.com</td>
        // </tr>
      }

    }
//4.アイテム情報を$viewに整形して代入
?>

<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>G's Smart System</title>
    <!-- For Google Login -->
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="450529429350-lcpe9e24g7erlqcg39kh7nrvudputt3s.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- /For Google Login -->

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Image_div_css -->
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    
    <!-- javascripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="jquery.xdomainajax.js"></script>
    <script src="js/reader.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<div id="loading" class="text-center">
    <img class="loading_img" src="http://gsacademy.tokyo/data/images/header_title.png" alt="G's ACADEMY TOKYO">
    <h4>画像を解析中...</h4>
</div>
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <?php include (dirname(__FILE__).'/navbar.php'); ?>
    <!-- /Navigation -->
    <section id="page-top">
        <div class="contatainer">
            <div class="col-lg-12 text-center">
                <h2>My page</h2>
                <div id="user-name" class="text-center"><h3>For <?=$user_name?></h3></div>
                <hr class="star-primary">
            </div>
            <div class="col-lg-8 col-log-offset-2">
                <div class="container text-center">
                  <h4>冷蔵中アイテム一覧</h4>          
                  <table class="table table-condensed">
                    <thead>
                      <tr>
                        <th>Item Name</th>
                        <th>保存開始日</th>
                        <th>保存期限</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?=$view?>
                      <!-- <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                      </tr>
                      <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                      </tr>
                      <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include (dirname(__FILE__).'/footer.php'); ?>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    
    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
