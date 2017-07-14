    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll sp-text-center">
                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button> -->
                <a class="navbar-brand" href="#page-top">frigo</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php">Scan Item</a>
                    </li>
                    <li class="page-scroll">
                        <a href="mypage.php">My Page</a>
                    </li>
                    <li class="page-scroll">
                        <a href="gathering.php">Gathering</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <nav id="spNav" class="navbar navbar-default navbar-fixed-bottom navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll sp-text-center row">
                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</spana> Menu <i class="fa fa-bars"></i>
                </button> -->
                <div class="btn-group" style="width:80%;margin: 0 auto;">
                  <button type="button" class="btn btn-primary" style="font-size: 25px;width: 25%;margin: 1.5px 0 auto!important;"><a href="index.php"><i class="glyphicon glyphicon-cutlery"></i></a></button>
                  <div class="btn-group" style="width: 25%;margin: 1.5px 0 auto!important;">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="font-size:25px;width: 100%;margin: 1.5px 0 auto!important;">
                        <i class="glyphicon glyphicon-camera" aria-hidden="true"></i><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <!-- カメラで商品を撮影-->
                            <label for="upfile" class="camera-btn">
                                バーコードを読み取る
                                <input type="file" name="file" id="upfile" accept="image/*" capture="camera" style="display:none;">
                            </label>
                        <!-- /カメラで商品を撮影 -->
                      </li>
                      <li><a href="#">アイテムを撮影</a></li>
                    </ul>
                  </div>
                  <button type="button" class="btn btn-primary" style="font-size: 25px;width: 25%;margin: 1.5px 0 auto!important;">
                  <a href="gathering.php"><i class="glyphicon glyphicon-search"></i></a></button>
                  <button type="button" class="btn btn-primary" style="font-size: 25px;width: 25%;margin: 1.5px 0 auto!important;"><a href="mypage.php"><i class="glyphicon glyphicon-user"></i></a></button>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div id="loading" class="text-center" >
        <img class="loading_img" src="http://gsacademy.tokyo/data/images/header_title.png" alt="G's ACADEMY TOKYO">
        <div class="container">
            <img src="img/loading.gif" alt="Loading...">
            <h4>画像を解析中...</h4>
        </div>
    </div>
    
    <section id="" style="display: none;">
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
            
            <div id="jsonOutput">
                <input type="hidden" id="numberArea" class="UIInput" value="読み取った番号">
            </div>
            <!--/バーコードの数字と読み込み画像のurl-->
            <!--/最終的には削除する-->

            <!--POSTで受け取ったバーコードをsrcに入れる-->
            <input type="hidden" name="inputImage" id="inputImage" value='<?php echo $barcode; ?>'/>
        </div>
    </section>

    <!-- カメラ撮影後の、モーダルウィンドウの中身 -->
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
    