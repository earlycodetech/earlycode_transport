<?php
  $title = 'Earlycode transit | Get you there safely... ';
  require_once 'assets/includes/headers.php';
  require_once 'assets/includes/sessions.php';
  
?>
 <section>
        <div class="homediv container shadow mb-5 bg-light mx-auto" style="margin-top: 10em;">
            <?php 
                echo successMessage(); echo errorMessage();
            ?>
                <div class="onlinereg">
                        <h5 class="text-center pt-2">Online Registration</h5>
                </div><br>

            <form action="assets/config/registration_control.php" method="POST">
                <div class="row firstrow">
                    <div class="col d-flex ms-2">
                        <i class="fa fa-user mt-3" aria-hidden="true"></i>
                        <input type="text" class="form-control w-50 ms-3" name="fname" id="firstinput" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col d-flex">
                        <i class="fa fa-user mt-3" aria-hidden="true"></i>
                        <input type="text" class="form-control w-50 ms-2" placeholder="Middle name" aria-label="Middle name" name="mname">
                    </div>
                    <div class="col d-flex">
                        <i class="fa fa-user mt-3" aria-hidden="true"></i>
                        <input type="text" class="form-control w-50 ms-2" placeholder="Last name" aria-label="Last name" name="lname">
                    </div>
                </div><br>

                    <div class="form-check form-check-inline ms-5 secondrow">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" required>
                        <label class="form-check-label femalemale" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline secondrow">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" required>
                        <label class="form-check-label femalemale" for="inlineRadio2">Female</label>
                    </div><br> <br>

                    <div class="col d-flex ms-2 thirdrow">
                        <i class="fa fa-calendar mt-3" aria-hidden="true"></i>
                        <input type="date" class="form-control ms-3" placeholder="DOB" id="age" name="dob"> 
                        <h6 class="mt-3 ms-2 dob">Date Of Birth</h6>
                    </div><br><br>

                    <div class="form-floating mb-3 d-flex forthrow">
                        <i class="far fa-envelope mt-4 ms-2"></i>
                        <input type="email" class="form-control w-50 ms-3" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput" class="ms-5" id="fourth">Email address</label>
                    </div><br>
                    <div class="form-floating d-flex fifthrow">
                        <i class="fa fa-unlock-alt mt-4 ms-2" aria-hidden="true"></i>
                        <input type="password" class="form-control w-50 ms-3" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword " class="ms-5" id="fifthy">Password</label>
                    </div><br><br>

                    <div class="form-floating d-flex fifthrow">
                        <i class="fa fa-unlock-alt mt-4 ms-2" aria-hidden="true"></i>
                        <input type="password" class="form-control w-50 ms-3" id="floatingPassword" placeholder="Password" name="cpassword">
                        <label for="floatingPassword " class="ms-5" id="fifthy">Confirm Password</label>
                    </div><br><br>
                    <div class="form-floating d-flex sixt">
                        <i class="fa fa-map-marker mt-4 ms-2" aria-hidden="true"></i>
                        <input type="text" class="form-control w-50 ms-3" id="floatingPassword" placeholder="Address" name="address">
                        <label for="floatingPassword " class="ms-5" id="sixty">Physical  Address</label>
                    </div><br><br>

                <div class="row g-3 d-flex seventy">
                    <div class="col-sm-7 d-flex" id="sevent">
                        <i class="fa fa-globe mt-2 ms-2" aria-hidden="true"></i>
                        <input type="text" class="form-control ms-3" placeholder="City" aria-label="City" name="city">
                    </div>
                    <div class="col-sm"id="eight">
                        <input type="text" class="form-control" name="state" placeholder="State" aria-label="State">
                    </div>
                    <div class="col-sm me-3" id="ninet">
                        <input type="text" class="form-control"  placeholder="Zip" aria-label="Zip" name="zip">
                    </div>
                </div> <br> <br>

                    <div class="col d-flex ms-2 ten">
                        <i class="fas fa-phone mt-2"></i>
                        <input type="tel" class="form-control w-50 ms-3" id="firstinput" placeholder="Tel: 080" name="phone">
                    </div> <br> <br>

                    <div class="d-grid gap-2 d-md-block ms-4 submitt my-4">
                        <button class="btn btn-primary my-2 mb-5" name="register" type="submit">Submit</button>
                    </div>             
            </form>
        </div>
    </section>

<!-- FOOTER -->
<?php include_once 'assets/includes/footer.php' ?>