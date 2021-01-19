<?php

$conn = mysqli_connect("localhost", "root", "", "Insurance");
if (isset($_POST['id'])) {
    $id  = $_POST['id'];



    // $sqlrr = "SELECT Policies.idPolicy, Types.idType, Types.typeInsurance, Policies.idCustomer, Customers.id, Customers.firstName, Customers.lastName, Policies.startDate, Policies.endDate, Policies.price";
    $sql = "SELECT * FROM Policies 
    INNER JOIN Customers ON Policies.idCustomer = Customers.id
    INNER JOIN Types ON	Policies.idType = Types.idType
    WHERE idCustomer = " . $_POST['id'];
    // $query_run = $conn->query($sql);

    $result = $conn->query($sql);

    $dataArr = [];
    while ($row = $result->fetch_object()) {

        array_push($dataArr, $row);
    }


    // $result = mysqli_query($conn, $sql);

    header('Content-Type: application/json');
    echo json_encode($dataArr);
}
