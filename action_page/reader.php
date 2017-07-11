<!-- <?php
$barcode = $_POST['barcode'];
?> -->

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>team_dev</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="jquery.xdomainajax.js"></script>
        <script src="js/reader.js"></script>
        <!-- jQuery Version 1.11.1 -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
     <!-- Navigation -->
    <?php include (dirname(__FILE__).'/navbar.php'); ?>
    <!-- /Navigation -->
       <div id="wrapper" style="width:375">
            <div class="black_zone" ></div>
            <p class="title">Reader</p>
            <form action="todb_test.php" method="post" class="form">
                <div id="imageDiv" class="img_area">
                    <div class="img_block"><img id="sourceImage" src='<?php echo $barcode; ?>'/></div>
                </div>
                <input type="text" id="item_name" class="item_name" name="item_name">
                <input type = "hidden" id="img_src" class="img_src" name="img_src">
                <div onclick="processImage()" id="scan_bt" class="scan_bt">スキャン</div>
                   <input type="submit" id="regist_bt" class="regist_bt" value="googleログインして登録">
            </form>
            <div onclick="retry()" id="retry" class="retry">撮りなおす</div>
        </div>
                <!--バーコードの数字と読み込み画像のurl-->
                <!--最終的には削除する-->
<!--               <input type="text" name="inputImage" id="inputImage" value="http://livedoor.blogimg.jp/jdash/imgs/1/7/17bbcf9b.jpg" style="width:200px; height:30px;" />-->
                <div id="jsonOutput" style="width:360px; height:30px;">
                <input type="text" id="numberArea" class="UIInput" style="width:200px; height:30px;" value="読み取った番号">
                </div>
                <!--/バーコードの数字と読み込み画像のurl-->
                <!--/最終的には削除する-->

                <!--POSTで受け取ったバーコードをsrcに入れる-->
        <input type="text" name="inputImage" id="inputImage" value='<?php echo $barcode; ?>'/>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>



