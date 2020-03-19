<!-------------------------
Name: Victor Amaro
Section: Section 2
Instructor: Georgia Brown 
TA: Kartheek Chintalapati
Due: April 2017
Semester: Spring 2017
--------------------------->
<!DOCTYPE html> <!---------- View a passengers seat numbers on flights -->
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

    <p><b><a href="./assign9viewPassFlight.php">Select A Flight and View Passengers</a></b></p>  <!-- link to the page to select a passenger and view flight history-->
    <p><b><a href="./assign9viewPassHistory.php">Select A Passenger and View History</a></b></p>  <!-- link to the page to select a passenger and view flight history-->
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
    
        <form align="center" action="" method="post"> <!-- Form to display all the passengers' seats in a drop-down list, allowing user to pick a person and see their seat num-->
            <fieldset> 
                <legend>Flight Information</legend> 
                    <?php
                        $sqlRequest = "SELECT passnum, firstName, lastName FROM passenger ORDER BY passnum"; //Select all passengers
                        $result = $connection->query($sqlRequest);
                        echo "Select a passenger:". "<br>";
                        echo "<Select name='seatnum'>";
                        while ($row = $result->fetch_assoc()) { //fill dropdown list with passengers
                            echo "<option value='". $row['passnum']. "'>". $row['passnum']. ": ". $row['firstName']. " ". $row['lastName']. "</option>";
                        }
                        echo '</select>'; 
            
                        echo '<br>'. '<br>'; 
            
                        echo '<input type="Submit" name="Submit" value="Submit">';  //submit button     
                echo '</fieldset>';
        echo '</form>';
                    ?>
      
        <p align="center">Seat belongs to: <br> <!--list all the passengers on the lfight selected-->
            <?php    
                if ($_SERVER['REQUEST_METHOD'] == POST) {
                    $own = $_POST['seatnum'];
                    $sql = "SELECT passenger.firstName, passenger.lastName, manifest.seatnum, flight.origination, flight.destination FROM passenger, flight, manifest 
                    WHERE passenger.passnum = manifest.passnum AND manifest.passnum = '".$own."'"; //find the seat num for that passenger, based of the passnum selected in the dropdown list
                    
                    foreach($connection->query($sql) as $row ) { //list passenger fname, lname, seatnum, and flight
                        echo $row['firstName']. " ". $row['lastName']. " has seat ". $row['seatnum']. " on flight ". $row['origination']. " to ". $row['destination'];
                        echo '<br>';
                    }
                } 
            
				include "includes/closeConnection.php";
			?>
        </p>
</body>
</html>
