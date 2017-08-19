<html>
<head>
    <title>Answery- a simple webapp for people who like answering questions</title>
    <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
    <h1>Answery</h1>
    <p id="subtitle">-a simple webapp for people who like answering random questions-</p>
     <a id="viewsource" href="http://github.com/DeveloperACE/Answery">View the Source Code!</a>
     <a id="submit" href="https://github.com/DeveloperACE/Answery/issues/new">Submit a Question!</a>
    <hr>
{nocache}
    {if isset($catpath)}
    <h2>Here's your reward cat!</h2>
        <img id="rewardcat" src="{$catpath}" />

    {else}
    <h2>{$questionText}</h2>
        {if $questionTypeID eq 0}
        <textarea></textarea>
        {elseif $questionTypeID eq 1}
        <form class="multiplechoice">
            {foreach from=$choices key=$key item=$value}

                <label class="multiplechoice"><input type="radio" name="multiplechoice"><img class="multiplechoiceimage" src="{$choices[$key]}"></label><br>
            {/foreach}
        </form>

        {/if}
    {/if}
<footer>
    <form id="continue" action="#" method="get">
        {if !$isCatSet}
            <input type="hidden" name="cat" value="true"></input>
        {/if}
        <input type="submit" value="Continue >"></input>
    </form>
</footer>
{/nocache}

</body>
</html>
