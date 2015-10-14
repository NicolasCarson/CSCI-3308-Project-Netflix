#**Data Setup**
##dataScripts
  + [formatInfo.sh](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/formatInfo.sh) - parses info from instawatchers.com into titles and descriptions
  + [getMovieInfo.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/getMovieInfo.php) - uses TMDB API to fetch trailer URL, poster URL, average rating
    + **NOTE:** Modified code based on [pixelead0's](https://github.com/pixelead0) [tmdb_v3-php-api-](https://github.com/pixelead0/tmdb_v3-PHP-API-)  

##formatInfo.sh
1. Introduction
  * [formatInfo.sh](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/formatInfo.sh) - Reads raw text file containing information from instawatchers.com and creates 2 output files
    1. **Titles.txt** - contains all film titles
    2. **Descriptions.txt** - contains all film descriptions

2. Usage

   Create a text file containing all film information from instawatchers.com. Execute formatInfo.sh with the text file as an argument.

3. Output

   *Titles.txt* contains all film titles  
   *Descriptions.txt* contains all film descriptions.
   
   **Films are linked via line number**  
   + Line 1 of *Titles.txt* and line 1 of *Descriptions.txt* refer to the same film.

##getMovieInfo.php
1. Introduction
  *  [getMovieInfo.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/getMovieInfo.php) - Uses [TMDB API](https://www.themoviedb.org/?language=en) to gather information about films. Uses film title as keyword for query.

2. Usage

   Program is based on [pixelead0's](https://github.com/pixelead0) [tmdb_v3-php-api-](https://github.com/pixelead0/tmdb_v3-PHP-API-). 

   Must have [TMDB](https://www.themoviedb.org/?language=en) API_KEY to establish a connection.

   within [getMovieInfo.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/getMovieInfo.php) include the path to [modified_tmdb_v3-php-api](https://github.com/Clacious/CSCI_3308_Project_Netflix/tree/master/dataSetup/modified_tmdb-php-api), as well as a TMDB API_KEY. 

   Create 4 files to store results.
   + *trailerURLs.txt*
   + *posterURLs.txt*
   + *ratings.txt*
   + *Missing-Films-"Genre".txt*

   Give others write permissions for each file.

   Array of film titles is used to gather information about each film.

   Specify Genre of films to create "Missing-Films" text file.


3. Output

   All trailer URLs are added to *trailerURLs.txt*  
   All poster URLs are added to *posterURLs.txt*  
   All film ratings are added to *ratings.txt*   
   
   Any film that yeilds no results add a blank line to each file, preserving the relationship between files. Additionally the title of the film is added to the "Missing-Films" file

    **Files are linked via line**

    Line 1 of each file refers to first entry in the title_array (titles.txt)
