/* Victor Amaro
   Section 2
   TA: Kartheek Chintalapati   
*/  
	USE henrybooks;
/*1*/ SELECT AuthorLast,AuthorFirst FROM Author ORDER BY AuthorFirst; /* All the authors, first name and last name in alphabetic order of first name */
/*2*/ SELECT DISTINCT(City) from Publisher ORDER BY City; /* All the cities that have a publisher, list each city only once. */
/*3*/ SELECT COUNT(title) FROM Book; /* How many book titles are in the database */
/*4*/ SELECT SUM(OnHand),BranchName FROM Branch,Inventory WHERE Branch.BranchNum = Inventory.BranchNum GROUP BY BranchName; /* For each branch, list the branch name and the total number of books on hand. */
/*5*/ SELECT SUM(NumEmployees) FROM Branch; /* How many employees total work at Henry Books */
/*6*/ SELECT Title FROM Book,Author,Wrote WHERE Author.AuthorNum = Wrote.AuthorNum AND Wrote.BookCode = Book.BookCode AND AuthorFirst = 'Stephen' AND AuthorLast = 'King' ORDER BY Title; /* Titles of all of the books written by Stephen King. */
/*7*/ SELECT Title,Type,Price FROM Book WHERE PaperBack = 'Y'; /* Title, type and price for all books that are paperback. */
/*8*/ SELECT BranchName FROM Branch,Book,Inventory WHERE Branch.BranchNum = Inventory.BranchNum AND Book.BookCode = Inventory.BookCode AND OnHand > 10; /* Branch name for all branches that have at least one book that has at least 10 copies on hand. */
/*9*/ SELECT Title,AuthorFirst,AuthorLast FROM Book,Author,Wrote WHERE Author.AuthorNum = Wrote.AuthorNum AND Wrote.BookCode = Book.BookCode ORDER BY Title DESC; /*For each book, list the title, author first name and author last name. Print the list in reverse alphabetic order of the title. */
/*10*/ SELECT PublisherName,COUNT(Title) FROM Publisher,Book WHERE Publisher.PublisherCode = Book.PublisherCode GROUP BY PublisherName; /* Each publisher by name and how many books they published. */
/*11*/ SELECT COUNT(price) FROM Book WHERE Price < 10.0; /* How many books cost less than $10.00? */
/*12*/ SELECT AuthorLast FROM Author,Publisher,Book,Wrote WHERE Author.AuthorNum = Wrote.AuthorNum AND Wrote.BookCode = Book.BookCode AND Book.PublisherCode = Publisher.PublisherCode AND PublisherName = 'Simon and Schuster'; /* List the author last names for all the authors published by Simon and Schuster. */
/*13*/ SELECT Type,COUNT(Type) FROM Book Group BY Type; /* List each type of book and how many of each. */
/*14*/ SELECT BranchLocation,SUM(OnHand) FROM Branch,Inventory WHERE Branch.BranchNum = Inventory.BranchNum AND BranchLocation = 'Brentwood Mall'; /* How many books are on hand at the Brentwood Mall location? */
/*15*/ SELECT BranchLocation,NumEmployees,SUM(OnHand) FROM Branch,Inventory WHERE Branch.BranchNum = Inventory.BranchNum GROUP BY BranchLocation; /* Each branch location, the number of employees and the number of books on hand. */
/*16*/ SELECT Title FROM Book WHERE BookCode IN (SELECT BookCode FROM Wrote  WHERE Sequence = 1); /* List the titles of all books who have a Sequence number of 1 */
/*17*/ SELECT * FROM Publisher WHERE PublisherName LIKE 'T%'; /* All the publishers whose name starts with T. */
/*18*/ SELECT * FROM Author WHERE AuthorLast LIKE '%ll%' OR AuthorFirst LIKE '%ll%'; /* All of the Author information for all authors that have a double l in their name (ll). */
/*19*/ SELECT Title,BookCode FROM Book WHERE BookCode = '079X' OR  BookCode = '138X' OR BookCode = '669X'; /* All the book titles that have a book code of 079x, 138x or 669x. */
/*20*/ SELECT AuthorLast,Title,PublisherName FROM Author,Book,Wrote,Publisher WHERE Author.AuthorNum = Wrote.AuthorNum AND Wrote.BookCode = Book.BookCode AND Publisher.PublisherCode = Book.PublisherCode ORDER BY PublisherName; /* Each author last name, book title and publisher name, in alphabetic order of the publisher */

/*21*/ SELECT PublisherName,City,PublisherCode FROM Publisher WHERE PublisherName LIKE 'T%'; /* 17 */
/*21*/ SELECT CONCAT(AuthorLast,' ',AuthorFirst) AS AuthorName FROM Author ORDER BY AuthorFirst; /* 1 */

/*22*/ SELECT PublisherCode,PublisherName FROM Publisher WHERE City = 'New York' ORDER BY PublisherName; /*How many publishers are in a given city (In this case NewYork). */
