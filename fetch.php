<?php
//fetch.php
if(isset($_POST["query"]))
{
 $connect = mysqli_connect("localhost", "root", "", "Insurance");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
    SELECT * FROM Customers 
    WHERE firstName LIKE '%".$request."%' 
    OR lastName LIKE '%".$request."%' 
    OR oib LIKE '%".$request."%'
    OR city LIKE '%".$request."%'
 ";
 $result = mysqli_query($connect, $query);
 $data =array();
 $html = '';
 $html .= '
  <table class="table table-bordered table-striped">
   <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>OIB</th>
    <th>city</th>
   </tr>
  ';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["fName"];
   $data[] = $row["lName"];
   $data[] = $row["oib"];
    $data[] = $row["city"];

   $html .= '
   <tr>
    <td>'.$row["firstName"].'</td>
    <td>'.$row["lastName"].'</td>
    <td>'.$row["oib"].'</td>
    <td>'.$row["city"].'</td>

   </tr>
   ';
  }
 }
 else
 {
  $data = 'No Data Found';
  $html .= '
   <tr>
    <td colspan="3">No Data Found</td>
   </tr>
   ';
 }
 $html .= '</table>';
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>