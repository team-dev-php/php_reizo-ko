<?php
$url = $_GET['url'];
include 'simple_html_dom.php';
// URLを指定してインスタンスをつくる
$html = file_get_html($url);
//$html = file_get_html('http://www.janken.jp/goods/jk_catalog_syosai.php?jan=4902102071994');
// 商品名取得
    echo $html->find('h5',1);
?>
