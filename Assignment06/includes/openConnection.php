 <?php
    $dbHost = "****"; 
    $dbUser = "****";
    $dbPass = "****"; 
    $dbName = "****";
    
    //create connection
    $connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } 
?>  
