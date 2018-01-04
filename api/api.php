<?php
/**
 * Created by PhpStorm.
 * Date: 1/1/18
 * Time: 10:19 AM
 */


require("../data.php");

if (isset($_GET["action"])) {

    $action = $_GET["action"];

    switch ($action){
        case "random":
            $questions = $excitingQuestions + $boringQuestions;

            $questionID = mt_rand(0, count($questions)-1);
            $questionObject = $questions[$questionID]->getJSON();

            echo $questionObject;

            break;
        case "randomdynamic":

            $questions = $excitingQuestions;
            $questionID = mt_rand(0, count($questions)-1);
            $questionObject = $questions[$questionID]->getJSON();

            echo $questionObject;


            break;
        case "randomstatic":

            $questions = $boringQuestions;
            $questionID = mt_rand(0, count($questions)-1);
            $questionObject = $questions[$questionID]->getJSON();

            echo $questionObject;

            break;


        default:
            echo "Invalid Parameter. Please see the documentation on github.";
            break;

    }





} else {
    echo "Invalid Token. Please see the documentation on github.";
}




//class Api
//{
//
//    public static function idIsValid($id) {return is_int($id) && ($id <= count(self::getAllData()));}
//
//
//}
