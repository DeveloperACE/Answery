<?php
include_once("Question.php");
include_once("Option.php");
include_once("OtherApi.php");
//ikea furniture

//these are lists of data that are used to produce possible answers to questions that I could not find an API for

$emojiList = array("😀", "😬", "😁", "😂", "😃", "😄", "😅", "😆", "😇", "😉", "😊", "🙂", "🙃", "☺️", "😋", "😌", "😍", "😘", "😗", "😙", "😚", "😜", "😝", "😛", "🤑", "🤓", "😎", "🤗", "😏", "😶", "😐", "😑", "😒", "🙄", "🤔", "😳", "😞", "😟", "😠", "😡", "😔", "😕", "🙁", "☹️", "😣", "😖", "😫", "😩", "😤", "😮", "😱", "😨", "😰", "😯", "😦", "😧", "😢", "😥", "😪", "😓", "😭", "😵", "😲", "🤐", "😷", "🤒", "🤕", "😴", "💤", "💩", "😈", "👿", "👹", "👺", "👻", "💀", "☠️", "👽", "👾", "🤖", "😺", "😸", "😹", "😻", "😼", "😽", "🙀", "😿", "😾", "🙌", "👏", "👍", "👎", "👊", "✊", "👋", "👈", "👉", "👆", "👇", "👌", "☝️", "✌️", "✋", "🖐", "👐", "💪", "🙏", "🖖", "🤘", "🖕", "✍️", "💅", "👄", "👅", "👂", "👃", "👁", "👀", "🗣", "👤", "👥", "👶", "👦", "👧", "👨", "👩", "👱", "👴", "👵", "👲", "👳", "👮", "👷", "💂", "🎅", "👸", "👰", "👼", "🙇", "💁", "🙅", "🙆", "🙋", "🙎", "🙍", "💇", "💆", "💃", "👯", "🚶", "🏃", "👫", "👭", "👬", "💑", "💏", "👪", "🐶", "🐱", "🐭", "🐹", "🐰", "🐻", "🐼", "🐨", "🐯", "🦁", "🐮", "🐷", "🐽", "🐸", "🐙", "🐵", "🙈", "🙉", "🙊", "🐒", "🐔", "🐧", "🐦", "🐤", "🐣", "🐥", "🐺", "🐗", "🐴", "🦄", "🐝", "🐛", "🐌", "🐞", "🐜", "🕷", "🦂", "🦀", "🐍", "🐢", "🐠", "🐟", "🐡", "🐬", "🐳", "🐋", "🐊", "🐆", "🐅", "🐃", "🐂", "🐄", "🐪", "🐫", "🐘", "🐐", "🐏", "🐑", "🐎", "🐖", "🐀", "🐁", "🐓", "🦃", "🕊", "🐕", "🐩", "🐈", "🐇", "🐿", "🐾", "🐉", "🐲", "🌵", "🎄", "🌲", "🌳", "🌴", "🌱", "🌿", "☘", "🍀", "🎍", "🎋", "🍃", "🍂", "🍁", "🌾", "🌺", "🌻", "🌹", "🌷", "🌼", "🌸", "💐", "🍄", "🌰", "🎃", "🐚", "🍏", "🍎", "🍐", "🍊", "🍋", "🍌", "🍉", "🍇", "🍓", "🍈", "🍒", "🍑", "🍍", "🍅", "🍆", "🌶", "🌽", "🍠", "🍯", "🍞", "🧀", "🍗", "🍖", "🍤", "🍳", "🍔", "🍟", "🌭", "🍕", "🍝", "🌮", "🌯", "🍜", "🍲", "🍥", "🍣", "🍱", "🍛", "🌈", "💸", "💵", "💴", "💶", "💷", "💰", "💳", "💎", "❤️", "💛", "💚", "💙", "💜", "💔", "❣️", "💕", "💞", "💓", "💗", "💖", "💘", "💝");

$emojis = array();

foreach ($emojiList as $thisEmoji) {
    $emojis[] = new Option(OptionType::Text, $thisEmoji);
}

$countryList = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Australia", "Austria", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Bermuda", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Cook Islands", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guyana", "Haiti", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Korea", "Kuwait", "Kyrgyzstan", "Latvia", "Lebanon", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "RWANDA", "Saint Helena", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "U.S. Virgin Islands", "Western Sahara", "Yemen", "Zambia", "Zimbabwe");

$countries = array();

foreach ($countryList as $thisCountry) {
    $countries[] = new Option(OptionType::Text, $thisCountry);
}


//these are the questions that answery randomly picks from
$excitingQuestions = array(
    new Question(
        "Which color do you prefer?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Color,"random")
        ),
        4
    ),
    new Question(
        "Which color looks ugliest?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::Color,"random")
        ),
        4
    ),
    new Question(
        "Which of these cats is cuter?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(OptionType::OtherAPI,
                new OtherApi("http://aws.random.cat/meow", "file")
            )
        ),
        4
    ),
    new Question(
        "Which of these words do you like more?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(
                OptionType::OtherAPI,
                new OtherApi("http://setgetgo.com/randomword/get.php")
            )
        ),
        4
    ),
    new Question(
        "Which of these dogs is cuter?",
        null,
        AnswerType::MultipleChoice,
        array(
            new Option(
                OptionType::OtherAPI,
                new OtherApi("https://random.dog/woof.json", "url")
            )
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
        "Which country would you most like to live in?",
        null,
        AnswerType::MultipleChoice,
        $countries,
        4
    ),
    new Question(
        "Which dog breed do you like most?",
        null,
        AnswerType::MultipleChoice,
        OtherApi::getTextOptionListFromArray(OtherApi::getValueFromAPI("http://dog.ceo/api/breeds/list", "message")),
        4
    ),

    new Question("How cute is this cat?",
        new OtherApi("http://aws.random.cat/meow", "file"),
        AnswerType::Rating
    ),
    new Question(
        "How cute is this dog?",
        new OtherApi("https://random.dog/woof.json", "url"),
        AnswerType::Rating
    ),

);


$boringQuestions = array(
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

