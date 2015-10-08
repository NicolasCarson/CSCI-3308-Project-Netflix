<?php

$search_array = [
    // Array of search keywords
];

function get_images($query){
    $url = 'http://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=';
    $url .= urlencode($query);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($curl);
    curl_close($curl);
    //decoding request
    $result = json_decode($data, true);
    
    return $result;
}

for ($i = 0; $i < count($search_array); $i++) {
    $images = get_images($search_array[$i]);


    // Top result URL
    $url =  $images['responseData']['results'][1]['url'];

    $file = 'pictureURLs.txt';
    $current = file_get_contents($file);
    $current .= $url . "\n";
    file_put_contents($file, $current);
}
echo "DONE";
?>
