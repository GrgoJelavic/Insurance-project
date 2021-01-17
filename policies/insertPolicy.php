<?php
    $conn = mysqli_connect("localhost", "root", "", "Insurance");

    if(isset($_POST['insertPolicy'])){

        $policyNumber = $_POST['policyNumber'];
        $policyType = $_POST['policyType'];
        $oib = $_POST['oib'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $sql = "INSERT INTO Policies (`numberPolicy`,`typePolicy`, `oib`,`startDate`,`endDate`)
                VALUES ('$policyNumber', '$policyType', '$oib', '$startDate', '$endDate')";

        $query_run = $conn->query($sql);

        if($query_run){
            echo '<script> alert("Policy Saved); </script>';
            header('Location: policiesData.php');
        } else echo '<script> alert("Policy Data Is Not Saved); </script>';      
    }
?>