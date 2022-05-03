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
                <h5 class="mt-2 fs-3 fw-b text-secondary">NEW ROUTE</h5>
                <div class="card ms-5 p-2 shadow" style=" width: 1000px;">
                    <?php
                        echo successMessage();
                        echo errorMessage();
                        if ($_SESSION['role'] === 'admin') {
                    ?>
                    <div class="table-responsive-md">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Route</th>
                                    <th scope="col text-nowrap">Date of Departure</th>
                                    <th scope="col text-nowrap">No of Seats</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"><i class="fas fa-box"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM booked_routes";
                                    $query = mysqli_query($connection,$sql); 
                                    while($row = mysqli_fetch_assoc($query)){ 
                                ?>
                                <tr>
                                    <th scope="row"><i class="fas fa-bus-alt"></i></th>
                                    <td><?php echo $row['full_name']; ?></td>
                                    <td><?php echo $row['booked_route']; ?></td>
                                    <td>
                                        <?php 
                                            $date = date_create($row['date_of_departure']); 
                                            echo date_format($date,'j, M. Y');
                                        ?>
                                    </td>
                                    <td><?php echo $row['no_of_seats']; ?></td>
                                    <td><?php echo $row['booking_status']; ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="../assets/config/route_control?startTrip=<?php echo $row['id']; ?>">Start Trip</a></li>
                                            <li><a class="dropdown-item" href="../assets/config/route_control?endTrip=<?php echo $row['id']; ?>&nos=<?php echo $row['no_of_seats'] ?>&rn=<?php echo $row['booked_route'] ?>">End Trip</a></li>
                                            <li><a class="dropdown-item" href="../assets/config/route_control?delTrip=<?php echo $row['id']; ?>&nos=<?php echo $row['no_of_seats'] ?>&rn=<?php echo $row['booked_route'] ?>">Delete Booking</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                    </div>
                    
                    <?php }else{//USERS BELOW ?>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col text-nowrap">Route Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Date of Departure</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM booked_routes WHERE userid = '$id'";
                                    $query = mysqli_query($connection,$sql); 
                                    while($row = mysqli_fetch_assoc($query)){ 
                                ?>
                                <tr>
                                    <th scope="row"><i class="fas fa-bus-alt"></i></th>
                                    <td><?php echo $row['booked_route']; ?></td>
                                    <td>
                                        <?php
                                            $rname = $row['booked_route'];
                                            $sql2 = "SELECT * FROM transport_route WHERE route_name = '$rname'"; 
                                            $query2 = mysqli_query($connection,$sql2);
                                            $row2 = mysqli_fetch_assoc($query2);
                                           echo "₦".number_format($row2['route_price'],2,'.',','); 
                                         ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $date = date_create($row['date_of_departure']); 
                                            echo date_format($date,'j, M. Y');
                                        ?>
                                    </td>
                                    <td><?php echo $row['booking_status']; ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>

</section>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>