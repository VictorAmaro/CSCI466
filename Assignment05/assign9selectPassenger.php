<!-------------------------
Name: Victor Amaro
Section: Section 2
Instructor: Georgia Brown 
TA: Kartheek Chintalapati
Due: April 2017
Semester: Spring 2017
--------------------------->
 <?php
    $dbHost = "******"; 
    $dbUser = "******";
    $dbPass = "******"; 
    $dbName = "******";
    
    //create connection
    $connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } 
?> 

<!DOCTYPE html>
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

    <p><b><a href="./assign9.php">Select A Flight</a></b></p>  <!-- link to the page to select a flight and view passengers-->
    <p><b><a href="./assign9viewSeats.php">Views Seats</a></b></p>  <!-- link to the page to view a passengers seat-->
    
    <p align="center">List of all passengers: <br> 
        <?php    
            $sqlRequest = "SELECT firstName, lastName FROM passenger ORDER BY lastName"; //Select the passenger first namw and last, in alphabetic order of lastname
            $result = $connection->query($sqlRequest); //save result
    
            if($result->num_rows > 0) { //print out the names in alphabetic order of lastname in rows
                while($row = $result->fetch_assoc()) {
                    echo $row["firstName"]. " ". $row["lastName"]. "<br>";
                }
            }
        ?>
    </p> 
    
    <form align="center" action="" method="post"> <!-- Form to display all the passengers in a drop-down list, allowing user to pick a passenger and see their flight history-->
        <fieldset> 
            <legend>Passenger Information</legend> 
                <?php
                    $sqlRequest = "SELECT passnum, firstName, lastName FROM passenger ORDER BY passnum"; //Select all passengers
                    $result = $connection->query($sqlRequest);
                    echo "Select a passenger:". "<br>";
                    echo "<Select name='passenger'>";
                    while ($row = $result->fetch_assoc()) { //fill dropdown list with passengers
                        echo "<option value='". $row['passnum']. "'>". $row['passnum']. ": ". $row['firstName']. " ". $row['lastName']. "</option>";
                    }
                    echo '</select>'; 
            
                    echo '<br>'. '<br>'; 
            
                    echo '<input type="Submit" name="Submit" value="Submit">';           
        echo '</fieldset>';
    echo '</form>';
                ?>
     
       <p align="center">Flight history for that passenger:<br> <!--list all the passengers on the lfight selected-->
            <?php    
                if ($_SERVER['REQUEST_METHOD'] == POST) {
                    $own = $_POST['passenger'];
                    $sql = "SELECT flight.flightnum, flight.origination, flight.destination FROM flight, passenger, manifest 
                    WHERE passenger.passnum = manifest.passnum AND manifest.flightnum = flight.flightnum AND passenger.passnum = '".$own."'"; //find the passenger's flight bassed of the flightnum picked in dropdown list

                    foreach($connection->query($sql) as $row ) { //flight history
                        echo $row['flightnum']. ": ". $row['origination']. " to ". $row['destination'];
                        echo '<br>';
                    }
                } 
			?>
        </p> 
</body>
</html>
    
<?php 
    //close connection
    mysqli_close($connection);
?>
