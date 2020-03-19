<!-------------------------
Name: Victor Amaro
Section: Section 2
Instructor: Georgia Brown 
TA: Kartheek Chintalapati
Due: April 2017
Semester: Spring 2017
--------------------------->
<!DOCTYPE html> <!---------- Add a flight -->
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

    <p><b><a href="./assign9viewPassFlight.php">Select A Flight and View Passengers</a></b></p>  <!-- link to the page to select a flight and view passengers-->
    <p><b><a href="./assign9viewPassHistory.php">Select A Passenger and View History</a></b></p>  <!-- link to the page to select a passenger and view flight history--> 
    <p><b><a href="./assign9viewSeats.php">Views Seats</a></b></p>  <!-- link to the page to view a passengers seat-->
      
    <form align="center" action="" method="post"> <!-- Form to allow user to enter flight information to add-->
        <fieldset> 
            <legend>Add A Flight:</legend> 
                <p>
                    <label for="flight_Ori">Flight Origination:</label> <!-- get flight start -->
                    <input type="text" name="flightOri" id="flightOri">
                </p>
            
                <p>
                    <label for="flight_Des">Flight Destination:</label> <!-- get flight end -->
                    <input type="text" name="flightDes" id="flightDes">
                </p>
            
                <p>
                    <label for="_miles">Miles:</label>
                    <input type="text" name="miles" id="miles"> <!-- get flight miles -->
                </p>
            
                <input type="submit" value="Submit">        
        </fieldset>
    </form>
                
       <p align="center"><br> <!--Was flight added?-->
            <?php     
                if ($_SERVER['REQUEST_METHOD'] == POST) {
           
                    $dsn = 'mysql:host=******; dbname=******'; //connect to databse
                    $username = '*****';
                    $password = '*****';
                    $connection = new PDO($dsn,$username,$password);
           
                    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    try{
                        $sql = "INSERT INTO flight (origination,destination,miles) VALUES (:flightOri, :flightDes, :miles)";
                        $stmt = $connection->prepare($sql);  // create prepared statement
              
                        $stmt->bindParam(':flightOri', $_REQUEST['flightOri']); // bind parameters to statement
                        $stmt->bindParam(':flightDes', $_REQUEST['flightDes']);
                        $stmt->bindParam(':miles', $_REQUEST['miles']);
                
                        if ($stmt->execute()) { 
                            echo "Records inserted successfully.";
                        }
                    } catch(PDOException $e){
                        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                    }
                    $connection = null; //close connection
                }
            ?> 
        </p> 
</body>
</html>
