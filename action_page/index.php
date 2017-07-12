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



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<div id="loading" class="text-center">
    <div class="row">
        <img class="loading_img" src="http://gsacademy.tokyo/data/images/header_title.png" alt="G's ACADEMY TOKYO">
        <div class="container">
            <img src="img/loading.gif" alt="Loading...">
            <h4>画像を解析中...</h4>
        </div>
    </div>
</div>
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <?php include (dirname(__FILE__).'/navbar.php'); ?>
    <!-- Header -->
  <!--   <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <h1 class="name">Start Bootstrap</h1>
                        <hr class="star-light">
                        <span class="skills">Web Developer - Graphic Artist - User Experience Designer</span>
                    </div>
                </div>
            </div>
        </div>
    </header> -->
    <section id="page-top">
        <div class="contatainer">
            <div class="col-lg-12 text-center">
                <h2>Register Item</h2>
                <hr class="star-primary">
            </div>
            <div class="col-lg-8 col-log-offset-2">
                <form action="mypage.php" method="post" class="form">
                    <div id="user-name" class="text-center"></div>
                    <!-- 画像表示 -->
                    <div id="imageDiv" class="img_area">
                        <div class="img_block">
                        <img id="sourceImage" class="img-responsive" src="" alt="" width="50%">
                        </div>
                    </div>

                    <!-- /画像表示 -->
                    <!-- Google Login Button -->
                    <div id="signin_btn" class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
                    <!-- /Google Login Button -->

                    <!-- <button type="button" class="btn btn-primary btn-block scan_bt" onclick="processImage()" id="scan_bt">スキャン</button>
                     -->
                    <!-- <form id="form_img" method="post" action=""> -->
                        <!-- カメラで商品を撮影-->
                        <input type="file" name="file" id="upfile" accept="image/*" capture="camera" />
                        <!-- /カメラで商品を撮影 -->
                    <!-- </form> -->
                    <!-- カメラで取った写真画像を表示 -->
                    <script>
                        $(document).on('change','#upfile',function() {
                            if (this.files.length > 0) {
                                // 選択されたファイル情報を取得
                                var file = this.files[0];
                                // console.log(file);

                                // readerのresultプロパティに、データURLとしてエンコードされたファイルデータを格納
                                var reader = new FileReader();
                                reader.readAsDataURL(file);

                                reader.onload = function() {
                                    $('#sourceImage').attr('src', reader.result);
                                    // $('#file').val(reader.result);
                                    // crop();
                                }
                                 // var files = this.dataTransfer.files;
                                 // console.log(files);
                                var file_data = new FormData();
                                file_data.append('file',file);
                                var data = {file : file_data};

                                $.ajax({
                                    url:"img_url_create.php",
                                    method:'POST',
                                    data:file_data,
                                    processData: false,
                                    contentType: false
                                }).done((img_src)=>{
                                    console.log(img_src);
                                    processImage(img_src);

                                }).fail(function(jqXHR, textStatus, errorThrown){
                                    // Display error message.
                                    var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
                                    errorString += (jqXHR.responseText === "") ? "" : (jQuery.parseJSON(jqXHR.responseText).message) ?
                                        jQuery.parseJSON(jqXHR.responseText).message : jQuery.parseJSON(jqXHR.responseText).error.message;
                                    alert(errorString);
                                });
                            }
                        });
                    </script>
                    <!-- /カメラで取った写真画像を表示 -->
                    <!-- 商品情報表示 -->

                    <div class="item_info text-center">
                        <h4>-Item Name-</h4>
                        <h4><span class="item_name"></span></h4>
                        <h4>-Category-</h4>
                        <h4><span class="item_category"></span></h4>
                        <h4></h4>
                    </div>
                    <!-- /商品情報表示 -->
                    <!-- DBへ登録する情報のinput -->
                    <input type="hidden" id="item_name" class="item_name" name="item_name">
                    <input type = "hidden" id="img_src" class="img_src" name="img_src">
                    <input type="hidden" name="user_name" value="">
                    <input type="hidden" name="user_email" value="">

                    <div class= "regist_box"><input id="regist_bt" type="submit" class="regist_bt btn btn-block btn-danger" value="アイテムを登録！">

                        <div id="signin_btn" class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

                    </div>
                <button type="button" class="btn btn-primary btn-block scan_bt retry" onclick="retry()" id="retry">撮りなおす</button>
                    <!-- /DBへ登録する情報のinput -->

                </form>
                <!--バーコードの数字と読み込み画像のurl-->
                <!--最終的には削除する-->
                <!--<input type="text" name="inputImage" id="inputImage" value="http://livedoor.blogimg.jp/jdash/imgs/1/7/17bbcf9b.jpg" style="width:200px; height:30px;" />-->
                <div id="jsonOutput">
                    <input type="hidden" id="numberArea" class="UIInput" value="読み取った番号">
                </div>
                <!--/バーコードの数字と読み込み画像のurl-->
                <!--/最終的には削除する-->

                <!--POSTで受け取ったバーコードをsrcに入れる-->
                <input type="hidden" name="inputImage" id="inputImage" value='<?php echo $barcode; ?>'/>
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
        //$("#signin_btn").hide();
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
