<?php
  session_start();
  include('includes/header.php');
?>
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
            <h4>PHP IMAGE CRUD - Edit image with data from database</h4>
          </div>
          <div class="card-body">
          
          <?php

          $connection = mysqli_connect("localhost","root","","phptutorials");
          $id = $_GET['id'];
          $fetch_image_query = "SELECT * FROM students WHERE id='$id'";
          $fetch_image_query_run = mysqli_query($connection,$fetch_image_query);

          if (mysqli_num_rows($fetch_image_query_run) > 0)
          {
          		foreach($fetch_image_query_run as $row)
          		{
          			/*echo $row['id'];*/
          ?>
          			<form action="code.php" method="POST" enctype="multipart/form-data">
			              <div class="form-group mb-3">
				                <input type="hidden" name="id" value="<?php echo $row['id'];?>" class="form-control">
			              </div>
			              <div class="form-group mb-3">
				                <label for="">Name</label>
				                <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control" placeholder="Enter Name">
			              </div>
			              <div class="form-group mb-3">
				                <label for="">Phone Number</label>
				                <input type="number" name="phone" value="<?php echo $row['phone'];?>" class="form-control" placeholder="Enter Mobile">
			              </div>
			              <div class="form-group mb-3">
				                <label for="">Email</label>
				                <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control" placeholder="Enter Email">
			              </div>
			              <div class="form-group mb-3">
				                <label for="">Student Image</label>
				                <input type="file" name="image" class="form-control">
				                <input type="hidden" name="image_old" value="<?php echo $row['image'];?>">
				                <img src="<?php echo "uploads/".$row['image'];?>" width="75" alt="image">
			              </div>
			              <div class="form-group mb-3">
			                	<button type="submit" name="update_image" class="btn btn-info">UPDATE IMAGE</button>                
			              </div>
		            </form>
          			<?php
          		}
          		
          }
          else
          {
          		echo" no data found";
          }
          ?>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php');?>