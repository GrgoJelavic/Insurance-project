<?php
    $conn = mysqli_connect('localhost', 'root', '', 'Insurance');

    if(isset($_POST['updatePolicy'])){
            
        $id = $_POST['updatePolicy_id'];

        $policyType = $_POST['policyType'];
        $customerId = $_POST['customerId'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $price = $_POST('price');

        // $sql = "INSERT INTO Policies (`idType`, `idCustomer`,`startDate`,`endDate`, `price`)
        //         VALUES ($policyType', '$customerId', '$startDate', '$endDate', '$price')";

        $sql = "UPDATE Policies SET idType='$policyType', idCustomer='$CustomerId', startDate='$startDate', endDate='$endDate' price='$price' WHERE id = '$id' ";

        var_dump($sql);

        $query_run = mysqli_query($conn, $sql);
        

        if($query_run){
            echo '<script> console.log("Policy Updated); </script>';
            header('Location: policiesData.php');
        } else echo '<script> alert("Policy Data Is Not Saved); </script>';   

    }

?>