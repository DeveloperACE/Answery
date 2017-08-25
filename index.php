<?php

require 'vendor/smarty/smarty/libs/Smarty.class.php';
require("questions.php");

$smarty = new Smarty;

//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->assign("cat", isset($_POST["cat"]));

if(isset($_POST["cat"]) && $_POST["cat"]=="1") {
        $smarty->assign("catpath", getFirstImagePathFromAPI('http://random.cat/meow'));

} else {

    //gets a random question from the sub array of question types
    $questionID = mt_rand(0, count($questions)-1);

    $questionObject = $questions[$questionID];

    $smarty->assign("questionText", $questions[$questionID]["question"]);
    $smarty->assign("socialMediaText", urlencode($questions[$questionID]["question"]));
    //$smarty->assign("questionObject", $questionObject);



        $type = $questionObject["type"];
        $smarty->assign("questiontype", $type);

        if (in_array($type, array("multiplechoice", "rating"))) {
            $source = $questionObject["source"];
            $smarty->assign("datasource", $source);
        }
        $choices = array();

        if ($type == "shortanswer") {
            //do nothing
        } elseif ($type == "multiplechoice" && $source == "randomFromAPI") {
            for ($questionNumber=0; $questionNumber <= 3; $questionNumber++) {
                $choices[] = getFirstImagePathFromAPI($questionObject["API"]);
            }

        } elseif ($type == "multiplechoice" && $source == "randomFromLink") {
            for ($questionNumber=0; $questionNumber <= 3; $questionNumber++) {
                $choices[] = file_get_contents($questionObject["link"]);
            }
        } elseif ($type == "multiplechoice" && $source == "random") {
            for ($questionNumber=0; $questionNumber <= 3; $questionNumber++) {
                $options = $questionObject["options"];
                $choices[] = $options[mt_rand(0, count($options)-1)];
            }

        } elseif ($type == "multiplechoice" && $source == "text") {
            foreach ($questionObject as $key => $value) {
                if (gettype($key) == "integer") {
                    $choices[] = $value; //add value to choices
                }
            }

        } elseif ($type == "rating" && $source == "randomFromAPI") {
            $smarty->assign("ratingPhoto", getFirstImagePathFromAPI($questionObject["API"]));

        } elseif ($type == "rating" && $source == "none") {
            //do nothing
        }


        $smarty->assign("choices", $choices);


    }


function getFirstImagePathFromAPI($URL) {
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
