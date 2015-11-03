#**Data Setup**
##getData
  + [formatInfo.sh](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/formatInfo.sh) - parses info from instawatchers.com into titles and descriptions
  + [getMovieInfo.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/getMovieInfo.php) - uses TMDB API to fetch trailer URL, poster URL, average rating
    + **NOTE:** Modified code based on [pixelead0's](https://github.com/pixelead0) [tmdb_v3-php-api-](https://github.com/pixelead0/tmdb_v3-PHP-API-)  

##formatInfo.sh
1. Introduction
  * [formatInfo.sh](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/formatInfo.sh) - Reads raw text file containing information from instawatchers.com and creates 2 output files
    1. **Titles.txt** - contains all film titles
    2. **Descriptions.txt** - contains all film descriptions

2. Usage

   Create a text file containing all raw film information from instawatchers.com. Execute formatInfo.sh with the text file as an argument.

3. Output

   *Titles.txt* contains all film titles  
   *Descriptions.txt* contains all film descriptions.
   
   **Films are linked via line number**  
   + Line 1 of *Titles.txt* and line 1 of *Descriptions.txt* refer to the same film.

##getMovieInfo.php
1. Introduction
  *  [getMovieInfo.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/getMovieInfo.php) - Uses [TMDB API](https://www.themoviedb.org/?language=en) to gather information about films. Uses film title as keyword for query.

   Program is based on [pixelead0's](https://github.com/pixelead0) [tmdb_v3-php-api-](https://github.com/pixelead0/tmdb_v3-PHP-API-). 

   Must have [TMDB](https://www.themoviedb.org/?language=en) API_KEY to establish a connection.

   Within [getMovieInfo.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/getMovieInfo.php) include the path to [modified_tmdb_v3-php-api](https://github.com/Clacious/CSCI_3308_Project_Netflix/tree/master/dataSetup/modified_tmdb-php-api), as well as a TMDB API_KEY. 

2. Usage
     
   php getMovieInfo.php titles.txt descriptions.txt Genre

   Example:
      php getMovieInfo.php titles.txt descriptions.txt Drama

3. Output

   Creates text file [Genre]-Film-Info.txt

   Fields seperated by ;; 

##loadData.php
1. Introduction
  * [loadData.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/loadData.php) - Reads txt file created by *  [getMovieInfo.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/dataSetup/dataScripts/getMovieInfo.php) and enters data into the database.

2. Usage
   
   Must escape all ' characters with a backslash before running script. (vim :%s/'/\\\\'/g)
 
   php loadData Genre-FilmInfo.txt Genre

   Example:
      php loadData.php Drama-Film-Info.txt Drama

3. Output
   
   Inserts data into Netflix database.
