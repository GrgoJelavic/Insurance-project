<?php
    $conn = mysqli_connect('localhost', 'root', '', 'Insurance');

    if(isset($_POST['updatePolicy'])){
        
        $id = $_POST['updatePolicy_id'];

        $policyNumber = $_POST['policyNumber'];
        $policyType = $_POST['policyType'];
        $oib = $_POST['oib'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $sql = "UPDATE Policies SET numberPolicy='$policyNumber', typePolicy='$policyType', oib='$oib', startDate='$startDate', endDate='$endDate' WHERE id = '$id' ";

        var_dump($sql);

        $query_run = mysqli_query($conn, $sql);
        
        // NE RADI DOBRO ALERT?

        if($query_run){
            echo '<script> console.log("Policy Updated); </script>';
            header('Location: policiesData.php');
        } else echo '<script> alert("Policy Data Is Not Saved); </script>';   

    }

?>