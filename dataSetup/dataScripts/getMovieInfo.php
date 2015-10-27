 <?php

    include("/path/to/tmdb-api.php");
    $apikey = "TMDB API-KEY";
    $tmdb = new TMDB($apikey, 'en', true);
    
    # Specify genre for missing film file
    $genre = "Enter Genre Here";
    $file = $genre . "-Film-Info.csv";

    function appendFile($fileName, $line) {
    
        $file = $fileName;
        $current = file_get_contents($file);
        $current .= $line;
        file_put_contents($file, $current);
    }
    
    $titles = fopen($argv[1], "r");
    $descriptions= fopen($argv[2], "r");

    if ($titles && $descriptions) { 

        while (($title = fgets($titles)) !== false && ($description = fgets($descriptions)) !== false) {

            # TMDB limits the number of requests per 10 seconds
            sleep(2); 

            # Reomve newline chars from title and description
            $title = trim($title);
            $description = trim($description);

            $movies = $tmdb->searchMovie($title);
            
            # Films that yeild no results are not added to the file
            if ($movies) {

                $topResult = true;

                foreach ((array)$movies as $movie) {
                     
                    if ($topResult) {

                        $ID = $movie->getID();
                        $poster= $movie->getPoster();
                        $trailer = $tmdb->getMovie($ID)->getTrailer();
                        $rating = $movie->getVoteAverage();

                        if ($poster) {
                            $filmPoster = $tmdb->getImageURL('w185') . $poster;
                        } else {
                            $filmPoster = " ";
                        }

                        if ($trailer) {
                            $filmTrailer = "https://www.youtube.com/watch?v=" . $trailer;
                        } else {
                            $filmTrailer = " ";
                        }

                        if ($rating) {
                            $filmRating = $rating;
                        } else {
                            $filmRating = " ";
                        }

                        $line = "\"$title\", \"$filmTrailer\", \"$filmPoster\", \"$filmRating\", \"$description\" \n";
                        appendFile($file, $line);

                        $topResult = false;
                        break;
                    } 
                }
            } 
        }
    } 

    fclose($titles);
    fclose($descriptions);
?>
