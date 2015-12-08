# Project Netflix

Website for generating Netflix content based on user preferences

# How To Use 

Select one or more genres on the homepage. Press submit to view recommended films(s).

![Select Genre(s)](https://github.com/MattUhlar/screenshots/blob/master/Homepage)

Recommended Films are displayed on results page

![Select Genre(s)](https://github.com/MattUhlar/screenshots/blob/master/Results_page)

# Website Link
[Project Netflix Link] (https://csci-3308-project-netflix-nicolas9101.c9.io)

# Video Demo

[Video Demo](https://www.youtube.com/watch?v=D-wpzfT2lAw&feature=youtu.be)

# Deployment Environment: Cloud9
[Project Netflix Cloud9 Project Link](https://ide.c9.io/nicolas9101/csci_3308_project_netflix)
Other than the 4 project authors only Liz Boese has access to the C9 development environment, the TA's could not be invited since their emails do not have Cloud9 Acconts associated with them yet, please contact us if the TA's need to be given access once they have created C9 Accounts, otherwise Liz's CU email account should already have access.
To Run the code, click Run in the top bar or Priview and then Live Privew to see the live preview of the site running on Cloud 9. Or else go directly to the [Project Netflix Link](https://csci-3308-project-netflix-nicolas9101.c9.io/) to see the site running

# Auto Generated Docs

[Auto Docs](https://github.com/Clacious/CSCI_3308_Project_Netflix/tree/master/docs)

# Auto Docs Readme.md
[Auto Docs Readme] (docs/Readme.md)

Describes how to build the auto generated docs. 


#Files Created
CSCI_3308_Porject_Netflix/
index.html
results.css
results.php
project.html

/docs/--Directory Generated using PHPDocumentor

/Testing/ loadData_test.php

/stylesheets/
index.css
results.css

/Database_Setup/Load_Data/datafiles
database.php
loadData.php

/Database_Setup/Get_Data/
parseData.sh
getFilmInfo.php

#Repo Organization
/DataBase_Setup -- Files for getting movie data from TMDB API as well as parsing it into the database
        /Get_Data --- Files for getting movie data from the TMDB api
        /Load_Data --- Files for parsing data and loading it into mysql database
        
/testing -- php testing file as well as pdf file with links to automated tests and expainations of how to rerun the automated tests if the test resuslts have expired. 

/docs -- folder containing auto documentation results generated using PHPDocumentor, run index.html to view results

/stylesheets -- contains files used to seperate html from css as well as control the layout of the site in results.css

/index.html -- html file for displaying the homepage

/results.php -- php file used to generate how the results retrived from the database are displayed on the site's result page

/project.html -- page display settings
