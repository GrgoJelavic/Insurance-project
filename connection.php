
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


    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS Insurance";
    $conn->query($sql);
    // Create connection with DB
    $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Create table Customers
        $sql = "CREATE TABLE IF NOT EXISTS Customers (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                oib INT(11) NOT NULL UNIQUE,
                firstName VARCHAR(30) NOT NULL,
                lastName VARCHAR(30) NOT NULL,
                city VARCHAR(50) NOT NULL
                )ENGINE=InnoDB DEFAULT CHARSET=utf8";
        $conn->query($sql);

        // Create table Types of Insurance       
        $sql = "CREATE TABLE IF NOT EXISTS Types (
                idType INT(11) NOT NULL PRIMARY KEY,
                typeInsurance VARCHAR(30) NOT NULL
                )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $conn->query($sql); 
        // Insert data into Types 
        $sql = "INSERT INTO Types (idType, typeInsurance) VALUES (1, 'Life Insurance Insurance') , (3, 'Car Insurance'), (4, 'Boat Insurance'), (5, 'Health Insurance'), (6, 'Travel Insurance'), (7, 'Marine Insurance'), (8, 'Guarantee Insurance'), (9, 'Fire Insurance'), (10, 'Adventure Insurance');";
        $conn->query($sql);

        // Create table Policies       
        $sql = "CREATE TABLE IF NOT EXISTS Policies (
                idPolicy INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                idCustomer INT(11) NOT NULL,
                idType INT(11) NOT NULL,
                startDate DATE NOT NULL,
                endDate DATE NOT NULL,
                price DECIMAL(9,2) NOT NULL,
                FOREIGN KEY (idCustomer) REFERENCES Customers(id),
                FOREIGN KEY (idType) REFERENCES Types(idType)
                )ENGINE=InnoDB DEFAULT CHARSET=utf8";
        $conn->query($sql);     


        $conn->close();

?>
