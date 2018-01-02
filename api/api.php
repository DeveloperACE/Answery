<?php
/**
 * Created by PhpStorm.
 * Date: 1/1/18
 * Time: 10:19 AM
 */

if (isset($_GET["action"])) {

    $action = $_GET["action"];

    switch ($action){
        case "random":


            break;
        case "randomdynamic":


            break;
        case "randomstatic":


            break;
        case "byid":

            break;
        case "all":


            break;
        default:
            echo "Invalid Parameter. Please see the documentation on github.";
            break;

    }





} else {
    echo "Invalid Token. Please see the documentation on github.";
}
require("data.php");
class Api
{

    public static function idIsValid($id) {return is_int($id) && ($id <= count($excitingQuestions + $boringQuestions));}

}
