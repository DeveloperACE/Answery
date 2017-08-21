<?php

require 'vendor/smarty/smarty/libs/Smarty.class.php';
require("questions.php");

$smarty = new Smarty;

//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->assign("isCatSet", isset($_GET["cat"]));

if(isset($_GET["cat"])) {
        $smarty->assign("catpath", getFirstValueFromAPI('http://random.cat/meow'));

} else {

    //manual override because only short answer has been implemented
    $questionTypeID = mt_rand(0, count($questions)-1);
    //gets a random question from the sub array of question types
    $questionID = mt_rand(0, count($questions[$questionTypeID])-1);

    $questionObject = $questions[$questionTypeID][$questionID];

    $smarty->assign("questionTypeID", $questionTypeID);
    //$smarty->assign("questionID", $questionID);
    $smarty->assign("questionText", $questions[$questionTypeID][$questionID]["question"]);
    //$smarty->assign("questionObject", $questionObject);

    if($questionTypeID == 1) {
        $choices = array();

        $type = $questionObject["type"];
        $smarty->assign("multiplechoicetype", $type);
        switch ($type) {
            case "randomFromAPI":
                    for ($questionNumber=0; $questionNumber <= 3; $questionNumber++) {
                        $choices[] = getFirstValueFromAPI($questionObject["API"]);
                    }
                break;

            case "text":
                foreach ($questionObject as $key => $value) {
                    if (gettype($key) == "integer") {
                        $choices[] = $value; //add value to choices
                    }
                }
                break;

            case "random":
                for ($questionNumber=0; $questionNumber <= 3; $questionNumber++) {
                    $options = $questionObject["options"];
                    $choices[] = $options[mt_rand(0, count($options)-1)];
                }
                break;

            default:
                # code...
                break;
        }
        $smarty->assign("choices", $choices);


    } elseif($questionTypeID == 2) {

        if (isset($questionObject["randomFromAPI"])){
            $smarty->assign("photoPath", getFirstValueFromAPI($questionObject["randomFromAPI"]));
        } else {
            
        }
    }


 }


function getFirstValueFromAPI($URL) {
    $APIObject = json_decode(file_get_contents($URL), true);
    foreach($APIObject as $key => $value) {

        if (!in_array(pathinfo($value, PATHINFO_EXTENSION), Array('jpg','png', "jpeg"))) {
            return getFirstValueFromAPI($URL);
        }

        return $value;
    }

}
 /*<form action="#" method="get">
     <?php if(!isset($_GET["cat"])) {
         echo '<input type="hidden" name="cat" value="true"></input>';
     }
     <input type="submit" value="Continue >"></input>
 </form>*/



$smarty->display('index.tpl');
?>
