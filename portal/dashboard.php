<?php
    require_once '../assets/includes/portal_header.php';
    require_once '../assets/config/db-connect.php';

    require_once '../assets/includes/sessions.php';
    auth();
    $id =  $_SESSION['id'];
?>



<?php

    echo successMessage();
    echo errorMessage();

    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($query);
?>
<div class="container bg-dark bg-gradient p-3 text-light mt-3">
    <div class="row">
        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">First Name:</h5>
            <h6><?php echo $row['first_name']; ?></h6>
        </div>
        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">Last Name:</h5>
            <h6><?php echo $row['last_name']; ?></h6>
        </div>

        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">Middle Name:</h5>
            <h6><?php echo $row['middle_name']; ?></h6>
        </div>

        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">Gender:</h5>
            <h6><?php echo $row['gender']; ?></h6>
        </div>
        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">DOB:</h5>
            <h6><?php echo $row['dob']; ?></h6>
        </div>

        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">Email:</h5>
            <h6><?php echo $row['email']; ?></h6>
        </div>

        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">Address:</h5>
            <h6><?php echo $row['user_address']; ?></h6>
        </div>

        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">City:</h5>
            <h6><?php echo $row['city']; ?></h6>
        </div>

        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">State:</h5>
            <h6><?php echo $row['user_state']; ?></h6>
        </div>

        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">Zip:</h5>
            <h6><?php echo $row['zip_code']; ?></h6>
        </div>

        <div class="col-md-4 mb-3">
            <h5 class="fw-bold">Phone:</h5>
            <h6><?php echo $row['phone']; ?></h6>
        </div>
    </div>
</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>