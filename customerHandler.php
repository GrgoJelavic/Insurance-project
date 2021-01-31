<?php

$conn = mysqli_connect("localhost", "root", "", "Insurance");

if (isset($_POST['id'])) {
    $id  = $_POST['id'];

    $sql = "SELECT * FROM Policies 
    INNER JOIN Customers ON Policies.idCustomer = Customers.id
    INNER JOIN Types ON	Policies.idType = Types.idType
    WHERE idCustomer = " . $_POST['id'];

    $result = $conn->query($sql);

    $dataArr = [];

    while ($row = $result->fetch_object())
        array_push($dataArr, $row);

    header('Content-Type: application/json');
    echo json_encode($dataArr);
}
