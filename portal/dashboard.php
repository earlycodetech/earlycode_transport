<?php
    
    require_once '../assets/config/db-connect.php';

    require_once '../assets/includes/sessions.php';
    require_once '../assets/includes/portal_header.php';
    auth();
    $id =  $_SESSION['id'];
?>



<?php
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($query);
?>
<!-- DASHBOARD BODY -->
<div>
                <h5 class="mt-2 fs-3 fw-b text-secondary">DASHBOARD</h5>
                <div class="card ms-5 shadow" style="min-width: 60rem; height: max-content;">
                <?php
                    echo successMessage();
                    echo errorMessage();
                ?>
                  <div class="card-body">
                    <div class="d-flex justify-content-between p-4">
                          <div class="d-flex">
                            <div>
                            <img src="../assets/img/profile_pic/<?php
                              $img = $row['prof_pic'];

                              if (!empty($img)) {
                                echo "$img?".mt_rand();
                              }else{
                                echo 'user.png';
                              }
                            ?>" alt="" style="height: 150px; width: 150px; border-radius: 50%;">
                             
                            </div>
  
                            <div>
                              <h5 style="font-size: 30px; font-weight: bold; color: rgb(9, 29, 139); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $row['first_name']." ".$row['last_name']; ?></h5>
                            </div>
                          </div>
  
                          <div>
                            
                        </div>
                      </div>
  
                      
                    </div>
                    <hr class="ms-4 me-4">
                    
                    <div class="container ps-4">
                          <div class="row">
                          <div class="col">
                              <h2 style="font-size: 15px; color: rgba(110, 110, 110, 0.473); font-family: sans-serif;">FIRST NAME</h2>
                              <h3 style="font-size: 15px; color: rgb(9, 29, 139); font-family: sans-serif;"><?php echo $row['first_name']; ?></h3>
                          </div>
                          <div class="col">
                              <h2 style="font-size: 15px; color: rgba(110, 110, 110, 0.473); font-family: sans-serif;">MIDDLE NAME</h2>
                              <h3 style="font-size: 15px; color: rgb(9, 29, 139); font-family: sans-serif;"><?php echo $row['middle_name']; ?></h3>
                          </div>
                          <div class="col">
                              <h2 style="font-size: 15px; color: rgba(110, 110, 110, 0.473); font-family: sans-serif;">LAST NAME</h2>
                              <h3 style="font-size: 15px; color: rgb(9, 29, 139); font-family: sans-serif;"><?php echo $row['last_name']; ?></h3>
                          </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col">
                                <h2 style="font-size: 15px; color: rgba(110, 110, 110, 0.473); font-family: sans-serif;">GENDER</h2>
                                <h3 style="font-size: 15px; color: rgb(9, 29, 139); font-family: sans-serif;"><?php echo $row['gender']; ?></h3>
                            </div>
                            <div class="col">
                              <h2 style="font-size: 15px; color: rgba(110, 110, 110, 0.473); font-family: sans-serif;">Date of Birth</h2>
                              <h3 style="font-size: 15px; color: rgb(9, 29, 139); font-family: sans-serif;"><?php echo $row['dob']; ?></h3>
                            </div>
                            <div class="col">
                                <h2 style="font-size: 15px; color: rgba(110, 110, 110, 0.473); font-family: sans-serif;">Email</h2>
                                <h3 style="font-size: 15px; color: rgb(9, 29, 139); font-family: sans-serif;"><?php echo $row['email']; ?></h3>
                            </div>
                            </div>
                      
                          <div class="row mt-3">
                          <div class="col">
                            <h2 style="font-size: 15px; color: rgba(110, 110, 110, 0.473); font-family: sans-serif;">ADDRESS</h2>
                            <h3 style="font-size: 15px; color: rgb(9, 29, 139); font-family: sans-serif;"><?php echo $row['user_address']; ?></h3>
                          </div>
                          <div class="col">
                              <h2 style="font-size: 15px; color: rgba(110, 110, 110, 0.473); font-family: sans-serif;">CITY</h2>
                              <h3 style="font-size: 15px; color: rgb(9, 29, 139); font-family: sans-serif;"><?php echo $row['city']; ?></h3>
                          </div>
                          <div class="col">
                              <h2 style="font-size: 15px; color: rgba(110, 110, 110, 0.473); font-family: sans-serif;">STATE</h2>
                              <h3 style="font-size: 15px; color: rgb(9, 29, 139); font-family: sans-serif;"><?php echo $row['user_state']; ?></h3>
                          </div>
                          </div>

                          <div class=" mt-3">
                            <h2 style="font-size: 15px; color: rgba(110, 110, 110, 0.473); font-family: sans-serif;">PHONE NUMBER</h2>
                            <h3 style="font-size: 15px; color: rgb(9, 29, 139); font-family: sans-serif;"><?php echo $row['phone']; ?></h3>
                        </div>
                    </div>
              </div>

</section>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>