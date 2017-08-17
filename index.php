<?php

require 'vendor/smarty/smarty/libs/Smarty.class.php';
require("questions.php");

$smarty = new Smarty;

//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->assign("cat", isset($_GET["cat"]));

if(isset($_GET["cat"])) {
    //get the json contents of the random.cat API and save it to a variable as an array
    $catPath = json_decode(file_get_contents('http://random.cat/meow'), true);
    $catPath = $catPath["file"];

    $smarty->assign("catpath", $catPath);
} else {

    //manual override because only short answer has been implemented
    $questionTypePicker = 0;//mt_rand(0, count($questions)-1);
    $smarty->assign("questionTypeID", $questionTypePicker);
    //gets a random question from the question array
    $questionIndex = mt_rand(0, count($questions[$questionTypePicker])-1);
    $question = $questions[$questionTypePicker][$questionIndex];

    $smarty->assign("question", $question);

 }

 /*<form action="#" method="get">
     <?php if(!isset($_GET["cat"])) {
         echo '<input type="hidden" name="cat" value="true"></input>';
     }
     <input type="submit" value="Continue >"></input>
 </form>*/



$smarty->display('index.tpl');
?>
