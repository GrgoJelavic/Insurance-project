<?php
    $conn = mysqli_connect("localhost", "root", "", "Insurance");

    if(isset($_POST['insertPolicy'])){

        $idCustomer = $_POST['idCustomer'];
        $idType = $_POST['idType'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $price = $_POST['price'];

        $sql = "INSERT INTO Policies (`idCustomer`,`idType`, `startDate`,`endDate`, `price`)
                VALUES ( '$idCustomer', '$idType','$startDate', '$endDate', '$price')";

        $query_run = $conn->query($sql);

        if($query_run){
            echo '<script> alert("Policy Saved); </script>';
            header('Location: policiesData.php');
        } else echo '<script> alert("Policy Data Is Not Saved); </script>';      
    }
?>