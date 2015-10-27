# CSCI_3308_Project_Netflix
Website for generating Netflix content

csv2mysql.py Usage:
$ python csv2mysql.py test.csv --user=[root] --password=[3308] --host=[localhost] --table=[test] --database=[test]

Alternate csv2mysql.py usage:
 python csv2mysql.py -h
  usage: csv2mysql.py [-h] [--table TABLE] [--database DATABASE] [--user USER]
                      [--password PASSWORD] [--host HOST]
                      input_file

Automatically insert CSV contents into MySQL

positional arguments:
  input_file           The input CSV file

optional arguments:
  -h, --help           show this help message and exit
  --table TABLE        Set the name of the table. If not set the CSV filename
                       will be used
  --database DATABASE  Set the name of the database. If not set the test
                       database will be used
  --user USER          The MySQL login username
  --password PASSWORD  The MySQL login password
  --host HOST          The MySQL host

csv2mysql usage example: 
$ python csv2mysql.py --user=root --password=password --database=test --table=test test.csv
