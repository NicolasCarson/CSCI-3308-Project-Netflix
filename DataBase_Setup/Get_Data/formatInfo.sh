#!/bin/bash

inputFile=$1

if [ $# -eq 0 ]
then
    echo "Usage: ./formatInfo.sh filename.txt"
    exit 1
fi
# Cannot sed inplace with stdin, hence the strange workaround with the tmpFile
cp $inputFile tmpFile.txt

# Remove any blank lines
sed -i '' '/^$/d' tmpFile.txt

# Remove netflix add dates
# Not the best way to do this but I couldnt get (a|b) to work :(
sed -i '' '/^Aug [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^Sep [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^Oct [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^Nov [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^Dec [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^Jan [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^Feb [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^Mar [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^Apr [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^May [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^Jun [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt
sed -i '' '/^Jul [0-9]\{2\}, [0-9]\{4\}$/d' tmpFile.txt


# Seperate the text file into its indiviudal components
# TEXT FILE FORMAT:
#       Title and additional info
#       Description
#       director and additional info

i=0
while read line; do

    (( i++ ))

    if [ $i -eq 1 ] 
    then
        echo "$line" >> titles.txt

    elif [ $i -eq 2 ]
    then
        echo "$line" >> descriptions.txt
    
    # Third line contains useless info, restart loop
    else
        (( i = 0))
    fi

done <tmpFile.txt

# Remove useless info from title line
sed -i '' 's/ [0-9]\{4\}.*//' titles.txt

# Clean up
rm tmpFile.txt

     
