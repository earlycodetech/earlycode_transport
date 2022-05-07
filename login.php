<?php
  $title = 'Earlycode transit | Get you there safely... ';
  require 'assets/includes/headers.php';
  require_once 'assets/includes/sessions.php';
?>
    <main>
          
        <div class="card p-2 mx-auto" style="margin-top: 8em; max-width: 500px;">
            <?php 
                echo successMessage(); echo errorMessage();
            ?>
            <form action="assets/config/login_control.php" method="post">
                <input type="email" name="email" placeholder="Email*" class="form-control mb-2" required>
                <input type="password" name="password" placeholder="Password*" class="form-control" required>

                <button type="submit" name="login" class="btn btn-outline-primary my-2"> Login</button>
                <a href="password-reset" class="nav-link my-2">Forgot Password? </a>
            </form>
        </div>
    </main>



<!-- FOOTER -->
<?php include_once 'assets/includes/footer.php' ?>