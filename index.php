<?php

require ("vendor/smarty/smarty/libs/Smarty.class.php");
require("questions.php");

$smarty = new Smarty;

//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->assign("cat", isset($_POST["cat"]));

if(isset($_POST["cat"]) && $_POST["cat"]=="1") {
        $smarty->assign("catpath", Question::getFirstImagePathFromAPI('http://random.cat/meow'));

} else {

    //gets a random question from the sub array of question types
    $questionID = mt_rand(0, count($questions)-1);

    $questionObject = $questions[$questionID];

    $smarty->assign("questionText", $questionObject->getQuestion());
    $smarty->assign("socialMediaText", urlencode($questionObject->getQuestion()));
    //$smarty->assign("questionObject", $questionObject);


    $type = $questionObject->getAnswerType();
    $smarty->assign("questionID", $questionID);
    $smarty->assign("questionObject", $questionObject);
    //$smarty->assign("questiontype", $type);

    switch ($type) {
        case AnswerType::ShortAnswer :
            //do nothing
            break;

        case AnswerType::MultipleChoice:
            //if API, get dog/cat
            if ($questionObject->getFirstChoice()->getType() == OptionType::API) {
                $smarty->assign("choices", Question::getImagePathOptionsFromAPIOptions($questionObject->getDesiredNumberOfChoices()));
            } else {
                $smarty->assign("choices", $questionObject->getDesiredNumberOfChoices());
            }
            break;

        case AnswerType::Rating:
            //if supp. img, get dog/cat
            if ($questionObject->hasSupplementaryImage()) {
                $smarty->assign("ratingPhoto", $questionObject->getSupplementaryImagePath());
            }
            break;
    }


}

$smarty->display('index.tpl');
