<!-------------------------
Name: Victor Amaro
Section: Section 2
Instructor: Georgia Brown 
TA: Kartheek Chintalapati
Due: April 2017
Semester: Spring 2017
--------------------------->
<!DOCTYPE html> <!---------- View a passengers flight history -->
<html>
    <head>
        <style>
            body { /*Set default text color used in body*/
                color: #ff8306;
            }
            a {
                color: black; 
            }
        </style> 
        <title>z1747708</title>
    </head>
<body bgcolor="#0a06ff"> <!-- Set default background color-->
    
    <p><b><a href="./assign9viewPassHistory.php">Select A Passenger and View History</a></b></p>  <!-- link to the page to select a passenger and view flight history-->
    <p><b><a href="./assign9viewSeats.php">Views Seats</a></b></p>  <!-- link to the page to view a passengers seat-->
    <p><b><a href="./assign9addFlight.php">Add A Flight</a></b></p>  <!-- link to the page to select a passenger and view flight history--> 

    <p align="center">List of all passengers: <br> 
        <?php     
            include "includes/openConnection.php";
        
            $sqlRequest = "SELECT firstName, lastName FROM passenger ORDER BY lastName"; //Select the passenger first namw and last, in alphabetic order of lastname
            $result = $connection->query($sqlRequest); //save result
    
            if($result->num_rows > 0) { //print out the names in alphabetic order of lastname in rows
                while($row = $result->fetch_assoc()) {
                    echo $row["firstName"]. " ". $row["lastName"]. "<br>";
                }
            }
        ?>
    </p>
 
    <form align="center" action="" method="post"> <!-- Form to display all the flights in a drop-down list, allowing user to pick a flight and see the passengers on it-->
        <fieldset> 
            <legend>Flight Information</legend> 
                <?php
                    $sqlRequest = "SELECT flightnum, origination, destination FROM flight";  //Select all flights
                    $result = $connection->query($sqlRequest); 
            
                    echo "Select a flight:". "<br>";
                    echo "<Select name='flight'>";
                    while ($row = $result->fetch_assoc()) { //fill drop-down list with flight numbers, origination, and destination
                        echo "<option value='". $row['flightnum']. "'>". $row['flightnum']. ": ". $row['origination']. " to ". $row['destination']. "</option>";
                    }
                    echo '</select>'; 
            
                    echo '<br>'. '<br>'; 
            
                    echo '<input type="Submit" name="Submit" value="Submit">';  //submit button     
        echo '</fieldset>';
    echo '</form>';
                ?>
      
        <p align="center">List of passengers on that flight: <br> <!--list all the passengers on the lfight selected-->
            <?php    
                if ($_SERVER['REQUEST_METHOD'] == POST) {
                    $own = $_POST['flight'];
                    $sql = "SELECT firstName, lastName FROM passenger, flight, manifest WHERE flight.flightnum = 
                    manifest.flightnum AND manifest.passnum = passenger.passnum AND flight.flightnum = '".$own."'"; // find the passengers on a flight based on flightnum picked in dropdown list
                    
                    foreach($connection->query($sql) as $row ) { //list all passengers on that flight
                        echo $row['firstName']. " ". $row['lastName'];
                        echo '<br>';
                    }
                }
				include "includes/closeConnection.php";
			?>     
        </p>
</body>
</html>