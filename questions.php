<?php

$questions = array(
    //Short answer
    array(
        array("question" => "Describe the breed of dog you like best and why you like them."),
        array("question" => "Describe the weirdest/most adorable story you have of you when you were a kid"),
        array("question" => "What is your favorite emoji and why?"),
        array("question" => "Describe your ideal relationship"),
        array("question" => "What personality trait do you see the most in yourself and why?")
    ),
    //Multiple choice
    array(
        array(
            "question" => "Which of these cats is cuter?",
            "randomFromAPI" => "http://random.cat/meow"
        ),
        array(
            "question" => "Which of these dogs is cuter?",
            "randomFromAPI" => "https://random.dog/woof.json"
        )
    ),
    //rating scale
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
