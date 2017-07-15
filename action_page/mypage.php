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
    <!-- javascripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="jquery.xdomainajax.js"></script>
    <script src="js/reader.js"></script>
    <script src="js/recipe_generat.js"></script>
    <script src="js/file_upload.js"></script>
    <script src="js/google_login.js"></script>
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
            <div class="container text-center">
                <h4><?=$user_name?>の保存中アイテム一覧</h4>
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
                        <tr>
                        <th>Item Name</th>
                        <th>保存開始日</th>
                        <th>保存期限</th>
                        <!-- <th>オプション</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?=$itemlog?>
                    </tbody>
                </table>
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

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
