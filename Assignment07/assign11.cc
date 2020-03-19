/********************************************
Name: Victor Amaro
Section: Section 2
Instructor: Georgia Brown 
TA: Kartheek Chintalapati
Due: April 2017
Semester: Spring 2017
Use: Pulls flight information for a database,
    then lists the passengers on that flight.
/*******************************************/
#include <iostream>
#include <sstream>
#include <cstdlib>
#include <iomanip>
#include <mysql.h>
using std::cout; using std::cerr;
using std::setw; using std::endl;
using std::ostringstream;

#define SERVER "***"
#define USER "***"
#define PASSWORD "***"
#define DATABASE "***"

int main() {
	MYSQL *connection, mysql;
	connection = mysql_init(&mysql); //initialize instance
	
	connection = mysql_real_connect(connection, SERVER, USER, PASSWORD, DATABASE, 0, NULL, 0); 
    
	if(connection) { //if connected successfully
		MYSQL_RES *returnValFlight; //pointer to receive the return value
		MYSQL_ROW rowFlight; //variable for rows 
		
		mysql_query(connection ,"SELECT * FROM flight;"); //Pull all the flights (flightnum, origination, destination, miles)
		returnValFlight = mysql_store_result(connection); //returnVal is a temporary file for the results of the query, a cursor
        
        MYSQL_RES *returnValPassenger; //pointer to receive the return value
		MYSQL_ROW rowPassenger; //variable for rows 
		      
        cout << endl 
			<< "Flight Number:     Flight Origination:     Flight Destination:     Miles:" << endl //Flight header
            << "--------------------------------------------------------------------------" << endl;
        
		while ((rowFlight = mysql_fetch_row(returnValFlight)) != NULL) {   //while not end of the cursor     
            cout << setw(7) << rowFlight[0] << setw(24) << rowFlight[1] << setw(22) << rowFlight[2] << setw(18) << rowFlight[3] << endl << endl;  //print flight info (flightnum, origination, destination, miles))
            
            ostringstream os;
            
            os << "SELECT firstName, lastName FROM passenger, manifest WHERE passenger.passnum = manifest.passnum AND manifest.flightnum =" << rowFlight[0]; //pull all passengers on that flight
            
            mysql_query(connection, os.str().c_str());
            returnValPassenger = mysql_store_result(connection); //returnVal is a temporary file for the results of the query, a cursor
            
            cout << setw(50) << "List Of Passengers On Flight Number " << rowFlight[0] << endl //current flight number
                << setw(50) << "Total Passengers -> " << mysql_num_rows(returnValPassenger) << endl << endl; //how mnay passengers on that flight?
                        
            while ((rowPassenger = mysql_fetch_row(returnValPassenger)) != NULL)  //while not end of the cursor     
                cout << setw(35) << rowPassenger[0] << " " << rowPassenger[1] << endl; //print passengers on that flight
            
            cout << endl << "***************************************************************************" << endl << endl;
        }
	
        mysql_free_result(returnValPassenger);
		mysql_free_result(returnValFlight);
        mysql_close(connection); //close connection
	}
	else //connection failed
		cerr << "Connection Failed!" << endl;
	
	return 0;
}
