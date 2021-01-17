<?php
    include '../content/header.php';    
    include '../connection.php';
?>
        <nav>
            <a href="../index.php" class="link">HOME</a>
            <a href="../policies/policiesData.php" class="link">POLICIES</a>
            <a href="#" class="link">CUSTOMERS</a>
        </nav>
    </div>
    <div class="heading">
        <h2>Welcome to the Insurance System</h2>
    </div>
</header>

<main>
    <section>
<!-- Insert Customer Modal Form (Bootstrap)--------------------------------------------------------->
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD CUSTOMER DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="insertCustomers.php" method="POST">   
          <div class="modal-body">

            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="fName" class="form-control" placeholder="Enter First Name" required>
            </div>

          <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lName" class="form-control" placeholder="Enter Last Name" required>
            </div>

            <div class="form-group">
                <label>Oib</label>
                <input type="text" name="oib" class="form-control" placeholder="Enter OIB" required>
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control" placeholder="Enter City" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="insertCustomer" class="btn btn-primary">Save</button>
            </div>
    
          </div> 
        </form>
    </div>
  </div>
</div>

<!-- Update Customer Modal Form (Bootstrap)--------------------------------------->
<div class="modal fade" id="updateCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT CUSTOMER DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="updateCustomer.php" method="POST">   
          <div class="modal-body">
            <input type="hidden" name="update_id" id="update_id">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="fName" id="fName" class="form-control" placeholder="Enter First Name" required>
            </div>
          <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lName" id="lName" class="form-control" placeholder="Enter Last Name" required>
            </div>
            <div class="form-group">
                <label>Oib</label>
                <input type="text" name="oib" id="oib" class="form-control" placeholder="Enter OIB" required>
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="Enter City" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updateCustomer" class="btn btn-primary">Save</button>
            </div>
          </div> 
        </form>
    </div>
  </div>
</div>

<!-- Delete Customer Modal Form (Bootstrap)---------------------------------------->
<div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE CUSTOMER DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="deleteCustomer.php" method="POST">   
          <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">

              <h5>Are you sure want to Delete this Customer?</h5>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                <button type="submit" name="deleteCustomer" class="btn btn-primary">YES</button>
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
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomerModal">
                        ADD CUSTOMER
                      </button>
                  </div>
                </div>
  
                <div class="card">
                  <div class="card-body">
                  <?php
                    $conn = mysqli_connect("localhost", "root", "", "Insurance");
                    $sql = "SELECT * FROM Customers";
                    $query_run = $conn->query($sql);
                  ?>
                    <table id="dataTableID" class="table table-danger table-bordered display">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">OIB</th>
                          <th scope="col">City</th>
                          <th scope="col">EDIT</th>
                          <th scope="col">DELETE</th>
                        </tr>
                      </thead>
                      <?php       
                        if($query_run) {
                          foreach($query_run as $row){
                      ?>
                      <tbody>
                        <tr>                   
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['firstName']; ?></td>
                          <td><?php echo $row['lastName'] ?></td>
                          <td><?php echo $row['oib']; ?></td>
                          <td><?php echo $row['city']; ?></td>
                          <td>
                            <button type="button" class="btn btn-success updateBtn">Update</button>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger deleteBtn">Delete</button>
                          </td>
                        </tr>
                      </tbody>
                        <?php
                            }
                          }else echo "No records!";
                        ?>
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


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<script>

$(document).ready(function() {
    $('#dataTableID').DataTable( {
        "paging":   "fullNumbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],     
        // "ordering": false,
        // "info": false
      });
    });

</script>


<script>
//Update button
    $(document).ready(function(){

    $('.updateBtn').on('click', function(){

        $('#updateCustomerModal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);
           
          $('#update_id').val(data[0]);
          $('#fName').val(data[1]);
          $('#lName').val(data[2]);
          $('#oib').val(data[3]);
          $('#city').val(data[4]);
    });
  });  
//Delete button
  $(document).ready(function(){

    $('.deleteBtn').on('click', function(){

        $('#deleteCustomerModal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);
           
          $('#delete_id').val(data[0]);;
    });
  });
</script>

<?php
include '../content/footer.php';
?>