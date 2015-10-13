NOTE: 
    getPictureURLs.php and getTrailerURLs.php should only be used as a last resort as they provide unreliable results.
    getPictureURLs.php uses Google's image search API to fetch the URL for the top result of a query.
    getTrailerURLs.php uses Youtube's search API to fetch the video ID for the top result of a query and contructs the youtube video URL.
    
    

    getMovieInfo.php uses the TMDB API to fetch information about a given film. Unfortunately TMDB does not have a well 
    established database and many films currently streaming on Netflix cannot be found using TMDB. To compensate for films 
    not found using TMDB's API, any missing films are added to a "missing-films" file. These films can be added manually if 
    a better method is not found.


-------------------------------------------------------------------------------------------------------
getMovieInfo.php
-------------------------------------------------------------------------------------------------------
    THIS CODE IS A MODIFIED VERSION OF PIXELEAD0'S tmdb_v3-php-api- PHP WRAPPER.

    ORIGINAL CODE CAN BE FOUND AT -> https://github.com/pixelead0/tmdb_v3-PHP-API- 
    
    Usage:
        A valid TMDB API key is needed to connect to TMDB.
        Must include path to tmdb-api-php found within modified_tmdb-php-api
        Enter genre to create  corresponding "Missing-" files
        Create array of movie titles to search TMDB database.

        Must create "Missing-" files and give others write permissions.
            Missing-Films-Genre.txt
            Missing-Trailers-Genre.txt
            Missing-Posters-Genre.txt
            Missing-Rating-Genre.txt

    Output:
        Any missing films or films with missing components will be added to its respective "Missing-" file
             Missing-Films-Genre.txt    -> stores titles of films not found in TMDB database
             Missing-Posters-Genre.txt  -> Stores titles of films with no poster
             Missing-Trailers-Genre.txt -> stores titles of films with no trailer
             Missing-Ratings-Genre.txt  -> stores titles of films with no rating

        Results are linked via line number. 
             Ex: line 1 of titles, line 1 of trailers, line 1 of posters, line 1 of ratings all refer to the same film.

        Films that are not found in the TMDB database are entered as a blank line in each output file.
-------------------------------------------------------------------------------------------------------
