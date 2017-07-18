<?php include (dirname(__FILE__).'/item_count.php'); ?>
<?php include (dirname(__FILE__).'/mypage_function.php'); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Frigo -Keep,Check,Share-</title>
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
    <!-- javascripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="jquery.xdomainajax.js"></script>
    <script src="js/reader.js"></script>
    <script src="js/recipe_generat.js"></script>
    <script src="js/file_upload.js"></script>
    <!-- <script src="js/google_login.js"></script> -->
</head>

<body id="" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <?php include (dirname(__FILE__).'/navbar.php'); ?>
    <!-- /Navigation -->
    <section id="page-top">
        <div class="contatainer">
            <div class="col-lg-12 text-center">
                <h2>My page</h2>
                <hr class="star-primary">
            </div>
            <!-- プロフィールページ -->
            <div class="container text-center profile">
                <!-- Add icon library -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <div class="card">
                    <h4>ユーザープロフィール</h4>
                  <img src=<?=$icon?> alt="user_icon" class="user_icon" style="width:50%">
                    <h4><span class="update_name"><?=$user_nickname?></span></h4>
                    <h4>所属：<span class="update_belong_to"><?=$belong_to?></span></h4>
                    <h4>居住エリア:<span class="update_address"><?=$address?></span></h4>
                    <h4>大好物：<span class="update_favorite_dish"><?=$favorite_dish?></span></h4>
                    <a href="#" class="sns_icon"><i class="fa fa-dribbble"></i></a> 
                    <a href="#" class="sns_icon"><i class="fa fa-twitter"></i></a> 
                    <a href="#" class="sns_icon"><i class="fa fa-linkedin"></i></a> 
                    <a href="#" class="sns_icon"><i class="fa fa-facebook"></i></a> 
                    <p><button class="btn btn_block frigo_btn profile_edit">プロフィールを編集</button></p>
                  
                </div>
            </div>
            <!-- /プロフィールページ -->
            <!-- 残り物レシピ画像欄 -->
            <div class="container text-center">
                
            </div>
            <!-- /残り物レシピ画像欄 -->
            <div class="container text-center">
                <h4><span class="update_name"><?=$user_nickname?></span>の保存中アイテム一覧</h4>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                        <th>Item Name</th>
                        <th>保存開始日</th>
                        <th>保存期限</th>
                        <th>オプション</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?=$view?>
                    </tbody>
                </table>
            </div>
            <div class="container text-center">
                <h4>現在までの保存記録分析</h4>
                <table class="table table-condensed">
                    <thead>
                        <!-- <tr>
                        <th>Item Name</th>
                        <th>保存開始日</th>
                        <th>保存期限</th>
                        <th>オプション</th>
                        </tr> -->
                    </thead>
                    <tbody>
                        <!-- <?=$itemlog?> -->
                    </tbody>
                </table>
            </div>

        </div>
        <!-- Footer -->
    <?php include (dirname(__FILE__).'/footer.php'); ?>
    </section>

    <!-- modal window for profile_edit-->
    <div class="modal fade" id="profile_modal">
      <div class="modal-dialog">
        <!-- <div class="modal-content"> -->
        <div class="card" style="background: white;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">プロフィール情報確認</h4>
          </div>
          <form id="profile_edit" action="profile_edit.php" method="post" class="form">
            <input type="hidden" name="user_id" value=<?=$id?> >
              <div class="modal-body row">
                <div class="list-group">
                    <img src=<?=$icon?> alt="user_icon"  style="width:50%">
                    <input type = "hidden" id="edit_img_src" value=<?=$icon?>>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">ユーザー名:</h5>
                    </div>
                    <p class="mb-1">
                        <input type="text" name="edit_user_name" value=<?=$user_nickname?> class="text-center edit_user_name" required>
                    </p>
                    <!-- <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">e-mail:</h5>
                    </div> -->
                    <!-- <p class="mb-1">
                       <input type="text" name="edit_user_email" value=<?=$user_email?> class="text-center" required>
                    </p> -->
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">居住エリア:</h5>
                    </div>
                    <p class="mb-1">
                        <input type="text" name="address" value=<?=$address?> class="text-center" required>
                    </p>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">所属:</h5>
                    </div>
                    <p class="mb-1">
                        <input type="text" name="belong_to" value=<?=$belong_to?> class="text-center" required>
                    </p>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">大好物:</h5>
                    </div>
                    <p class="mb-1">
                        <input type="text" name="favorite_dish" value=<?=$favorite_dish?> class="text-center" required>
                    </p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="profile_save" class="frigo_btn close btn btn-block " data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="save_text">保存</span></button>
                <!-- /DBへ登録する情報のinput -->
               </div>
           </form>
        </div>
      </div>
    </div>
    <!-- /modal window for profile_edit-->
    
    <!-- modal window for item_info -->
    <!-- modal window -->
    <div class="modal fade" id="item_modal">
      <div class="modal-dialog">
        <!-- <div class="modal-content"> -->
        <div class="card" style="background: white;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">アイテム情報</h4>
          </div>
          <form id="item_info_edit" action="item_info_edit.php" method="post" class="form">
            <input type="hidden" name="item_id" value=<?=$id?> >
              <div class="modal-body row">
                <div class="list-group">
                    <img src=<?=$icon?> alt="user_icon"  style="width:50%">
                    <input type = "hidden" id="edit_img_src" value=<?=$icon?>>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">ユーザー名:</h5>
                    </div>
                    <p class="mb-1">
                        <input type="text" name="edit_user_name" value=<?=$user_nickname?> class="text-center edit_user_name" required>
                    </p>
                    <!-- <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">e-mail:</h5>
                    </div> -->
                    <!-- <p class="mb-1">
                       <input type="text" name="edit_user_email" value=<?=$user_email?> class="text-center" required>
                    </p> -->
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">居住エリア:</h5>
                    </div>
                    <p class="mb-1">
                        <input type="text" name="address" value=<?=$address?> class="text-center" required>
                    </p>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">所属:</h5>
                    </div>
                    <p class="mb-1">
                        <input type="text" name="belong_to" value=<?=$belong_to?> class="text-center" required>
                    </p>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">大好物:</h5>
                    </div>
                    <p class="mb-1">
                        <input type="text" name="favorite_dish" value=<?=$favorite_dish?> class="text-center" required>
                    </p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="item_info_modal" class="frigo_btn close btn btn-block " data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="save_text">保存</span></button>
                <!-- /DBへ登録する情報のinput -->
               </div>
           </form>
        </div>
      </div>
    </div>
    <!-- /modal window -->
    <!-- /modal window for item_info -->

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

    <!-- プロフィール編集用js -->
    <script src="js/profile_edit.js"></script>

    <script>
        
    </script>

</body>

</html>
