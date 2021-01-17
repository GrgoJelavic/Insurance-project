<?php
    $conn = mysqli_connect('localhost', 'root', '', 'Insurance');

    if(isset($_POST['deletePolicy'])){

        $id = $_POST['deletePolicy_id'];

        $sql = "DELETE FROM Policies WHERE id='$id'";

        $query_run = $conn->query($sql);

        if($query_run){
            echo '<script> alert("Policy Data Deleted); </script>';
            header('Location: policiesData.php');
        } else echo '<script> alert("Policy Data Is Not Deleted); </script>';   
    }   
?>