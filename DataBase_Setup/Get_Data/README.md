#Get_Data


Contains all programs needed to retrieve and parse film information for database



###parseInfo.sh   

Reads a raw text file of movie information from [instantwatcher.com](http://instantwatcher.com/) and outputs 2 files:   
   + **titles.txt** - *Contains all film titles*   
   + **descriptions.txt** - *Contains all film descriptions*


####Note
*Films are linked via line*   
+ line 1 of *titles.txt* and line 1 of *descriptions.txt* refer to the same film

###getFilmInfo.php   

Uses [TMDb API](https://www.themoviedb.org/documentation/api?language=en) to fetch:
   + *film trailer*   
   + *film poster*   
   + *film rating*   

####Note   
[modified-tmdb-php-api](https://github.com/Clacious/CSCI_3308_Project_Netflix/tree/master/DataBase_Setup/Get_Data/modified-tmdb-php-api) is a modified version of a PHP TMDb API wrapper created by
[pixelead0](https://github.com/pixelead0)   
+ [original PHP TMDB API wrapper](https://github.com/pixelead0/tmdb_v3-PHP-API-)

####Usage   
getFilmInfo.php takes 3 command line arguments:   
   1. *titles.txt* - file created from *parseInfo.sh* containing all film titles   
   2. *descriptions.txt* - file created from *parseInfo.sh* containing all fill descriptions   
   3. *Name of Output File*   

#####Example   
php getFilmInfo.php titles.txt descriptions.txt Drama   

####Output   
Creates a file *3rd\_argument*-Film-Info.txt  

#####Format of Output File   

title;;trailer\_url;;poster\_url;;rating;;description   

"*;;*" is used as a delimiter for insertion into the mysql database through [loadData.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/tree/master/DataBase_Setup/Load_Data)
