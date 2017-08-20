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

        <textarea form="continue" required></textarea>

        {elseif $questionTypeID eq 1}

        <form class="multiplechoice">
            {foreach from=$choices key=$key item=$value}

                <label class="multiplechoice"><input type="radio" form="continue" name="multiplechoice" required><img class="multiplechoiceimage" src="{$choices[$key]}"></label><br>
            {/foreach}
        </form>

        {elseif $questionTypeID eq 2}
        <small>Click the red circles to rate</small>
        <img class="rating" src="{$photoPath}" />
        <form class="rating">
            <span class="starRating">
                {for $point=1 to 10}
                <input id="rating{$point}" type="radio" name="rating" value="{$point}">
                <label for="rating{$point}">{$point}</label>
                {/for}
            </span>
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

{literal}
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64146907-4', 'auto');
  ga('send', 'pageview');

</script>
{/literal}
</body>
</html>
