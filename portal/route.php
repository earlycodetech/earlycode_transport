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
                    <form action="../assets/config/route_control.php" method="post">
                        <input type="text" placeholder="Route Name" name="rname" class="form-control rounded-0 mb-3">
                        <input type="number" placeholder="Route Price" name="rprice" class="form-control rounded-0 mb-3">
                        <select name="rstatus" class="form-control rounded-0 mb-3">
                            <option>Available</option>
                            <option>On Route</option>
                            <option>Full</option>
                            <option selected disabled>Route Status</option>
                        </select>
                        <input type="number" placeholder="Available Seats" name="rseats" class="form-control rounded-0 mb-3">

                        <button type="submit" name="createRoute" class="btn btn-primary">Create</button>
                    </form>
                    <?php }else{ ?>

                        <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Route Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col"><i class="fas fa-box"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $sql = "SELECT * FROM transport_route";
                        $query = mysqli_query($connection,$sql); 
                        while($row = mysqli_fetch_assoc($query)){ 
                      ?>
                      <tr>
                        <th scope="row"><i class="fas fa-bus-alt"></i></th>
                        <td><?php echo $row['route_name']; ?></td>
                        <td><?php echo "₦".number_format($row['route_price'],2,'.',','); ?></td>
                        <td><?php echo $row['route_status']; ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#route<?php echo $row['id'] ?>">
                                Book Now
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="route<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Book Now for  <?php echo ucwords($row['route_name']); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   <form action="../assets/config/route_control.php" method="post">
                                        <input type="hidden" name="rname" value="<?php echo $row['route_name'] ?>">
                                        <input type="hidden" name="rid" value="<?php echo $row['id'] ?>">
                                        <input type="date" name="dateDepart" class="form-control mb-3 rounded-0" required>
                                        <input type="number" name="noSeats" placeholder="Number of Seats" class="form-control mb-3 rounded-0" required>
                                        <button type="submit" name="bookRoute" class="btn btn-outline-primary">Book</button>
                                   </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </td>
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