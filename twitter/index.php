<link href="css/styles.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/jquery.tweet-linkify.js"></script>
<div class="twittersection">
<script>
function pageReady(){
    console.log("pageReady()");
    $('p.tweet').tweetLinkify();
    $('div.users').tweetLinkify();
};
</script>

<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');


/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "174113284-SvjOaa7T5aN4EiGkly0s8mCr2jRQRtlfmPszOo3b",
    'oauth_access_token_secret' => "sGMGrNmEQCFGjtrNK0LHCbIiinNe9fVzNpJ3SEBp58u8f",
    'consumer_key' => "WTiAo3RAg7vmEsYDbINExjhwW",
    'consumer_secret' => "q0inECS9Lm3xYOqqQtfDx811Pf8vDY5Jk5RWwtuItbpRiXcQHN"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/blocks/create.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'usernameToBlock', 
    'skip_status' => '1'
);



/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=%23nyfw&count=10';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
/**echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(); **/

$string = json_decode ($twitter->setGetfield($getfield)
                       ->buildOauth($url, $requestMethod)
                       ->performRequest(), $assoc = TRUE);

foreach($string['statuses'] as $items)
    {
          $tweetText = $items['text'];
          $date =$items['created_at'];
        $users = $items['user'];
echo "<div class='twitterfeed'>";
        echo "<img class='avatar' src='" .$users['profile_image_url']. "'></img><p class='tweet'><div class='username'>" .$users['name']. "</div> @" .$users['screen_name']. ": </p>";
        echo "<div class='tweetedtext'><p class='tweet actualttext'>" .$tweetText . "</p></div>";
        echo "<p class='time'>";
        echo $date = date("F j, Y, g:i a");
        echo "</p>";
        echo "</div>";
        
    }
echo '<script>pageReady();</script>';
    ?>
</div>
