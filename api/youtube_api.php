<?php 
$API_key = 'AIzaSyDhDBKXH154YY04LKBOKeU89xfg8kLSK0M';
$channelID = 'UCF5n0aXIQ6WA2gHmMWCLGsg';
$maxResult = 30;

// Get videos from channel 
try {
    $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResult.'&key='.$API_key.'');
    if ($apiData) {
        $videoList = json_decode($apiData);
    } else {
        throw new Exception("Invalid API key or channel ID.");
    }
} catch (Exception $e) {
    $apiError = $e->getMessage();
}
