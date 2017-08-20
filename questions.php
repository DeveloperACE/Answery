<?php

$questions = array(
    //Short answer (0)
    array(
        array("question" => "Describe the breed of dog you like best and why you like them."),
        array("question" => "Describe the weirdest/most adorable story you have of you when you were a kid"),
        array("question" => "What is your favorite emoji and why?"),
        array("question" => "Describe your ideal relationship"),
        array("question" => "What personality trait do you see the most in yourself and why?")
    ),
    //Multiple choice (1)
    array(
        // array(
        //     "question" => "How cute is this cat?", //REQUIRED
        //     "type" => "randomFromAPI",             //REQUIRED. can be "randomfromAPI", "random" or "text"
        //     "API" => "http://random.cat/meow",     //required if type is "randomfromAPI"
        //     "Option 1"                 //required for each option if type is "text"
        //     "options" => Array()       //required if type = random
        // ),
        array(
            "question" => "Which of these cats is cuter?",
            "type" => "randomFromAPI",
            "API" => "http://random.cat/meow"
        ),
        array(
            "question" => "Which of these dogs is cuter?",
            "type" => "randomFromAPI",
            "API" => "https://random.dog/woof.json"
        ),
        array(
            "question" => "Which emoji do you like better?",
            "type" => "random",
            "options" => array("👌","😂","🙄","❤️","☺️","😘","😉","😜","😔","😳","😑","😊","🎉","😇","✨","🤷","🏻","🙃","😅","💃","🏻","🏼","⭐️","💥")
        )
    ),
    //rating scale (2)
    array(
        array(
            "question" => "How cute is this cat?",
            "randomFromAPI" => "http://random.cat/meow"
        ),
        array(
            "question" => "How cute is this dog?",
            "randomFromAPI" => "https://random.dog/woof.json"
        )
    )
    //other type???
);


 ?>
