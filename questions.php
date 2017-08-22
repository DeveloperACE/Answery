<?php


// array(
//     "question" => "How cute is this cat?", //REQUIRED
//     "type" => "",                          //REQUIRED can be "shortanswer", "multiple choice", "rating" (only allowed randomFromAPI or none as sources)
//     "source" => "randomFromAPI",             //REQUIRED. can be "randomfromAPI", "random" or "text"
//     "API" => "http://random.cat/meow",     //required if type is "randomfromAPI"
//     "Option 1"                 //required for each option if type is "text"
//     "options" => Array()       //required if type = random
// ),
$questions = array(
        array(
            "question" => "Describe the breed of dog you like best and why you like them.",
            "type" => "shortanswer"
        ),
        array(
            "question" => "Describe the weirdest/most adorable story you have of you when you were a kid",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What is your favorite emoji and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "Describe your ideal relationship",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What personality trait do you see the most in yourself and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What presidential administration were you born under?",
            "type" => "shortanswer"
        ),//possibly make into a dropdown?
        array(
            "question" => "What was your favorite event that occured during the year you were born?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What is your zodiac sign?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "Who is your favorite actor and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What is your favorite book and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What is your favorite book series and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What is your favorite author and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What is your favorite movie and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What is your favorite TV show and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What is your favorite musical and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What is your favorite disney movie and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "What superpower would you most like to have and why?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "If you could only have/use one piece of furniture for the rest of your life what would it be?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "Whats your favorite thing to do when you have guests over?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "If you could only have one social media account what would it be?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "How much wood could a woodchuck chuck if a woodhuck could chuck norris?",
            "type" => "shortanswer"
        ),
        array(
            "question" => "Which of these cats is cuter?",
            "type" => "multiplechoice",
            "source" => "randomFromAPI",
            "API" => "http://random.cat/meow"
        ),
        array(
            "question" => "Which of these dogs is cuter?",
            "type" => "multiplechoice",
            "source" => "randomFromAPI",
            "API" => "https://random.dog/woof.json"
        ),
        array(
            "question" => "Which emoji do you like better?",
            "type" => "multiplechoice",
            "source" => "random",
            "options" => array("😀", "😃", "😄", "😁", "😆", "😅", "😂", "🤣", "☺️", "😊", "😇", "🙂", "🙃", "😉", "😌", "😍", "😘", "😗", "😙", "😚", "😋", "😜", "😝", "😛", "🤑", "🤗", "🤓", "😎", "🤡", "🤠", "😏", "😒", "😞", "😔", "😤", "😐", "😑", "😳", "😱", "😢", "😭", "😴", "🙄", "🤔", "😬", "😈", "🤖", "👌", "🤞", "🙏", "👍", "👋", "🤷‍♀️", "🤷‍♂️", "🤦‍♀️", "🤦‍♂️", "❤️", "🌈", "💕", "💞", "💓", "💗", "💖", "💘", "💝", "🌟", "⭐️", "✨", "💥", "🎉", "🎊")
        ),
        array(
            "question" => "Which dog breed do you like most?",
            "type" => "multiplechoice",
            "source" => "random",
            "options" => array("Labrador Retrievers", "German Shepherd", "Golden Retrievers", "Beagles", "Bulldogs", "Yorkshire Terriers", "Boxers", "Poodles", "Rottweilers", "Daschund", "Border Collie", "Australian Shepherd", "St. Bernard", "Scottish Terrier", "Chihuahua", "Schitzu", "Great Dane", "Burmese Mountain Dog")
        ),
        array(
            "question" => "What do you want the most right now?",
            "type" => "multiplechoice",
            "source" => "text",
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
            "type" => "multiplechoice",
            "source" => "text",
            "Skinny Jeans",
            "Crop Top"
        ),
        array(
            "question" => "Would you rather live one 1,000-year life or 10, 100-year lives?",
            "type" => "multiplechoice",
            "source" => "text",
            "one 1,000-year life",
            "10, 100-year lives"
        ),
        array(
            "question" => "Would you rather be a mindreading illiterate or be able to read?",
            "type" => "multiplechoice",
            "source" => "text",
            "Mindreading illiterate",
            "Able to read"
        ),
        array(
            "question" => "Would you rather be able to run at 100 mph or fly at 10 mph?",
            "type" => "multiplechoice",
            "source" => "text",
            "Run at 100mph",
            "Fly at 10mph"
        ),
        array(
            "question" => "Would you rather marry the person you love or feel a sharp pain every time someone says your name?",
            "type" => "multiplechoice",
            "source" => "text",
            "Yes",
            "No",
            "Sometimes",
            "Maybe",
            "True",
            "False",
            "Cheese"
        ),
        array(
            "question" => "How cute is this cat?",
            "type" => "rating",
            "source" => "randomFromAPI",
            "API" => "http://random.cat/meow"
        ),
        array(
            "question" => "How cute is this dog?",
            "type" => "rating",
            "source" => "randomFromAPI",
            "API" => "https://random.dog/woof.json"
        ),
        array(
            "question" => "How much do you like ice cream?",
            "type" => "rating",
            "source" => "none",
        ),
        array(
            "question" => "How much do you like chocolate?",
            "type" => "rating",
            "source" => "none",
        ),
        array(
            "question" => "How much do you like bunnies?",
            "type" => "rating",
            "source" => "none",
        ),
        array(
            "question" => "How much do you like soft carpets?",
            "type" => "rating",
            "source" => "none",
        ),
        array(
            "question" => "How much do you like swimming?",
            "type" => "rating",
            "source" => "none",
        ),
        array(
            "question" => "How much do you like sports?",
            "type" => "rating",
            "source" => "none",
        ),
        array(
            "question" => "How much do you like reading?",
            "type" => "rating",
            "source" => "none",
        ),
        array(
            "question" => "How much do you like movies?",
            "type" => "rating",
            "source" => "none",
        ),
        array(
            "question" => "How much do you like pets?",
            "type" => "rating",
            "source" => "none",
        ),
        array(
            "question" => "How much do you like tea?",
            "type" => "rating",
            "source" => "none",
        ),
        array(
            "question" => "How much do you like sunny days?",
            "type" => "rating",
            "source" => "none",
        )

);


 ?>
