Some programs to help gather and parse information for the database

formatInfo.sh:
    instawatchers.com has list of current netflix conent, orginized by genre.
    Create a text file by copying and pasting movie information.

    Output creates 2 files:
        titles.txt, consisting of all movie titles
        descriptions.txt, consisting of all movie descriptions
        titles and descriptions are linked via line number. (line 1 of descriptions.txt describes the title at line 1 of titles.txt)

getTrailers.php:
    Uses youtube API to search by keyword and build youtube URL.

    SETUP:
        To run the program user must have a google_id and create a project in the google_dev console.
        Youtube API V3 must be enabled and the google-api-php-client library must be installed.
        Program requires unique DEVELOPER_KEY and path to google-api library.

        Must create a file trailerURLs.txt, and give others write permissions.

    USAGE:
        Program loops through an array of search keywords, fetches the videoID, builds URL and writes output to trailerURLs.txt.
        Searches that yeild no results correspond to blank lines in trailerURLs.txt.

        Array must be in format:
        $array [
            0 => "Keywords for item 0",
            1 => "Keywords for item 1",
            .
            .
            n => "keywords for item n",
        ]

        adding "official trailer" to each title in  titles.txt (created from formatInfo.sh) will yeild best results.
        (Recommend using vim macro)

        Can be run through local host if LAMP/WAMP/MAMP/XAMP webserver is installed and running

    OUTPUT: 
        Creates trailerURLs.txt with full youtube video URLs.

    NOTE:
        Results are always appended to the end of the file. To start a clean run first delete contents of trailerURLs.txt
