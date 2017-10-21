<?php

require ("vendor/smarty/smarty/libs/Smarty.class.php");
require("data.php");

$smarty = new Smarty;

//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->assign("cat", isset($_POST["cat"]));

if(isset($_POST["cat"]) && $_POST["cat"]=="1") {
        $smarty->assign("catpath", Api::getValueFromAPI('http://random.cat/meow', "file"));

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
            $questionChoices = $questionObject->getDesiredNumberOfChoices();
            $choices = array();

            foreach ($questionChoices as $choice) {

                if ($choice->getType() == OptionType::API) {

                    if ($choice->getContent()->isRawContent()){
                        $choices[] = $choice->getContent()->getValueAsOption();
                    } else {

                        $imagePath = $choice->getContent()->getValueAsOption();
                        while (!Question::isImagePath($imagePath)) {
                            $imagePath = $choice->getContent()->getValueAsOption();
                        }

                        $choices[] = $imagePath;
                    }




                } else {
                    $choices[] = $choice;
                }
            }

            $smarty->assign("choices", $choices);

            break;

        case AnswerType::Rating:
            //if supp. img, get dog/cat
            if ($questionObject->hasSupplementaryImage()) {
                $imagePath = $questionObject->getSupplementaryImagePath();
                while (!Question::isImagePath($imagePath)) {
                    $imagePath = $questionObject->getSupplementaryImagePath();
                }
                $smarty->assign("ratingPhoto", $imagePath);
            }
            break;
    }


}

$smarty->display('index.tpl');
