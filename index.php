<?php

require ("vendor/smarty/smarty/libs/Smarty.class.php");
require("data.php");

$smarty = new Smarty;

//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->assign("reward", isset($_POST["reward"]));

if(isset($_POST["reward"]) && $_POST["reward"]=="1") {
    switch (mt_rand(0, 1)) {
        case 0:
            $smarty->assign("rewardImgPath", Api::getValueFromAPI('http://random.cat/meow', "file"));
            break;
        case 1:
            $smarty->assign("rewardImgPath", Api::getValueFromAPI('http://random.dog/woof.json', "url"));

            break;
        default:
            break;
    }
      //  $smarty->assign("rewardImgPath", Api::getValueFromAPI('http://random.cat/meow', "file"));

} else {

    //assume user wants all questions
    $questions = $excitingQuestions + $boringQuestions;


    //SETTING TPL VARS

    $smarty->assign("prefsUpdated", ($_SERVER["REQUEST_METHOD"] == "POST"));

    //if either (post is set and == 1) or (cookie is set and == 1), set tpl var to 1
    if ((isset($_POST["filterBoringQuestions"]) && $_POST["filterBoringQuestions"] == 1) || (isset($_COOKIE["filterBoringQuestions"]) && $_COOKIE["filterBoringQuestions"] == 1)) {
        //set smarty var to one
        $smarty->assign("filterBoringQuestions", 1);
    }

    //if either (post is set and == 0) or (cookie is set and == 0), set tpl var to 0
    if ((isset($_POST["filterBoringQuestions"]) && $_POST["filterBoringQuestions"] == 0) || (isset($_COOKIE["filterBoringQuestions"]) && $_COOKIE["filterBoringQuestions"] == 0)) {
        //set smarty var to one
        $smarty->assign("filterBoringQuestions", 0);
    }




//setting cookie

    //is user opts to filter questions, set the cookie
    if((isset($_POST["filterBoringQuestions"]) && $_POST["filterBoringQuestions"] == 1)) {
        setcookie("filterBoringQuestions", 1);
        $smarty->assign("filterBoringQuestions", 1);
    }

    //unset cookie if user submits no
    if (isset($_POST["filterBoringQuestions"]) && $_POST["filterBoringQuestions"] == 0 ) {setcookie("filterBoringQuestions", 0);}


    //filter questions

    if ($smarty->getTemplateVars("filterBoringQuestions") !== null && $smarty->getTemplateVars("filterBoringQuestions")) {
            $questions = $excitingQuestions;
    }



    //gets a random question
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

                    if ($choice->getContent()->isRawContent()){ $choices[] = $choice->getContent()->getValueAsOption();}
                    else {
                        $imageOptionObject = $choice->getContent()->getValueAsOption();

                        //keep getting images until you have 4 images
                        while (!Question::isImagePath($imageOptionObject->getContent())) {
                            $imageOptionObject = $choice->getContent()->getValueAsOption();
                        }

                        $choices[] = $imageOptionObject;
                    }
                } elseif ($choice->getType() == OptionType::Color && $choice->getContent() == "random") {

                    //https://stackoverflow.com/a/20218712/3033386
                    $str = '#';
                    for ($i = 0; $i < 6; $i++) {
                        $randNum = rand(0, 15);
                        switch ($randNum) {
                            case 10: $randNum = 'A';
                                break;
                            case 11: $randNum = 'B';
                                break;
                            case 12: $randNum = 'C';
                                break;
                            case 13: $randNum = 'D';
                                break;
                            case 14: $randNum = 'E';
                                break;
                            case 15: $randNum = 'F';
                                break;
                        }
                        $str .= $randNum;
                    }

                    $choices[] = new Option(OptionType::Color, $str);

                } else {$choices[] = $choice;}
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
