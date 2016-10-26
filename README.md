# TSP  (PHP)
TSP (Travelling salesman problem)

Task description (by Pedro Escudero from Tangelo.com):

Scenario:
You are a successful salesman working for a big company. You have 32 big accounts around the globe to visit on a periodic basis, and you have been assigned the project of saving money on your already dilated travel expense allowance. Given a list of your companies' GPS locations, write a script that will help you find the shortest path to visit all 32 places once." Input file specifications The input file will contain a listing of cities and coordinates in a tab-delimited file. The filename is named exactly "cities.txt" Your script will assume this file is located on the same directory where the script is executed. There are no additional spaces or lines at the begging or end of the file. The list will being in "Beijing", you must begin your route there.An example input file: Beijing    39.93    116.40 Vladivostok    43.8    131.54 Dakar    14.40    -17.28. Singapore    1.14    103.55. (...).  Script and Runtime Specifications. You must submit exactly file called "solve.php"  No framework shall be used. The maximum execution time is 15 minutes. Output. Your script's final (and only) output will be using any standard output function. Do not attempt to write to disk, only print to screen. The output must consist of a list of the 32 original cities provided in the input file "cities.txt". These 32 cities should be ordered in the exact order in which you will visit your friends. There must be only one city name (exact spelling) per line followed by a newline delimeter (\n) You will be judged on the total distance covered in your travels, the shorter the better. You cannot visit a city twice, and you must visit all cities. The schema for your output print should be: Example output print:
Beijing\nVladivostok\nDakar\nSingapore(...)




Solution (by sl_by):

Read txt file
Insert data to array
Start from Beijing.
In the loop search the shortiest path to the next City

P.S. Script written with condition: startPoint != endPoint and finish execute after less than one second.
