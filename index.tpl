<html>
<head>
    <title>Answery- a simple webapp for people who like answering questions</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <meta charset="UTF-8">
    <meta property="og:site_name" content="Answery" />
    <meta property="og:image" content="https://answery.herokuapp.com/answery-logo.jpg" />
    <meta name="description" content="Answery is a simple webapp for people who like answering random questions but dont really care about the answers.">
    <meta name="keywords" content="Answery, cats, dogs, cute, boredom, questions, buzzfeed, colors, countries, random">
    <meta name="author" content="Adrian Edwards">

    <link rel="apple-touch-icon" href="answery-logo.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{literal}


<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//analytics.adriancedwards.com/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '2']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//analytics.adriancedwards.com/piwik.php?idsite=2&amp;rec=1" style="border:0;" alt="" /></p></noscript>
<!-- End Matomo Code -->

{/literal}

</head>
<body>
    <h1>Answery</h1>
    <p id="subtitle">-a simple webapp for people who like answering random questions-</p>
    <ul class="menu">
     <li class="link"><a class="menu" href="http://github.com/DeveloperACE/Answery">Source Code</a></li> -
     <li class="link"><a class="menu" href="https://github.com/DeveloperACE/Answery/issues/new">Submit Questions/Feedback</a></li>
 </ul>
     <div class="socialMediaButtons">
     {nocache}
     {if $reward}

         <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Answer%20questions%3A%20get%20cats!">Tweet</a>
    {else}
    <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={$socialMediaText}">Tweet</a>
    {/if}
    {/nocache}

     <g:plusone></g:plusone>
 </div>

    <hr>
{nocache}
    {if isset($rewardImgPath)}
    <h2>Here's your cute reward photo!</h2>
        <img id="rewardImg" src="{$rewardImgPath}" />

    {else}

    <form id="filter" action="." method="post">
        Filter out non-unique questions?
        <input type="radio" name="filterBoringQuestions" value="1" {if isset($filterBoringQuestions) and $filterBoringQuestions eq 1}checked{/if}>yes</input>&nbsp;
            <input type="radio" name="filterBoringQuestions" value="0" {if  isset($filterBoringQuestions) and $filterBoringQuestions eq 0}checked{/if}>no</input>&nbsp;

        {if $prefsUpdated}
            <input type="submit" value="Saved!" disabled>
        {else}
            <input type="submit" value="Save Preference">
        {/if}

    </form>

    <h2>{$questionText}</h2>

        {if $questionObject->getAnswerType() eq "shortanswer"}
            <textarea form="continue" required></textarea>

        {elseif $questionObject->getAnswerType() eq "multiplechoice"}
            {if $choices[0]->getType() eq "image"}
                <form class="multiplechoiceFlex">
                {foreach from=$choices key=$key item=$value}
                    <label class="multiplechoiceIMG"><input type="radio" form="continue" name="multiplechoice" required><img class="multiplechoiceimage" src="{$value->getContent()}"></label><br>
                {/foreach}
                </form>
            {elseif $choices[0]->getType() eq "text"}
                <form class="multiplechoice">
                    {foreach from=$choices key=$key item=$value}
                        <label class="multiplechoice"><input type="radio" form="continue" name="multiplechoice" required> {$value->getContent()|capitalize}</label><br>
                    {/foreach}
                </form>
            {elseif $choices[0]->getType() eq "color"}
                <form class="multiplechoiceFlex">
                    {foreach from=$choices key=$key item=$value}
                        <label class="multiplechoiceColor"><input type="radio" form="continue" name="multiplechoice" required> <div class="multiplechoiceColor" style="background-color: {$value->getContent()}"></div></label><br>
                    {/foreach}
                </form>
            {/if}

        {elseif $questionObject->getAnswerType() eq "rating"}
        <small>Click the red circles to rate</small>
        {if $questionObject->hasSupplementaryImage()}
        <img class="rating" src="{$ratingPhoto}" />
        {/if}
        <form class="rating">
            <span class="starRating">
                {for $point=1 to 10}
                <input form="continue" id="rating{$point}" type="radio" name="rating" value="{$point}" required>
                <label for="rating{$point}">{$point}</label>
                {/for}
            </span>
        </form>
        {/if}
    {/if}
<footer>
    <form id="continue" action="." method="post">
        {if $reward eq 0}
        <input type="hidden" name="reward" value="1">
        {elseif reward eq 1}
        <input type="hidden" name="reward" value="0">
        {/if}
        <input type="submit" value="Continue >">
    </form>
    {if $reward eq 0}
    <form id="skip" action=".">
        <input type="submit" value="Skip >">
    </form>
    {/if}
</footer>
{/nocache}

{literal}


<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>


{/literal}
</body>
</html>
