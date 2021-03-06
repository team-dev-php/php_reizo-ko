<?php include (dirname(__FILE__).'/item_count.php'); ?>
<?php
// session_start();
// //外部ファイル読み込み
// include("functions.php");

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
    $stmt = $pdo->prepare("SELECT * FROM user_table");
    // $stmt->bindValue(':user_name', $user_name , PDO::PARAM_INT);
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
        if($result == ""){

        }else{
            $view .= "<tr>";
            // $view .= '<a href = "detail.php?id='.$result["id"].'" >';
            $view .='<td class="text-center">';
            $view .= '<label for="'.$result["id"].'">'.$result["name"].'</label>';
            $view .= "</td>";
            $view .='<td class="text-center">';
            $view .= '<label for="'.$result["id"].'">'.$result["item_count"].'</label>';
            $view .= "</td>";
            // $view .="<td>";
            // $view .= $result["indate"];
            // $view .= "</td><td>";
            // $view .= $result["end_date"];
            // $view .="</td>";
            $view .="<td>";
            $view .='<input type="checkbox" id="'.$result["id"].'" name="username" value="'.$result["name"].'">';
            // $view .="<td>";
            // $view .= '<a href = "delete.php?id='.$result["id"].'" >';
            // $view .= '[削除]';
            // $view .= '</a>';
            // $view .="</td>";
            $view .= "</tr>";

        }
      }

    }

    
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Image_div_css -->
    <!-- <link rel="stylesheet" href="css/main.css"> -->

    <!-- javascripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="jquery.xdomainajax.js"></script>
    <script src="js/reader.js"></script>
    <script src="js/recipe_generat.js"></script>
    <script src="js/gathering.js"></script>
    <script src="js/file_upload.js"></script>
    <script src="js/google_login.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="" class="index">
<!-- <div id="skipnav"><a href="#maincontent">Skip to main content</a></div>
 -->
    <!-- Navigation -->
    <?php include (dirname(__FILE__).'/navbar.php'); ?>
    <!-- /Navigation -->
    <section id="page-top">
        <div class="contatainer">
            <div class="container text-center">
              <h4>Friends List</h4>
              <table class="table table-condensed" style="margin-bottom: 0;">
                <thead>
                  <tr>
                    <th>Friend's name</th>
                    <th>保存中アイテム数</th>
                    <th>選択</th>
                   <!--  <th>オプション</th> -->
                  </tr>
                </thead>
                <tbody style="overflow: scroll;">
                <?=$view?>
                </tbody>

              </table>
              <!-- .search_share_recipeでajax➜phpにpost➜tableセクションを動的に変更 -->
            <button class="btn btn-block search_share_recipe" style="background-color: #18BC9C;color: white;">シェアレシピを検索</button>
            </div>
            <!-- <div class="container text-center">
              <hr class="star-primary">
              <h4>おすすめシェアレシピ！</h4>
              //ajaxでphpからhtmlを取得して表示
              <table id="recipe" class="table table-condensed">
                
              </table>
            </div> -->
            <script>
            $(".search_share_recipe").on("click",()=>{
                //チェックが入ってたユーザーのuser_nameを全部取得し、user_names[]に入れて送る
                let test = $("input[name='username']:checked").map(
                    function () {
                        return $(this).val();
                    }).get();
                console.log(test);

                $.ajax({
                    url:"share_recipe.php",
                    data:{"user_names[]":$("input[name='username']:checked").map(
                    function () {
                        return $(this).val();
                    }).get()},
                    method:"post"
                }).done((data)=>{
                    console.log(JSON.parse(data));
                    //レシピ表示用javascriptを記載。ごーーーくううううううううううううううううううううううううん！




                });
            });
            </script>
        </div>
         <!-- Gathering!Button-->
    <input id="gathering_btn" type="submit" class="btn btn-block btn-danger" value="シェアレシピを検索">
    <!-- /Gathering!Button -->
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
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
