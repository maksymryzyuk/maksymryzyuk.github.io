<?php
  session_start();
  include('includes/header.php');
?>

<section>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <?php
          if (isset($_SESSION['status']) && $_SESSION != '') {
        ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
          unset($_SESSION['status']);
        }
        ?>

        <div class="card">
          <div class="card-header">
            <h4>PHP IMAGE CRUD - insert image into database</h4>
          </div>
          <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
              <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
              </div>
              <div class="form-group mb-3">
                <label for="">Phone Number</label>
                <input type="number" name="phone" class="form-control" placeholder="Enter Mobile">
              </div>
              <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
              </div>
              <div class="form-group mb-3">
                <label for="">Student Image</label>
                <input type="file" name="image" class="form-control">
              </div>
              <div class="form-group mb-3">
                <button type="submit" name="save_image" class="btn btn-primary">SAVE IMAGE</button>                
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('includes/footer.php') ?>