#Load_Data   


Contains programs needed to insert film information into Netflix database


###Usage   

[loadData.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/DataBase_Setup/Load_Data/loadData.php) takes 2 command line arguments:
   1. File containing film information - *file created from [getFilmInfo.php](https://github.com/Clacious/CSCI_3308_Project_Netflix/blob/master/DataBase_Setup/Get_Data/getFilmInfo.php)*
   2. Genre   

#####Example   
php loadData Action-Adventure-Film-Info.txt "Action Adventure"   

#####Note:   
It is possible for multiple films belonging to the same genre to have identical titles (remakes etc..).
The database will not accept duplicate films, if this is the case the first film is inserted into the database while all subsequent films are added to an error log to be handled manually.
