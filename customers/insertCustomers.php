<?php
    $conn = mysqli_connect("localhost", "root", "", "Insurance");

    if(isset($_POST['insertCustomer'])){

        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $oib = $_POST['oib'];
        $city = $_POST['city'];

        $sql = "INSERT INTO Customers (`firstName`,`lastName`,`oib`,`city`)
                VALUES ('$fName', '$lName', '$oib', '$city')";

        $query_run = $conn->query($sql);

        if($query_run){
            echo '<script> alert("Customer Saved); </script>';
            header('Location: customersData.php');
        } else echo '<script> alert("Customer Data Is Not Saved); </script>';      
    }
?>