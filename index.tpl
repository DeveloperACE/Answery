<html>
<head>
    <title>Answery- a simple webapp for people who like answering questions</title>
    <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
    <h1>Answery</h1>
    <p id="subtitle">-a simple webapp for people who like answering random questions-</p>
    <hr>
{nocache}
    {if isset($catpath)}
        <img id="cat" src="{$catpath}" />

    {else}
        {if $questionTypeID eq 0}
        <h2>{$question}</h2>
        <textarea></textarea>
        {/if}
    {/if}

    <form action="#" method="get">
        {if !$cat}
            <input type="hidden" name="cat" value="true"></input>
        {/if}
        <input type="submit" value="Continue >"></input>
    </form>

{/nocache}
    <footer>
        <small>Copyright &copy; Adrian Edwards 2017. <a href="http://github.com/DeveloperACE/Answery">View the Source Code!</a></small>
      </p>
    </footer>
</body>
</html>
