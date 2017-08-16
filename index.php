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
    //get Cat
    $catPath = json_decode(file_get_contents('http://random.cat/meow'), true);
    $catPath = $catPath["file"];

    echo '<img id="cat" src="' . $catPath . '"/>';
} else {


 ?>
 <h2>Would you please insert a question here?</h2>

 <textarea> </textarea>
 <?php

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
