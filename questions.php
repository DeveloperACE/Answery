<?php
include_once("Question.php");
include_once("Option.php");

$emojis = array(
    new Option(OptionType::Text, "😀"),
    new Option(OptionType::Text, "😃"),
    new Option(OptionType::Text, "😄"),
    new Option(OptionType::Text, "😁"),
    new Option(OptionType::Text, "😆"),
    new Option(OptionType::Text, "😅"),
    new Option(OptionType::Text, "😂"),
    new Option(OptionType::Text, "🤣"),
    new Option(OptionType::Text, "☺️"),
    new Option(OptionType::Text, "😊"),
    new Option(OptionType::Text, "😇"),
    new Option(OptionType::Text, "🙂"),
    new Option(OptionType::Text, "🙃"),
    new Option(OptionType::Text, "😉"),
    new Option(OptionType::Text, "😌"),
    new Option(OptionType::Text, "😍"),
    new Option(OptionType::Text, "😘"),
    new Option(OptionType::Text, "😗"),
    new Option(OptionType::Text, "😙"),
    new Option(OptionType::Text, "😚"),
    new Option(OptionType::Text, "😋"),
    new Option(OptionType::Text, "😜"),
    new Option(OptionType::Text, "😝"),
    new Option(OptionType::Text, "😛"),
    new Option(OptionType::Text, "🤑"),
    new Option(OptionType::Text, "🤗"),
    new Option(OptionType::Text, "🤓"),
    new Option(OptionType::Text, "😎"),
    new Option(OptionType::Text, "🤡"),
    new Option(OptionType::Text, "🤠"),
    new Option(OptionType::Text, "😏"),
    new Option(OptionType::Text, "😒"),
    new Option(OptionType::Text, "😞"),
    new Option(OptionType::Text, "😔"),
    new Option(OptionType::Text, "😟"),
    new Option(OptionType::Text, "😕"),
    new Option(OptionType::Text, "🙁"),
    new Option(OptionType::Text, "☹️"),
    new Option(OptionType::Text, "😣"),
    new Option(OptionType::Text, "😖"),
    new Option(OptionType::Text, "😤"),
    new Option(OptionType::Text, "😐"),
    new Option(OptionType::Text, "😑"),
    new Option(OptionType::Text, "😧"),
    new Option(OptionType::Text, "😳"),
    new Option(OptionType::Text, "😱"),
    new Option(OptionType::Text, "😢"),
    new Option(OptionType::Text, "😥"),
    new Option(OptionType::Text, "🤤"),
    new Option(OptionType::Text, "😭"),
    new Option(OptionType::Text, "😓"),
    new Option(OptionType::Text, "😪"),
    new Option(OptionType::Text, "😴"),
    new Option(OptionType::Text, "🙄"),
    new Option(OptionType::Text, "🤔"),
    new Option(OptionType::Text, "😬"),
    new Option(OptionType::Text, "🤐"),
    new Option(OptionType::Text, "🤧"),
    new Option(OptionType::Text, "😷"),
    new Option(OptionType::Text, "💩"),
    new Option(OptionType::Text, "😈"),
    new Option(OptionType::Text, "💀"),
    new Option(OptionType::Text, "👍"),
    new Option(OptionType::Text, "👎"),
    new Option(OptionType::Text, "🤞"),
    new Option(OptionType::Text, "👌"),
    new Option(OptionType::Text, "👋"),
    new Option(OptionType::Text, "🐣"),
    new Option(OptionType::Text, "🐥"),
    new Option(OptionType::Text, "🐬"),
    new Option(OptionType::Text, "🐳"),
    new Option(OptionType::Text, "🔥"),
    new Option(OptionType::Text, "☀️"),
    new Option(OptionType::Text, "🌈"),
    new Option(OptionType::Text, "💰"),
    new Option(OptionType::Text, "🎉"),
    new Option(OptionType::Text, "🎊"),
    new Option(OptionType::Text, "❤️"),
    new Option(OptionType::Text, "💕"),
    new Option(OptionType::Text, "💞"),
    new Option(OptionType::Text, "💗"),
    new Option(OptionType::Text, "💖"),
    new Option(OptionType::Text, "💘"),
    new Option(OptionType::Text, "💝"),
    new Option(OptionType::Text, "🏳️‍🌈"),
    new Option(OptionType::Text, "🌟"),
    new Option(OptionType::Text, "⭐"),
    new Option(OptionType::Text, "✨"),
    new Option(OptionType::Text, "💥")
);


//ikea furniture

