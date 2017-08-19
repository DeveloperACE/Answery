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
        //https://random.dog/woof.json
        //{"url":"https://random.dog/6d7c676e-e48d-4e53-9f4d-46561ce429c1.JPG"}
    )
    //other type???
);


 ?>
