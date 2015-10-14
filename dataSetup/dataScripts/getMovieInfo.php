 <?php

    include("path/to/tmdb-api.php");
    $apikey = "ENTER API KEY HERE";
    $tmdb = new TMDB($apikey, 'en', true);
    
    # Specify genre for missing film file
    $genre = "Enter Genre Here";
    
    # Array for movie titles
    $titles = [
    ];


    function appendFile($fileName, $line) {
    
        $file = $fileName;
        $current = file_get_contents($file);
        $current .= $line;
        file_put_contents($file, $current);
    }

    for ($i = 1; $i <= count($titles); $i++) {
    
        # TMDB limits the number of requests per 10 seconds
        sleep(2); 

        $title = $titles[$i];
        $movies = $tmdb->searchMovie($title);

        if ($movies) {

            $topResult = true;

            foreach ((array)$movies as $movie) {
                 
                if ($topResult) {

                    $ID = $movie->getID();

                    # Missing movie information is entered as a blank line
                    $poster = $movie->getPoster();
                    $trailer = $tmdb->getMovie($ID)->getTrailer();
                    $rating = $movie->getVoteAverage();

                    if ($poster) {
                        $moviePoster = $tmdb->getImageURL('w185') . $poster;
                    } else {
                        $moviePoster = "";
                    }

                    if ($trailer) {
                        $movieTrailer = "https://www.youtube.com/watch?v=" . $trailer;
                    } else {
                        $movieTrailer = "";
                    }

                    if ($rating) {
                        $movieRating = $rating;
                    } else {
                        $movieRating = "";
                    }
                   
                    # Files where movie information are stored
                    $files = [
                        0 => "trailerURLs.txt",
                        1 => "pictureURLs.txt",
                        2 => "ratings.txt",
                    ];

                    # Check that movie information corresponds to correct file
                    $movieInfo = [
                        0 => $movieTrailer,
                        1 => $moviePoster,
                        2 => $movieRating, 
                    ];

                    # Append movie information to files where information is stored
                    for ($j = 0; $j < count($files); $j++) {

                        $fileName = $files[$j];
                        $line =  $movieInfo[$j] . "\n";
                        appendFile($fileName, $line);
                    }

                    $topResult = false;
                    break;
                } 
            }
        } else {
            
            $missingFilmFile = "Missing-Films-" . $genre . ".txt";
            
            # Movies that yield no results write a blank line to all files
            $moviePoster = "\n";
            $movieTrailer = "\n";
            $movieRating = "\n";
            $title = $title . "\n";

            $files = [
                0 => "trailerURLs.txt",
                1 => "pictureURLs.txt",
                2 => "ratings.txt",
                3 => $missingFilmFile,
            ];

            $movieInfo = [
                0 => $movieTrailer,
                1 => $moviePoster,
                2 => $movieRating, 
                3 => $title,
            ];

            for ($j = 0; $j < count($files); $j++) {

                $fileName = $files[$j];
                $line =  $movieInfo[$j];
                appendFile($fileName, $line);
            }
            
        }
    }
?>
