<?php
include '../content/header.php';
include '../connection.php';
$conn = mysqli_connect("localhost", "root", "", "Insurance");

?>
            <nav>
                <a href="../index.php" class="link">HOME</a>
                <a href="#" class="link">POLICIES</a>
                <a href="../customers/customersData.php" class="link">CUSTOMERS</a>
            </nav>
        </div>
        <div class="heading">
            <h2>
                Welcome to the Insurance System
            </h2>
        </div>
    </header>


<main>
    <section>
<!-- Insert Customer Modal Form (Bootstrap)--------------------------------------------------------->
<div class="modal fade" id="addPolicyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CREATE NEW INSURANCE POLICY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="insertPolicy.php" method="POST">   
          <div class="modal-body">


            <div class="form-group">
                <label>Customer ID</label>
                <input type="number" min="0" value="0" name="idCustomer" class="form-control" placeholder="Enter Customer ID Number" required>
            </div>

            <div class="form-group">
                <label>Type of Insurance</label>
                <input type="number" min="0" value="0" name="idType" class="form-control" placeholder="Enter Type of Insurance" required>
            </div>

            <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="startDate" class="form-control" required>
            </div>

            <div class="form-group">
                <label>End Date</label>
                <input type="date" name="endDate" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Insurance Value</label>
                <input type="number" min="0" value="0" name="price" class="form-control" placeholder="Enter Price of the Insurance" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="insertPolicy" class="btn btn-primary">Save</button>
            </div>
    
          </div> 
        </form>
    </div>
  </div>
</div>

<!-- Update Customer Modal Form (Bootstrap)--------------------------------------->
<div class="modal fade" id="updatePolicyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT INSURANCE POLICY DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="updatePolicy.php" method="POST">   
          <div class="modal-body">
            <input type="hidden" name="updatePolicy_id" id="updatePolicy_id">

            <div class="form-group">
                <label>Type of Insurance ID</label>
                <input type="number" min="0" value="0" name="idType" id="idType" class="form-control" placeholder="Enter Type of Insurance" required>
            </div>


            <div class="form-group">
                <label>Customer ID</label>
                <input type="number" min="0" value="0" name="idCustomer" id="idCustomer" class="form-control" placeholder="Enter Customer ID Number" required>
            </div>


            <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="startDate" id="startDate" class="form-control" required>
            </div>

            <div class="form-group">
                <label>End Date</label>
                <input type="date" name="endDate" id="endDate" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Insurance Value</label>
                <input type="number" min="0" value="0" name="price" id="price" class="form-control" placeholder="Enter Price of the Insurance" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatePolicy" class="btn btn-primary">Save</button>
            </div>

          </div> 
        </form>
    </div>
  </div>
</div>

<!-- Delete Customer Modal Form (Bootstrap)---------------------------------------->
<div class="modal fade" id="deletePolicyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE POLICY DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="deletePolicy.php" method="POST">   
          <div class="modal-body">
            <input type="hidden" name="deletePolicy_id" id="deletePolicy_id">

              <h5>Are you sure want to Delete this Insurance Policy?</h5>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                <button type="submit" name="deletePolicy" class="btn btn-primary">YES</button>
            </div>
          </div> 
        </form>
    </div>
  </div>
</div>
        <div class="customers-container container">
            <div class="customers-inner">
                <div class="card">
                  <div class="card-body">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPolicyModal">
                        CREATE NEW INSURANCE POLICY
                      </button>
                  </div>
                </div>
  
                <div class="card">
                  <div class="card-body">
                  <?php
                    $conn = mysqli_connect("localhost", "root", "", "Insurance");
                    $sql = "SELECT Policies.idPolicy, Types.idType, Types.typeInsurance, Policies.idCustomer, Customers.firstName, Customers.lastName, Policies.startDate, Policies.endDate, Policies.price
                    FROM Policies 
                    INNER JOIN Customers ON Policies.idCustomer = Customers.id
                    INNER JOIN Types ON	Policies.idType = Types.idType
                    ";
                    $query_run = $conn->query($sql);
                  ?>
                    <table id="dataTableID" class="table table-danger table-bordered">
                      <thead>
                        <tr>
                              <th scope="col">No</th>

                            <th scope="col">Policy</th>
                            <th scope="col">Type</th>
                            <th scope="col">Insurance</th>
                            <th scope="col">Client</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Value</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                        </tr>
                      </thead>
                    <tbody>
                      <?php       
                        if($query_run) {
                          foreach($query_run as $key=>$row){
                      ?>
                        <tr>  
                          <td><?php echo $key + 1 ?></td>      
                          <td><?php echo $row['idPolicy']; ?></td>
                          <td><?php echo $row['idType'] ?></td>
                          <td><?php echo $row['typeInsurance'] ?></td>
                          <td><?php echo $row['idCustomer']?></td>
                          <td><?php echo $row['firstName'] ?></td>
                          <td><?php echo $row['lastName'] ?></td>
                          <td><?php echo $row['startDate']; ?></td>
                          <td><?php echo $row['endDate']; ?></td>
                          <td><?php echo $row['price']; ?></td>

                          <td>
                            <button type="button" class="btn btn-success updatePolicy">Update</button>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger deletePolicy">Delete</button>
                          </td>
                        </tr>
                        <?php
                            }
                          }else echo "No records!";
                          ?>
                        </tbody>
                    </table>
                  </div>
                </div>
          </div>
        </div>
    </section>  
</main>

<script  src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script  src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script>
//Update button
    $(document).ready(function(){

    $('.updatePolicy').on('click', function(){

        $('#updatePolicyModal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);
           
          $('#updatePolicy_id').val(data[0]);
          $('#idType').val(data[1]);
          // $('#typeInsurance').val(data[2]);
          $('#idCustomer').val(data[3]);
          // $('#firstName').val(data[4]);
          // $('#LastName').val(data[5])
          $('#startDate').val(data[6]);
          $('#endDate').val(data[7]);
          $('#price').val(data[8]);
    });
  });   
//Delete button
  $(document).ready(function(){

    $('.deletePolicy').on('click', function(){

        $('#deletePolicyModal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);
           
          $('#deletePolicy_id').val(data[0]);;
    });
  });
</script>

<?php
include '../content/footer.php';  
$conn->close();

?>