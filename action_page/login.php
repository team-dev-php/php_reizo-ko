<?php
session_start();
if( isset($_SESSION['user_name']) != "") {
  // ログイン済みの場合はリダイレクト
  header("Location: mypage.php");
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
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <?php include (dirname(__FILE__).'/navbar.php'); ?>
    <!-- /Navigation -->
    <section id="page-top">
        <div class="contatainer">
            <div class="text-center">
                <h2>ログインページ</h2>
                <hr class="star-primary">
            </div>
            <div class="col-lg-8 col-log-offset-2">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
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
    <script>
    	function onSignIn(googleUser) {
		  var profile = googleUser.getBasicProfile();
		  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
		  console.log('Name: ' + profile.getName());
		  console.log('Image URL: ' + profile.getImageUrl());
		  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
		  $.ajax({
		  	url:"logincheck.php",
		  	method:"post",
		  	data:{
		  		user_name:profile.getName(),
		  		user_email:profile.getEmail()
		  	}
		  }).done(()=>{
		  	console.log("login success!");
		  });
		}
    </script>

</body>

</html>