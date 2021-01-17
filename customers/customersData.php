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
<!-- Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer Data</h5>
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

        <div class="customers-container container">
            <div class="customers-inner">
                <div class="card">
                    <h2>CUSTOMERS DATA</h2>
                </div>
                <div class="card">
                  <div class="card-body">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomerModal">
                        Add Customer
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
                    <table class="table table-danger">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">OIB</th>
                          <th scope="col">City</th>
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
                            <button type="button" class="btn btn-primary"></button>
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

<?php
include '../content/footer.php';
?>