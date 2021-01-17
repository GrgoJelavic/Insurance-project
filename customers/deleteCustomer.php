<?php
    $conn = mysqli_connect('localhost', 'root', '', 'Insurance');

    if(isset($_POST['deleteCustomer'])){

        $id = $_POST['delete_id'];

        $sql = "DELETE FROM Customers WHERE id='$id'";

        $query_run = $conn->query($sql);

        if($query_run){
            echo '<script> alert("Customer Data Deleted); </script>';
            header('Location: customersData.php');
        } else echo '<script> alert("Customer Data Is Not Deleted); </script>';   
 
    }
    

?>

        <!-- $('#dataTableID').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
              [10, 25, 50, -1],
              [10, 25, 50, "All"]
            ],
            responsive = false;
            language = {
              search: "_INPUT_",
              searchPlaceholder: "Searchr records";
            }

        })
    }); -->