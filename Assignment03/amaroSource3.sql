/* Victor Amaro
   Section 2
   TA: Kartheek Chintalapati   
*/ 

/*1*/  USE z1747708; /* Use z1747708; */

	DROP TABLE IF EXISTS Instrument;
	DROP TABLE IF EXISTS Player;
	DROP TABLE IF EXISTS Plays;
	   
/*2a*/ 	CREATE TABLE Instrument(InsID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Type CHAR(15), MakerName CHAR(25), Year CHAR(4)); /* Create a table called instrument */
/*2b*/ 	CREATE TABLE Player(PlayerID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, PlayerLast VARCHAR(15), PlayerFirst VARCHAR(15), Salary DECIMAL(7,2)); /* Create a table called player */
/*2c*/ 	CREATE TABLE Plays(InsID INT, PlayerID INT, PRIMARY KEY(InsID, PlayerID), Rating CHAR(1)); /* Create a table called plays. */                                                                                              /* Create a table called plays. */
/*3*/  	INSERT INTO Instrument(InsID, Type, MakerName, Year) VALUES (123, 'Flute', 'Selmer', '2010'); /* Insert at least five records into each table. */
		INSERT INTO Instrument(InsID, Type, MakerName, Year) VALUES (124, 'Saxophone', 'Selmer', '2017');
		INSERT INTO Instrument(InsID, Type, MakerName, Year) VALUES (125, 'Trumpet', 'Bach', '2010');
		INSERT INTO Instrument(InsID, Type, MakerName, Year) VALUES (126, 'Trombone', 'Blessing', '2013');
		INSERT INTO Instrument(InsID, Type, MakerName, Year) VALUES (127, 'Bassoon', 'Yamaha', '2007');
	   
		INSERT INTO Player(PlayerID, PlayerLast, PlayerFirst, Salary) VALUES (12, 'Mendez', 'Alissa', 55000.50); /* Insert at least five records into each table. */
		INSERT INTO Player(PlayerID, PlayerLast, PlayerFirst, Salary) VALUES (13, 'Amaro', 'Victor', 60000.75);
		INSERT INTO Player(PlayerID, PlayerLast, PlayerFirst, Salary) VALUES (14, 'Chavez', 'Angel', 10000.00);
		INSERT INTO Player(PlayerID, PlayerLast, PlayerFirst, Salary) VALUES (15, 'Reyes', 'Jazmine', 45000.90);
		INSERT INTO Player(PlayerID, PlayerLast, PlayerFirst, Salary) VALUES (16, 'Liska', 'Luke', 45986.20);

		INSERT INTO Plays(InsID, PlayerID, Rating) VALUES (123, 12, 'A'); /* Insert at least five records into each table. */
		INSERT INTO Plays(InsID, PlayerID, Rating) VALUES (124, 13, 'A');
		INSERT INTO Plays(InsID, PlayerID, Rating) VALUES (125, 14, 'D');
		INSERT INTO Plays(InsID, PlayerID, Rating) VALUES (126, 15, 'B');
		INSERT INTO Plays(InsID, PlayerID, Rating) VALUES (127, 16, 'C');
	   
/*4*/  	SELECT * FROM Instrument; /* Do a select statement on each table to show all the rows. */
	    SELECT * FROM Player;
	    SELECT * FROM Plays;
/*5*/  	ALTER TABLE Player ADD StartDate CHAR(4); /* Add an attribute start-date to the player table. */ 
		UPDATE Player SET StartDate = '2010'; /* Set it to 2010 for every player. */
/*6*/  	SELECT * FROM Player; /* Do a select on that table to show all of the rows. */
/*7*/  	UPDATE Player SET StartDate = '2015' WHERE PlayerID = 12 OR PlayerID = 13; /* Change the start-date to 2015 for 2 of the rows in the player table. */
/*8*/  	SELECT * FROM Player; /* Do a select on that table to show all of the rows. */
/*9*/  	DELETE FROM Player WHERE PlayerID = 14; /* Remove one of the rows from one of your tables. */
/*10*/ 	SELECT * FROM Player; /* Do a select on that table to show all of the rows. */
/*11*/ 	DESCRIBE Instrument; /* Describe each of the tables. */
	    DESCRIBE Player;
	    DESCRIBE Plays;
