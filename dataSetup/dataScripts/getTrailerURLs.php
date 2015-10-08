<?php

set_include_path("./path/to/google-api-php-client/src"); 
require_once 'Google/autoload.php';
require_once 'Google/Client.php';
require_once 'Google/Service/YouTube.php';

/*
* Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
* Google Developers Console <https://console.developers.google.com/>
* Please ensure that you have enabled the YouTube Data API for your project.
*/
$DEVELOPER_KEY = 'Replace with developer_key from google_dev console';

$client = new Google_Client();
$client->setDeveloperKey($DEVELOPER_KEY);

// Define an object that will be used to make all API requests.
$youtube = new Google_Service_YouTube($client);

$titles_array = [
    // Array for search keywords
];

$array_length = count($titles_array);

for ($i = 0; $i < $array_length; $i++) {
    // Call the search.list method to retrieve results matching the specified
    // query term.
    $searchResponse = $youtube->search->listSearch('id,snippet', array(
      'q' => $titles_array[$i],
      'maxResults' => 1,
    ));
    
    $videos = '';
    $channels = '';
    $playlists = '';

    // Searches that yeild no results are treated as blank lines
    if (count($searchResponse) == 0) {
          $file = 'trailerURLs.txt';
          $current = file_get_contents($file);
          $current .= " \n";
          file_put_contents($file, $current);
    
    } else {
        // Get video ID and build URL
        foreach ($searchResponse['items'] as $searchResult) {
          switch ($searchResult['id']['kind']) {
            case 'youtube#video':
              $videoID = sprintf('%s', $searchResult['id']['videoId']);
              $file = 'trailerURLs.txt';
              $current = file_get_contents($file);
              $current .= "https://www.youtube.com/watch?v=" . $videoID . "\n";
              file_put_contents($file, $current);
              break;
          }
        }
    }
}
echo "DONE";
?>