$questions = array(

    new Question("Describe the breed of dog you like best and why you like them."),
    new Question("Describe the weirdest/most adorable story you have of you when you were a kid"),
    new Question("What do you think the purpose of a relationship is?"),
    new Question("Describe your childhood best friend"),
    new Question("What is your favorite emoji and why?"),
    new Question("What is your favorite weather and why?"),
    new Question("Describe your ideal relationship"),
    new Question("What personality trait do you see the most in yourself and why?"),
    new Question("What presidential administration were you born under?"),//possibly make into a dropdown?
    new Question("What was your favorite event that occured during the year you were born?"),
    new Question("What is your zodiac sign?"),
    new Question("Who is your favorite actor and why?"),
    new Question("What is your favorite book and why?"),
    new Question("What is your favorite book series and why?"),
    new Question("What is your favorite author and why?"),
    new Question("What is your favorite ice cream flavor and why?"),
    new Question("What is your favorite type of sweater and why?"),
    new Question("What is your favorite movie and why?"),
    new Question("What is your favorite TV show and why?"),
    new Question("What is your favorite musical and why?"),
    new Question("What is your favorite disney movie and why?"),
    new Question("What excites you the most?"),
    new Question("If you could go anywhere, would it be to a place or a person? Where/who and why?"),
    new Question("What superpower would you most like to have and why?"),
    new Question("If you could only have/use one piece of furniture for the rest of your life what would it be?"),
    new Question("Whats your favorite thing to do when you have guests over?"),
    new Question("If you could only have one social media account what would it be?"),
    new Question("How much wood could a woodchuck chuck if a woodchuck could chuck norris?"),
    new Question("If you could have dinner with anyone living or dead, who would it be and why?"),
    new Question(
        "Which of these cats is cuter?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::API, "http://random.cat/meow")
        ),
        4
    ),
    new Question(
        "Which of these words do you like more?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::API, "http://setgetgo.com/randomword/get.php")
        ),
        4
    ),
    new Question(
        "Which of these dogs is cuter?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::API, "https://random.dog/woof.json")
        ),
        4
    ),
    new Question(
        "Which emoji do you use most often?",
        null,
        AnswerType::MultipleChoice,
        $emojis,
        4
    ),
    new Question(
        "Which dog breed do you like most?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Text, "Labrador Retrievers"),
            new Option(OptionType::Text, "German Shepherd"),
            new Option(OptionType::Text, "Golden Retrievers"),
            new Option(OptionType::Text, "Beagles"),
            new Option(OptionType::Text, "Bulldogs"),
            new Option(OptionType::Text, "Yorkshire Terriers"),
            new Option(OptionType::Text, "Boxers"),
            new Option(OptionType::Text, "Poodles"),
            new Option(OptionType::Text, "Rottweilers"),
            new Option(OptionType::Text, "Daschund"),
            new Option(OptionType::Text, "Border Collie"),
            new Option(OptionType::Text, "Australian Shepherd"),
            new Option(OptionType::Text, "St. Bernard"),
            new Option(OptionType::Text, "Scottish Terrier"),
            new Option(OptionType::Text, "Chihuahua"),
            new Option(OptionType::Text, "Schitzu"),
            new Option(OptionType::Text, "Great Dane"),
            new Option(OptionType::Text, "Burmese Mountain Dog")
        ),
        4
    ),
    new Question(
        "What do you want the most right now?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Text, "Food"),
            new Option(OptionType::Text, "Sleep"),
            new Option(OptionType::Text, "Love"),
            new Option(OptionType::Text, "Money"),
            new Option(OptionType::Text, "Peace"),
            new Option(OptionType::Text, "Cats"),
            new Option(OptionType::Text, "Happiness")),
        7
    ),
    new Question(
        "Would you rather wear skinny jeans or a crop top for the rest of your life?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Text, "Skinny Jeans"),
            new Option(OptionType::Text, "Crop Top")),
        2
    ),
    new Question(
        "Would you rather live one 1,000-year life or 10, 100-year lives?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Text, "one 1,000-year life"),
            new Option(OptionType::Text, "10, 100-year lives")
        ),
        2
    ),
    new Question(
        "Would you rather be a mindreading illiterate or be able to read?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Text, "Mindreading illiterate"),
            new Option(OptionType::Text, "Able to read")
        ),
        2
    ),
    new Question(
        "Would you rather be able to run at 100 mph or fly at 10 mph?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Text, "Run at 100mph"),
            new Option(OptionType::Text, "Fly at 10mph")
        ),
        2
    ),
    new Question(
        "Would you rather marry the person you love or feel a sharp pain every time someone says your name?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Text, "Yes"),
            new Option(OptionType::Text, "No"),
            new Option(OptionType::Text, "Sometimes"),
            new Option(OptionType::Text, "Maybe"),
            new Option(OptionType::Text, "True"),
            new Option(OptionType::Text, "False"),
            new Option(OptionType::Text, "Cheese")
        ),
        7
    ), new Question(
        "Leaves are swell right?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Text, "Right!"),
            new Option(OptionType::Text, "Right?"),
            new Option(OptionType::Text, "Huh?"),
            new Option(OptionType::Text, "I Guess???????")
        ),
        4
    ),
    new Question(
        "Which is better? Bunnies or Hedgehogs?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Text, "Bunnies"),
            new Option(OptionType::Text, "Hedgehogs"),
            new Option(OptionType::Text, "All of the above"),
            new Option(OptionType::Text, "None of the above")
        ),
        4
    ),
    new Question("How cute is this cat?",
        "http://random.cat/meow",
        AnswerType::Rating
    ),
    new Question(
        "How cute is this dog?",
        "https://random.dog/woof.json",
        AnswerType::Rating
    ),
    new Question("How much do you like ice cream?",
        null,
        AnswerType::Rating
    ),
    new Question("How much do you like chocolate?",
        null,
        AnswerType::Rating
    ),
    new Question("How much do you like bunnies?",
        null,
        AnswerType::Rating
    ),
    new Question("How much do you like soft carpets?",
        null,
        AnswerType::Rating
    ),
    new Question("How much do you like swimming?",
        null,
        AnswerType::Rating
    ),
    new Question("How much do you like sports?",
        null,
        AnswerType::Rating
    ),
    new Question("How much do you like reading?",
        null,
        AnswerType::Rating
    ),
    new Question("How much do you like movies?",
        null,
        AnswerType::Rating
    ),
    new Question("How much do you like pets?",
        null,
        AnswerType::Rating
    ),
    new Question("How much do you like tea?",
        null,
        AnswerType::Rating
    ),
    new Question("How much do you like sunny days?",
        null,
        AnswerType::Rating
    )
);

