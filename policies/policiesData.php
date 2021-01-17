<?php
include '../content/header.php';
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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        </section>

    </main>

<?php
include '../content/footer.php';
?>