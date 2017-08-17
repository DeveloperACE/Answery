<html>
<head>
    <title>Answery- a simple webapp for people who like answering questions</title>
    <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
<h1>Answery</h1>
<p id="subtitle">-a simple webapp for people who like answering random questions-</p>
<hr>


<?php
    require("questions.php");

//var_dump($_POST);


if(isset($_GET["cat"])) {
    //get the json contents of the random.cat API and save it to a variable as an array
    $catPath = json_decode(file_get_contents('http://random.cat/meow'), true);
    $catPath = $catPath["file"];

    echo '<img id="cat" src="' . $catPath . '"/>';
} else {

    //manual override because only short answer has been implemented
    $questionTypePicker = 0;//mt_rand(0, count($questions)-1);
    //gets a random question from the question array
    $questionIndex = mt_rand(0, count($questions[$questionTypePicker])-1);
    $question = $questions[$questionTypePicker][$questionIndex];

    if ($questionTypePicker == 0) {
         echo "<h2>" . $question . "</h2>";
         echo "<textarea></textarea>";
    }
 }
 ?>

    <footer>
        <form action="#" method="get">
            <?php if(!isset($_GET["cat"])) {?>
            <input type="hidden" name="cat" value="true"></input>
        <?php } ?>
            <input type="submit" value="Continue >"></input>
        </form>
    </footer>
</body>
</html>
