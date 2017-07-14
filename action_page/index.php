<?php
session_start();
if(isset($_SESSION["user_name"]) == ""){

    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

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
    <script src="js/item_conf.js"></script>
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
    <!-- <div id="loading" class="text-center">
        <div class="row">
            <img class="loading_img" src="http://gsacademy.tokyo/data/images/header_title.png" alt="G's ACADEMY TOKYO">
            <div class="container">
                <img src="img/loading.gif" alt="Loading...">
                <h4>画像を解析中...</h4>
            </div>
        </div>
    </div> -->
    <div id="skipnav">
        <a href="#maincontent">Skip to main content</a>
    </div>
    <!-- Navigation -->
    <?php include (dirname(__FILE__).'/navbar.php'); ?>
    <!-- /Navigation -->

    <section id="">
        <div class="contatainer">
            <div class="text-center">
                <h2>Register Item</h2>
                <hr class="star-primary">
            </div>
            <div id="user-name" class="text-center"></div>
            <!-- 画像表示 -->
            <div id="imageDiv" class="img_area">
                <div class="img_block">
                <img id="sourceImage" class="img-responsive" src="" alt="" width="50%">
                </div>
            </div>
            <!-- /画像表示 -->
            <!-- カメラで商品を撮影-->
            <label for="upfile" class="btn btn-danger btn-block camera-btn">
                ＋写真を選択
                <input type="file" name="file" id="upfile" accept="image/*" capture="camera" style="display:none;">
            </label>
            <!-- /カメラで商品を撮影 -->
            <div id="jsonOutput">
                <input type="hidden" id="numberArea" class="UIInput" value="読み取った番号">
            </div>
            <!--/バーコードの数字と読み込み画像のurl-->
            <!--/最終的には削除する-->

            <!--POSTで受け取ったバーコードをsrcに入れる-->
            <input type="hidden" name="inputImage" id="inputImage" value='<?php echo $barcode; ?>'/>
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
    <!-- モーダルウィンドウの中身 -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">アイテム情報確認</h4>
          </div>
          <div class="modal-body row">
            <div class="list-group">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">アイテム名</h5>
                  <!-- <small class="text-muted">3 days ago</small> -->
                </div>
                <p class="mb-1">
                <input type="text" id="mordal_item_name" value="" placeholder="アイテム名">
                </p>
                <p class="text-muted">※スキャン結果が正しくない場合は変更してください。</p>
              <!-- </a> -->
              <!-- <a href="#" class="list-group-item list-group-item-action flex-column align-items-start"> -->
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">消費期限</h5>
                  <!-- <small class="text-muted">3 days ago</small> -->
                </div>
                <p class="mb-1">
                    <input type="text" id="mordal_end_date" value="" placeholder="消費期限">
                </p>
                <p class="text-muted">デフォルト値は本日より7日後です。<br>(=G's ACADEMYの冷蔵庫での保存期限)</p>
              <!-- </a> -->
            </div>
          </div>
          <div class="modal-footer">
            <form action="mypage.php" method="post" class="form">
                <!-- DBへ登録する情報のinput -->
                <!-- <input type="hidden" id="item_category" class="item_category" name="item_category"> -->
                <input type="hidden" id="item_name" class="item_name" name="item_name" value="">
                <input type="hidden" id="item_end_date" class="item_end_date" name="item_end_date" value="">
                <input type = "hidden" id="img_src" class="img_src" name="img_src" value="">
                <input type="hidden" name="user_name" value="">
                <input type="hidden" name="user_email" value="">
                <div class= "regist_box"><input id="regist_bt" type="submit" class="regist_bt btn btn-block btn-danger" value="アイテムを登録！">
                    <div id="signin_btn" class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
                </div>
                <button type="button" class="close btn btn-primary btn-block" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">戻る</span></button>
                <!-- /DBへ登録する情報のinput -->
            </form>
           </div>
        </div>
      </div>
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

    <!-- Google Login javascript -->
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
        $("#signin_btn").css("display","none");
        $("#user-name").html("<h3>Hello "+profile.getGivenName()+"</h3>");
        $("input[name='user_name']").val(profile.getName());
        $("input[name='user_email']").val(profile.getEmail());
        // $("#connected4o1hzjnrynxt").html(profile.getName()+"さんこんちは");
      };
    </script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>
    <script src="js/google_merge.js"></script>

</body>

</html>
