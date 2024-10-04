<?php 
  session_start();
  include('includes/header.php');
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>PHP IMAGE CRUD - Delete Image with data from the database in php</h4>
                </div>
                <div class="card-body">
                    <table class="table table-success table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Student Image</th>
                                <th scope="col">Edit Image</th>
                                <th scope="col">Delete Image</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $connection = mysqli_connect("localhost","root","","phptutorials");

                                $fetch_image_query = "SELECT * FROM students";
                                $fetch_image_query_run = mysqli_query($connection,$fetch_image_query);

                                if (mysqli_num_rows($fetch_image_query_run) > 0)
                                {
                                  foreach($fetch_image_query_run as $row)
                                  {
                                      ?>
                                          <tr>
                                              <td><?php echo $row['id'];?></td>
                                              <td><?php echo $row['name'];?></td>
                                              <td><?php echo $row['phone'];?></td>
                                              <td><?php echo $row['email'];?></td>
                                              <td>
                                                  <img src="<?php echo "uploads/".$row['image'];?>" width="75" height="75" alt="student image">
                                              </td>
                                              <td>
                                                  <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit Image</a>
                                              </td>
                                              <td>
                                                  <form action="code.php" method="post">
                                                      <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                      <input type="hidden" name="image" value="<?php echo $row['image'];?>">
                                                      <button type="submit" name="delete_image" class="btn btn-danger">Delete image</button>
                                                  </form>
                                              </td>
                                          </tr>
                                      <?php
                                  }
                                }
                                else
                                {
                                    ?>
                                        <tr colspan="5">NO RECORD FOUND</tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>