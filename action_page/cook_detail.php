<?php
$url = $_GET['url'];
require __DIR__.'/goutte.phar';
use Goutte\Client;
$url = $_GET['url'];
$client = new Client();
$crawler = $client->request('GET', $url);

$title = $crawler->filter("h1")->eq(0)->text();
$summary = $crawler->filter(".summary")->eq(0)->text();
$ingredient = $crawler->filter('.name')->each(function($node) {
    return $node->text();
});
$amount = $crawler->filter('.amount')->each(function($node) {
    return $node->text();
});
$instruction = $crawler->filter('.instruction')->each(function($node) {
    return $node->text();
});
$b = $crawler->filter('.txt-body')->filter('b')->each(function($node) {
    return $node->text();
});

//echo $title;
//echo $summary;
//var_dump($ingredient);
//var_dump($amount);
//var_dump($instruction);
//var_dump($b);


$array[] = $title;
$array[] = $summary;
$array[] = $b;
$array[] = $ingredient;
$array[] = $amount;
$array[] = $instruction;



//$array = array($title,$summary,$b,$ingredient,$amount,$instruction);
echo json_encode($array);
//$jArray = json_encode($array);

//var_dump($jArray);
//var_dump($array);









?>
