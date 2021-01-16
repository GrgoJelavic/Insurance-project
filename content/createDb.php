<?php

   // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS Insurance";
    $conn->query($sql);
    // Create connection with DB
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Create table customers
    $sql = "CREATE TABLE IF NOT EXISTS Customers (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            oib INT(11) NOT NULL UNIQUE,
            firstName VARCHAR(30) NOT NULL,
            lastName VARCHAR(30) NOT NULL,
            city VARCHAR(50) NOT NULL
            )ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $conn->query($sql);


            // -- reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP //datum pocetka osigiranja ZA POLICY
    //$conn->close();

    
?>