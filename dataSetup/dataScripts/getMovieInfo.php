 <?php

    include("/path/to/tmdb-api-php");
    $apikey = "Enter API Key here";
    $tmdb = new TMDB($apikey, 'en', true);
    
    # Specify genre for error logs
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

    for ($i = 0; $i < count($titles); $i++) {

        # If search yields no results empty line is added to file
        if (!$tmdb->searchMovie($titles[$i])) {

            # Files where movie information are stored
            $files = [
                0 => "trailerURLs.txt",
                1 => "pictureURLs.txt",
                2 => "ratings.txt",
            ];

            for ($j = 0; $j < count($files); $j++) {

                $fileName = $files[$j];
                $line = "\n";
                appendFile($fileName, $line);
            }
                # Add missing film to missing film log
                $fileName = 'Missing-Films-' . $genre . '.txt';
                $line = $titles[$i] . "\n";
                appendFile($fileName, $line);

        } else {
            
            $movie = $tmdb->searchMovie($titles[$i]);
            $movieID =  $movie[0]->getID();

            $movieObject = $tmdb->getMovie($movieID);

            # getImageURL() argument is picture width
            if (!$movieObject->getPoster() || !$tmdb->getImageURL('w185')) {

                $moviePoster = "";
                $fileName = 'Missing-Posters-' . $genre . '.txt';
                $line = $titles[$i]. "\n";
                appendFile($fileName, $line);

            } else {
                $moviePoster = $tmdb->getImageURL('w185') . $movieObject->getPoster();
            }
            
            if (!$movieObject->getTrailer()){

                $movieTrailer = "";
                $fileName = 'Missing-Trailers-' . $genre . '.txt';
                $line = $titles[$i] . "\n";
                appendFile($fileName, $line);

            } else {
                $movieTrailer = "https://www.youtube.com/watch?v=" . $movieObject->getTrailer();
            }

            if (!$movieObject->getVoteAverage()){

                $movieRating = "";
                $fileName = 'Missing-Ratings-' . $genre . '.txt';
                $line = $titles[$i] . "\n";
                appendFile($fileName, $line);

            } else {
                $movieRating = $movieObject->getVoteAverage();
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
        }
    }
?>
