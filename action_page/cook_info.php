<?php

require __DIR__.'/goutte.phar';
use Goutte\Client;

$url = $_GET['url'];
$client = new Client();
$crawler = $client->request('GET', $url);
$img = $crawler->filter('img')->eq(18)->attr('src');
$count = $crawler->filter(".result")->text();

$array[] = $img;
$array[] = $count;

echo json_encode($array);

?>
