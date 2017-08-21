<?php

$questions = array(
    //Short answer (0)
    array(
        // array("question" => "Describe the breed of dog you like best and why you like them."), //REQUIRED
        array("question" => "Describe the breed of dog you like best and why you like them."),
        array("question" => "Describe the weirdest/most adorable story you have of you when you were a kid"),
        array("question" => "What is your favorite emoji and why?"),
        array("question" => "Describe your ideal relationship"),
        array("question" => "What personality trait do you see the most in yourself and why?"),
        array("question" => "What presidential administration were you born under?"),//possibly make into a dropdown?
        array("question" => "What was your favorite event that occured during the year you were born?"),
        array("question" => "What is your zodiac sign?"),
        array("question" => "Who is your favorite actor and why?"),
        array("question" => "What is your favorite book and why?"),
        array("question" => "What is your favorite book series and why?"),
        array("question" => "What is your favorite author and why?"),
        array("question" => "What is your favorite movie and why?"),
        array("question" => "What is your favorite TV show and why?"),
        array("question" => "What is your favorite musical and why?"),
        array("question" => "What is your favorite disney movie and why?"),
        array("question" => "What superpower would you most like to have and why?"),
        array("question" => "If you could only have/use one piece of furniture for the rest of your life what would it be?"),
        array("question" => "Whats your favorite thing to do when you have guests over?"),
        array("question" => "If you could only have one social media account what would it be?"),
        array("question" => "How much wood could a woodchuck chuck if a woodhuck could chuck norris?")
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
            "options" => array("😀", "😃", "😄", "😁", "😆", "😅", "😂", "🤣", "☺️", "😊", "😇", "🙂", "🙃", "😉", "😌", "😍", "😘", "😗", "😙", "😚", "😋", "😜", "😝", "😛", "🤑", "🤗", "🤓", "😎", "🤡", "🤠", "😏", "😒", "😞", "😔", "😤", "😐", "😑", "😳", "😱", "😢", "😭", "😴", "🙄", "🤔", "😬", "😈", "🤖", "👌", "🤞", "🙏", "👍", "👋", "🤷‍♀️", "🤷‍♂️", "🤦‍♀️", "🤦‍♂️", "❤️", "🌈", "💕", "💞", "💓", "💗", "💖", "💘", "💝", "🌟", "⭐️", "✨", "💥", "🎉", "🎊")
        ),
        array(
            "question" => "Which dog breed do you like most?",
            "type" => "random",
            "options" => array("Labrador Retrievers", "German Shepherd", "Golden Retrievers", "Beagles", "Bulldogs", "Yorkshire Terriers", "Boxers", "Poodles", "Rottweilers", "Daschund", "Border Collie", "Australian Shepherd", "St. Bernard", "Scottish Terrier", "Chihuahua", "Schitzu", "Great Dane", "Burmese Mountain Dog")
        ),
        array(
            "question" => "What do you want the most right now?",
            "type" => "text",
            "Food",
            "Sleep",
            "Love",
            "Money",
            "Peace",
            "Cats",
            "Happiness"
        ),
        array(
            "question" => "Would you rather wear skinny jeans or a crop top for the rest of your life?",
            "type" => "text",
            "Skinny Jeans",
            "Crop Top"
        ),
        array(
            "question" => "Would you rather live one 1,000-year life or 10, 100-year lives?",
            "type" => "text",
            "one 1,000-year life",
            "10, 100-year lives"
        ),
        array(
            "question" => "Would you rather be a mindreading illiterate or be able to read?",
            "type" => "text",
            "Mindreading illiterate",
            "Able to read"
        ),
        array(
            "question" => "Would you rather be able to run at 100 mph or fly at 10 mph?",
            "type" => "text",
            "Run at 100mph",
            "Fly at 10mph"
        ),
        array(
            "question" => "Would you rather marry the person you love or feel a sharp pain every time someone says your name?",
            "type" => "text",
            "Yes",
            "No",
            "Sometimes",
            "Maybe",
            "True",
            "False",
            "Cheese"
        )
    ),
    //rating scale (2)
    array(
        // array(
        //     "question" => "How cute is this dog?", //REQUIRED question to ask
        //     "randomFromAPI" => "https://random.dog/woof.json" //OPTIONAL. gets a random image from an API
        // )
        array(
            "question" => "How cute is this cat?",
            "randomFromAPI" => "http://random.cat/meow"
        ),
        array(
            "question" => "How cute is this dog?",
            "randomFromAPI" => "https://random.dog/woof.json"
        ),
        array("question" => "How much do you like ice cream?"),
        array("question" => "How much do you like chocolate?"),
        array("question" => "How much do you like bunnies?"),
        array("question" => "How much do you like soft carpets?"),
        array("question" => "How much do you like swimming?"),
        array("question" => "How much do you like sports?"),
        array("question" => "How much do you like reading?"),
        array("question" => "How much do you like movies?"),
        array("question" => "How much do you like pets?"),
        array("question" => "How much do you like tea?"),
        array("question" => "How much do you like sunny days?")

    )
    //other type???
);


 ?>
