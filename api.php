<?php
/**
 * Created by PhpStorm.
 * Date: 1/1/18
 * Time: 10:19 AM
 */


require("data.php");


abstract class Errors
{
    const invalidID = 0;
    const requestNotAllowed = 1;
    const invalidCall = 2;
    const randomAndIDCombo = 3;
    const staticAndDynamic = 4;
    const duplicateArguments = 5;
   // const unused = 5;
   // const unused = 5;
   // const unused = 5;
   // const unused = 5;
   // const unused = 5;
   // const unused = 5;
   // const unused = 5;
   // const unused = 5;
   // const unused = 5;
   // const unused = 5;
}

//code heavily modified from https://stackoverflow.com/a/29460180
header('Content-Type: application/json');

$debug = true;

$apiArgArray = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
$returnObject = array();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
        debug_dump($apiArgArray);
        //no need to check if unset because there will always be a first parameter, even if it is "".
        debug_print("Handling GET Request...");

        debug_print("Validating Arguments...");
        validateAPICall();

        debug_print("Retrieving Question Set...");
        $questionSet = getQuestionSet();

        debug_print("Checking For Other Arguments...");
        if (checkArgumentsForValue("random")) {
            $returnObject = getRandomQuestionFromList($questionSet);
        } else if (getIDFromArguments() !== false) {
            $returnObject = $questionSet[getIDFromArguments()];
        } else {
            $returnObject = $questionSet;
        }
}

//check to make sure nothing wonky has been submitted (like "random" and and ID, or "static" and "dynamic")
function validateAPICall() {
    global $apiArgArray;
    
    //check that the first item is "questions"
    if ($apiArgArray[0] !== "questions") {
        handleError(Errors::invalidCall);
    }
 
    if (checkArgumentsForValue("random") && getIDFromArguments() !== false) {
        handleError(Errors::randomAndIDCombo);
    }

    if (checkArgumentsForValue("static") && checkArgumentsForValue("dynamic")) {
        handleError(Errors::staticAndDynamic);
    }

    if (checkForDuplicates()) {
        handleError(Errors::duplicateArguments);
    }

    if (getIDFromArguments() !== false && getIDFromArguments() < $apiArgArray.count) {
        handleError(Errors::invalidID);
    }


}

        //$returnObject = handleGET($apiArgArray, 0);
        //var_dump($returnObject);
      //  break;
   /* case 'PUT':       
        // Replace entire collection or member
        //unimplemented
        break;  
    case 'POST':      
        // Create new member
        //unimplemented
        break;
    case 'DELETE':    
        // Delete collection or member
        //unimplemented
        break;*/

  //  }



// function handleGET($apiArray, $index) {
    
// }


// function handleQuestions($apiArray, $index){
//     debug_print("Handling Questions Resource Request...");

//     if (isset($apiArray[$index]) && !is_numeric($apiArray[$index])) {
//         debug_print("\t...is non-numeric");
//         switch($apiArray[$index]) {
//             case "random":
//                 debug_print("\t...is \"random\"");
//                 return handleRandom(getQuestionSet($apiArray, $index + 1));

//                 break;
//             default:
//                 debug_print("\t...is not defined");
//                 return getQuestionSet($apiArray, $index);//->getJSON();
//                 break;
//         }
//     } else if (isset($apiArray[$index]) && is_numeric($apiArray[$index])) {
//         debug_print("\t...is numeric");
        
//         handleError(Errors::requestNotAllowed);
//     } else { 
//         debug_print("\t...no other parameters added");
//         return getQuestionSet($apiArray, $index);//->getJSON();
//     }
// }

function getQuestionSet() {
    global $excitingQuestions, $boringQuestions;

    if (checkArgumentsForValue("static")) {
        debug_print("\t...returning static questions");
        return $boringQuestions;
    } else if (checkArgumentsForValue("dynamic")) {
        debug_print("\t...returning dynamic questions");
        return $excitingQuestions;
    } else {
        debug_print("\t...returning all questions");
        return $excitingQuestions + $boringQuestions;
    }
}


function checkArgumentsForValue($value){
    global $apiArgArray;
    return in_array($value, $apiArgArray);
}

// function checkArgumentsForIDs() {
//     global $apiArgArray;
//     foreach ($apiArgArray as $argument){
//         if (is_numeric($value)){return true;}
//     }
//     return false;
// }

//this function only gets the first ID found in the arguments array and ignores the rest. False if no IDs
function getIDFromArguments() {
    global $apiArgArray;
//    debug_print("Getting ID...");
    foreach ($apiArgArray as $argument){
        if (is_numeric($argument)){return $argument;}
    }
    return false;
}

//function copied from https://stackoverflow.com/a/3145647
function checkForDuplicates() {
    debug_print("\t...Checking for Duplicates");
    global $apiArgArray;
    return count($array) !== count(array_unique($array));
 }

function getRandomQuestionFromList($questionList) {
    debug_print("Reurning a Random Question...");
    $questionID = mt_rand(0, count($questionList)-1);
    return $questionList[$questionID];//->getJSON();
}

// function validateID($id) {
//     debug_print("Checking given ID...");
//     $questionSet = getQuestionSet($apiArray, $index);
//     if ($id < $questionSet.count) {
//        debug_print("\t...is a valid ID");

//         return $questionSet[$apiArray[$index]];
//     } else {
//         debug_print("\t...is an invalid ID");
//         handleError(Errors::invalidID);
//     }
// }

//when calling this function, plese use the most specific error code.
function handleError($errorCode) {
    global $returnObject;
    echo "error";
    $errorOutput = array("errorcode" => $errorCode);
    switch($errorCode) {
       case Errors::invalidID:
            $errorOutput["message"] = "The ID provided is invalid.";
            break;
        case Errors::requestNotAllowed:
            $errorOutput["message"] = "This API endpoint is not available.";
            break;
        case Errors::invalidCall:
            $errorOutput["message"] = "Invalid API Call.";
            break;
        default: 
            $errorOutput["message"] = "Something Happened.";
            break;
    }

    $genericHelpMessage = " Please see the documentation on github for more information about this API.";

    $errorOutput["message"] .= $genericHelpMessage;
    $returnObject = $errorOutput;
}

function debug_print($message) {
    global $debug;
    if ($debug) {echo $message . "\n";}
}
function debug_dump($var) {
    global $debug;
    if ($debug) {
        var_dump($var);
        debug_print("");
    }
}

debug_print("");
echo json_encode($returnObject);



//class Api
//{
//
//    public static function idIsValid($id) {return is_int($id) && ($id <= count(self::getAllData()));}
//
//
//}