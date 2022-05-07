<?php
  $title = 'Reset Password | Get you there safely... ';
  require_once 'assets/includes/sessions.php';
  require_once 'assets/config/db-connect.php';
  require 'assets/includes/headers.php';
?>
    <main>
          
        <div class="card p-2 mx-auto" style="margin-top: 8em; max-width: 500px;">
            <?php 
                echo successMessage(); echo errorMessage();
                if (!isset($_GET['q'])) {
            ?>
            <form action="assets/config/password_control.php" method="post">
                <input type="email" name="email" placeholder="Email*" class="form-control mb-2" required>
                <button type="submit" name="sendMail" class="btn btn-outline-primary my-2"> Send Reset Mail</button>
            </form>
            <?php }else{
                $pin = $_GET['q'];
                $sql = "SELECT * FROM users WHERE password_reset = '$pin'";
                $query = mysqli_query($connection,$sql);
                if (mysqli_num_rows($query) < 1) {
                    $_SESSION['errormessage'] = "This token is expired please try again";
                    header('Location: login');
                }else{
                    $row = mysqli_fetch_assoc($query);
               ?>
            <form action="assets/config/password_control.php" method="post">
                <input type="hidden" name="uid" value="<?php echo $row['id']; ?>">
                <input type="password" name="password" placeholder="Password*" class="form-control mb-2" required>
                <button type="submit" name="reset" class="btn btn-outline-primary my-2"> Reset</button>
            </form>

                <?php }} ?>
        </div>
    </main>



<!-- FOOTER -->
<?php include_once 'assets/includes/footer.php' ?>