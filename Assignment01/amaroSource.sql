/*	Victor Amaro
	Section 2
   	TA: Kartheek Chintalapati   
*/   

DESCRIBE BabyName; /* show the tables and the structure of the tables */
SELECT * FROM BabyName WHERE name = 'Victor' LIMIT 25; /* years where my name is on the list */
SELECT * FROM BabyName WHERE year = '1995' LIMIT 25; /* all the names for my birth year */
SELECT * FROM BabyName WHERE name LIKE 'Vic%%%' ORDER BY name ASC,count ASC,year ASC LIMIT 25; /* information about name similar to my name in alphabetic order of the name and within that of the count and then year */
SELECT COUNT(*) FROM BabyName; /* how many rows are in the table */
SELECT COUNT(name) FROM BabyName WHERE year = '1995'; /* tell how many names are from my birth year */
SELECT (name) FROM BabyName WHERE year = '1995' AND name LIKE 'V%%%%%' LIMIT 25; /* all the names from my birth year that start with the same letter as my name */
SELECT COUNT(name) FROM BabyName WHERE year = '1966'; /* list the number of names for each sex from your mother's birth year */
