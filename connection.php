
<?php
    //DB
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Insurance";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
   // Check connection
    if($conn === false) die("ERROR: Could not connect. " . mysqli_connect_error());

    include 'content/CreateDb';
?>
