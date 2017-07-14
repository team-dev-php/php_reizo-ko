<?php

if(isset($_FILES['file'])){

  //受け取ったデータの拡張子がjpegかpngだったら実行(セキュリティのため)
  if($_FILES['file']['type'] || "image/jpeg" || "image/png" ){

  //受け取ったデータの内容確認
  // var_dump($expression);

  //時刻を取得
  $time = time();

  //temp領域からimgディレクトリにアップしたファイルを移動する
  move_uploaded_file($_FILES['file']['tmp_name'],'img/'.$time.'.jpg');

  //imgディレクトリのURL
  //取得した時刻を使用してユニーク名にする
  //localhost用
  // $barcode = 'localhost:8888/team-work/php_reizo-ko/action_page/img/'.$time.'.jpg';

  //本番環境用 
  $barcode = 'http://shoheikoya.sakura.ne.jp/gs/team-dev/action_page/img/'.$time.'.jpg';

   }
}else{
  $barcode = "test.jpg";
}
echo $barcode;
?>