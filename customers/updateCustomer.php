<?php
    $conn = mysqli_connect('localhost', 'root', '', 'Insurance');

    if(isset($_POST['updateCustomer'])){
        
        $id = $_POST['update_id'];

        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $oib = $_POST['oib'];
        $city = $_POST['city'];

        // $sql = "UPDATE `Customers` SET `oib` = '$oib', `firstName` = '$fName', `lastName` = '$lName' WHERE `Customers`.`id` = '$id'";

        $sql = "UPDATE Customers SET firstName='$fName', lastName='$lName', city='$city', oib='$oib' WHERE id = '$id' ";

        var_dump($sql);

        $query_run = $conn->query($sql);
        
        if($query_run){
            echo '<script> alert("Customer Updated); </script>';
            header('Location: customersData.php');
        } else echo '<script> alert("Customer Data Is Not Saved); </script>';   

    }

?>