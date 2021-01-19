<?php
    $conn = mysqli_connect('localhost', 'root', '', 'Insurance');

    if(isset($_POST['updatePolicy'])){
            
        $id = $_POST['updatePolicy_id'];

        $idType = $_POST['idType'];
        $idCustomer = $_POST['idCustomer'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $price = $_POST['price'];


        $sql = "UPDATE `Policies` SET `idCustomer` = '$idCustomer', `idType` = '$idType', `startDate` = '$startDate', `endDate` = '$endDate', `price` = '$price' WHERE `Policies`.`idPolicy` = '$id';";


        var_dump($sql);

        $query_run = mysqli_query($conn, $sql);
        

        if($query_run){
            echo '<script> console.log("Policy Updated); </script>';
            header('Location: policiesData.php');
        } else echo '<script> alert("Policy Data Is Not Saved); </script>';   

    }

?>