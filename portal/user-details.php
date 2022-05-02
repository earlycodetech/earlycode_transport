<?php
    
    require_once '../assets/config/db-connect.php';
    
    require_once '../assets/includes/sessions.php';
    adminAuth();
    auth();

    require_once '../assets/includes/portal_header.php';
    $id =  $_SESSION['id'];
?>



<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($query);
?>
<!-- DASHBOARD BODY -->
<div>
                <h5 class="mt-2 fs-3 fw-b text-secondary">PROFILE</h5>
                <div class="card ms-5 p-2 shadow" style=" width: 1000px;">
                <?php
                  echo successMessage();
                  echo errorMessage();
                ?>

                <div class="d-flex justify-content-end">
                  <label for="image">
                      <img src="../assets/img/profile_pic/<?php
                         $img = $row['prof_pic'];

                         if (!empty($img)) {
                           echo "$img?".mt_rand();
                         }else{
                           $img = 'user.png';
                           echo $img;
                         }
                      ?>" alt="" style="height: 150px; width: 150px; border-radius: 50%;"><br>
                      
                        <a href="../assets/img/profile_pic/<?php echo $img;?>" download  class="btn btn-outline-primary mt-3">Download</a>
                </div>
                    <div class="row">
                      <form action="../assets/config/update_control.php" method="post">
                        <div class="col-md-12 mb-2">
                          <label>First Name:</label>
                          <input type="text" name="fname" placeholder="<?php echo $row['first_name']; ?>"  class="form-control">
                        </div>

                        <div class="col-md-12 mb-2">
                          <label>Middle Name:</label>
                          <input type="text" name="mname" placeholder="<?php echo $row['middle_name']; ?>"  class="form-control">
                        </div>

                        <div class="col-md-12 mb-2">
                          <label>Last Name:</label>
                          <input type="text" name="lname" placeholder="<?php echo $row['last_name']; ?>"  class="form-control">
                        </div>

                        <div class="col-md-12 mb-2">
                          <label>Date of Birth:</label>
                          <input type="text" onfocus="this.type = 'date'" name="dob" placeholder="<?php echo $row['dob']; ?>"  class="form-control">
                        </div>

                        <div class="col-md-12 mb-2">
                          <label>Gender:</label>
                          <select name="gender" id="" class="form-control">
                            <option>Male</option>
                            <option>Female</option>
                            <option selected disabled> <?php echo $row['gender']; ?></option>

                          </select>
                        </div>


                        <div class="col-md-12 mb-2">
                          <label>Email:</label>
                          <input type="text" value="<?php echo $row['email']; ?>"  class="form-control" readonly>
                        </div>

                        <div class="col-md-12 mb-2">
                          <label>Address:</label>
                          <input type="text" name="address" placeholder="<?php echo $row['user_address']; ?>"  class="form-control">
                        </div>

                        <div class="col-md-12 mb-2">
                          <label>City:</label>
                          <input type="text" name="city" placeholder="<?php echo $row['city']; ?>"  class="form-control">
                        </div>

                        <div class="col-md-12 mb-2">
                          <label>State:</label>
                          <input type="text" name="state" placeholder="<?php echo $row['user_state']; ?>"  class="form-control">
                        </div>

                        <div class="col-md-12 mb-2">
                          <label>Phone:</label>
                          <input type="text" name="phone" placeholder="<?php echo $row['phone']; ?>"  class="form-control">
                        </div>


                        <button type="submit" name="updateProfile" class=" my-5 btn btn-outline-primary">Update</button>
                      </form>
                    </div>
                </div>

</section>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>